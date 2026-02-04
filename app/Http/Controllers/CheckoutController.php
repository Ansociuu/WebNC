<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSuccess;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
        ]);

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        try {
            DB::beginTransaction();

            // Create Order
            $order = Order::create([
                'user_id' => Auth::id(),
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'shipping_address' => $request->shipping_address,
                'notes' => $request->notes,
                'total_price' => $total,
                'status' => 'pending', // Or 'processing'
            ]);

            // Create Order Items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                // Update stock if we were managing stock
                // $item->product->decrement('stock', $item->quantity);
            }

            // Clear Cart
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            // Gửi email thông báo đặt hàng thành công
            try {
                Mail::to($order->email)->send(new OrderSuccess($order));
            } catch (\Exception $e) {
                Log::error('Lỗi gửi mail đặt hàng: ' . $e->getMessage());
            }

            return redirect()->route('checkout.success', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xử lý đơn hàng: ' . $e->getMessage());
        }
    }

    public function success(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        return view('checkout.success', compact('order'));
    }
}
