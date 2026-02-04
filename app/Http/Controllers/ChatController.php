<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Chatbot tự động trả lời
    // Chatbot tự động trả lời với bộ từ khóa phong phú hơn
    private $botResponses = [
        'chào hỏi' => [
            'keywords' => ['chào', 'hello', 'hi', 'xin chào', 'hey'],
            'response' => 'Xin chào! TechStore có thể giúp gì cho bạn hôm nay?'
        ],
        'giờ mở cửa' => [
            'keywords' => ['giờ', 'mở cửa', 'đóng cửa', 'thời gian', 'mấy giờ'],
            'response' => 'TechStore mở cửa từ 8:00 đến 22:00 hàng ngày, kể cả ngày lễ và Chủ Nhật bạn nhé.'
        ],
        'vận chuyển' => [
            'keywords' => ['ship', 'vận chuyển', 'giao hàng', 'bao lâu', 'phí'],
            'response' => 'Chúng tôi giao hàng toàn quốc. Miễn phí vận chuyển cho đơn từ 1.000.000₫. Thời gian nhận hàng từ 2-5 ngày làm việc.'
        ],
        'bảo hành' => [
            'keywords' => ['bảo hành', 'sửa chữa', 'hỏng', 'lỗi'],
            'response' => 'Tất cả sản phẩm tại TechStore đều được bảo hành chính hãng 12-24 tháng. Bạn chỉ cần mang hóa đơn hoặc số điện thoại mua hàng đến shop.'
        ],
        'đổi trả' => [
            'keywords' => ['đổi trả', 'hoàn tiền', 'không thích', 'trả hàng'],
            'response' => 'Bạn có thể đổi trả sản phẩm trong vòng 30 ngày nếu còn nguyên seal, hộp và không có dấu hiệu va chạm vật lý.'
        ],
        'thanh toán' => [
            'keywords' => ['thanh toán', 'trả tiền', 'chuyển khoản', 'cod', 'thẻ'],
            'response' => 'Chúng tôi hỗ trợ: Tiền mặt (COD), Chuyển khoản ngân hàng, Ví MoMo, VNPay và thẻ tín dụng.'
        ],
        'giá cả' => [
            'keywords' => ['giá', 'bao nhiêu', 'nhiêu tiền', 'rẻ'],
            'response' => 'Giá sản phẩm luôn được cập nhật mới nhất trên website. TechStore cam kết giá cạnh tranh nhất thị trường.'
        ],
        'liên hệ' => [
            'keywords' => ['liên hệ', 'số điện thoại', 'tổng đài', 'hotline', 'địa chỉ'],
            'response' => 'Hotline: (84) 123 456 7890. Địa chỉ: 123 Đường Công Nghệ, TP. Hồ Chí Minh. Email: support@techstore.vn'
        ],
        'tạm biệt' => [
            'keywords' => ['tạm biệt', 'bye', 'cảm ơn', 'thanks', 'ok'],
            'response' => 'Rất vui được hỗ trợ bạn! Chúc bạn một ngày tốt lành. Đừng quên quay lại TechStore nhé!'
        ],
    ];

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|min:1',
        ]);

        $user = Auth::user();
        $conversationId = Chat::generateConversationId($user->email);

        // Lưu tin nhắn từ người dùng
        Chat::create([
            'user_id' => $user->id,
            'conversation_id' => $conversationId,
            'name' => $user->name,
            'email' => $user->email,
            'message' => $request->input('message'),
            'sender_type' => 'user',
            'status' => 'pending',
        ]);

        // Kiểm tra nếu có câu hỏi tự động
        $botReply = $this->getBotResponse($request->input('message'));

        if ($botReply) {
            Chat::create([
                'user_id' => $user->id,
                'conversation_id' => $conversationId,
                'name' => 'TechStore Bot',
                'email' => $user->email,
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

    public function getConversation()
    {
        $messages = Chat::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    private function getBotResponse($message)
    {
        $message = mb_strtolower($message, 'UTF-8');

        foreach ($this->botResponses as $category => $data) {
            foreach ($data['keywords'] as $keyword) {
                // Sử dụng mb_strpos để hỗ trợ tiếng Việt có dấu tốt hơn
                if (mb_strpos($message, mb_strtolower($keyword, 'UTF-8')) !== false) {
                    return $data['response'];
                }
            }
        }

        // Nếu không khớp với từ khóa nào, trả về câu trả lời mặc định thông minh hơn
        return 'Cảm ơn bạn đã quan tâm đến TechStore. Rất tiếc hiện tại tôi chưa hiểu ý bạn. Tuy nhiên, tin nhắn của bạn đã được chuyển đến nhân viên hỗ trợ, chúng tôi sẽ trả lời bạn sớm nhất có thể! Bạn cũng có thể gọi Hotline (84) 123 456 7890 để được giúp đỡ ngay.';
    }

    public function adminIndex()
    {
        $conversations = Chat::selectRaw('user_id, email, name, MAX(created_at) as last_message_time')
            ->whereNotNull('user_id')
            ->groupBy('user_id', 'email', 'name')
            ->orderBy('last_message_time', 'desc')
            ->paginate(20);

        return view('admin.chats.index', compact('conversations'));
    }

    public function adminShow($userId)
    {
        $messages = Chat::where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->get();

        $conversation = $messages->first();

        if (!$conversation) {
            abort(404);
        }

        return view('admin.chats.show', compact('messages', 'userId', 'conversation'));
    }

    public function adminReply(Request $request, $userId)
    {
        $validated = $request->validate([
            'message' => 'required|string|min:1',
        ]);

        $lastMessage = Chat::where('user_id', $userId)
            ->where('sender_type', 'user')
            ->latest()
            ->first();

        if (!$lastMessage) {
            return redirect()->back()->with('error', 'Cuộc trò chuyện không tồn tại.');
        }

        Chat::create([
            'user_id' => $userId,
            'conversation_id' => $lastMessage->conversation_id,
            'name' => 'Admin',
            'email' => $lastMessage->email,
            'message' => $validated['message'],
            'sender_type' => 'admin',
            'status' => 'answered',
        ]);

        // Cập nhật trạng thái cuộc trò chuyện thành 'answered'
        Chat::where('user_id', $userId)
            ->where('sender_type', 'user')
            ->update(['status' => 'answered']);

        return redirect()->back()->with('success', 'Tin nhắn đã được gửi.');
    }
}
