<x-mail::message>
# Đặt hàng thành công!

Chào {{ $order->full_name }},

Cảm ơn bạn đã tin tưởng và mua hàng tại **TechStore**. Đơn hàng của bạn đã được tiếp nhận và đang trong quá trình xử lý.

**Chi tiết đơn hàng:**
- Mã đơn hàng: #{{ $order->id }}
- Tổng tiền: {{ number_format($order->total_price, 0, ',', '.') }} VNĐ
- Địa chỉ giao hàng: {{ $order->shipping_address }}

<x-mail::button :url="route('orders.index')">
Xem lịch sử đơn hàng
</x-mail::button>

Cảm ơn bạn,<br>
{{ config('app.name') }}
</x-mail::message>
