<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Chatbot tự động trả lời
    private $botResponses = [
        'giờ mở cửa' => 'TechStore mở cửa từ 8:00 đến 22:00 hàng ngày, kể cả ngày lễ.',
        'shipping' => 'Chúng tôi giao hàng toàn quốc trong 2-5 ngày làm việc. Miễn phí vận chuyển cho đơn từ 1,000,000₫.',
        'bảo hành' => 'Tất cả sản phẩm đều được bảo hành 12 tháng từ ngày mua. Vui lòng giữ hóa đơn để nhận bảo hành.',
        'đổi trả' => 'Chúng tôi cung cấp chính sách đổi trả trong 30 ngày nếu sản phẩm lỗi hoặc không đúng mô tả.',
        'thanh toán' => 'Chúng tôi hỗ trợ nhiều phương thức: thẻ tín dụng, ví điện tử, chuyển khoản, và COD.',
        'giá' => 'Bạn có thể xem giá chi tiết trên trang sản phẩm. Chúng tôi có các ưu đãi đặc biệt hàng tuần.',
        'sản phẩm mới' => 'Chúng tôi cập nhật sản phẩm mới hàng tuần. Vui lòng kiểm tra trang Shop để xem những gì mới nhất.',
        'liên hệ' => 'Bạn có thể liên hệ chúng tôi qua điện thoại: (84) 123 456 7890 hoặc email: support@techstore.vn',
    ];

    public function sendMessage(Request $request)
    {
        // Validate only message server-side; name/email can be derived from authenticated user
        $request->validate([
            'message' => 'required|string|min:1',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');

        // If the user is authenticated, prefer server-side values
        if (Auth::check()) {
            $user = Auth::user();
            if (empty($name)) $name = $user->name;
            if (empty($email)) $email = $user->email;
        }

        if (empty($name) || empty($email)) {
            return response()->json(['success' => false, 'error' => 'Name and email are required.'], 422);
        }

        $conversationId = Chat::generateConversationId($email);

        // Lưu tin nhắn từ người dùng
        Chat::create([
            'conversation_id' => $conversationId,
            'name' => $name,
            'email' => $email,
            'message' => $request->input('message'),
            'sender_type' => 'user',
            'status' => 'pending',
        ]);

        // Kiểm tra nếu có câu hỏi tự động
        $botReply = $this->getBotResponse($request->input('message'));

        if ($botReply) {
            Chat::create([
                'conversation_id' => $conversationId,
                'name' => 'TechStore Bot',
                'email' => $email,
                'message' => $botReply,
                'sender_type' => 'bot',
                'status' => 'answered',
                'is_automated' => true,
            ]);
        }

        return response()->json([
            'success' => true,
            'conversation_id' => $conversationId,
            'bot_reply' => $botReply ? true : false,
        ]);
    }

    public function getConversation($conversationId)
    {
        $messages = Chat::where('conversation_id', $conversationId)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    private function getBotResponse($message)
    {
        $message = strtolower($message);

        foreach ($this->botResponses as $keyword => $response) {
            if (strpos($message, $keyword) !== false) {
                return $response;
            }
        }

        // Nếu không khớp với từ khóa nào, trả về câu trả lời mặc định
        return 'Cảm ơn bạn đã liên hệ TechStore. Tin nhắn của bạn đã được ghi nhận. Đội hỗ trợ của chúng tôi sẽ trả lời bạn trong soonest. Bạn cũng có thể gọi (84) 123 456 7890 để được hỗ trợ nhanh hơn.';
    }

    public function adminIndex()
    {
        $conversations = Chat::selectRaw('conversation_id, email, name, MAX(created_at) as last_message_time')
            ->where('sender_type', 'user')
            ->groupBy('conversation_id')
            ->orderBy('last_message_time', 'desc')
            ->paginate(20);

        return view('admin.chats.index', compact('conversations'));
    }

    public function adminShow($conversationId)
    {
        $messages = Chat::where('conversation_id', $conversationId)
            ->orderBy('created_at', 'asc')
            ->get();

        $conversation = $messages->first();

        if (!$conversation) {
            abort(404);
        }

        return view('admin.chats.show', compact('messages', 'conversationId', 'conversation'));
    }

    public function adminReply(Request $request, $conversationId)
    {
        $validated = $request->validate([
            'message' => 'required|string|min:1',
        ]);

        $lastMessage = Chat::where('conversation_id', $conversationId)
            ->where('sender_type', 'user')
            ->latest()
            ->first();

        if (!$lastMessage) {
            return redirect()->back()->with('error', 'Cuộc trò chuyện không tồn tại.');
        }

        Chat::create([
            'conversation_id' => $conversationId,
            'name' => 'Admin',
            'email' => $lastMessage->email,
            'message' => $validated['message'],
            'sender_type' => 'admin',
            'status' => 'answered',
        ]);

        // Cập nhật trạng thái cuộc trò chuyện thành 'answered'
        Chat::where('conversation_id', $conversationId)
            ->where('sender_type', 'user')
            ->update(['status' => 'answered']);

        return redirect()->back()->with('success', 'Tin nhắn đã được gửi.');
    }
}
