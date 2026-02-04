<x-mail::message>
# Chào mừng bạn đến với TechStore!

Chào {{ $user->name }},

Chúc mừng bạn đã đăng ký tài khoản thành công tại **TechStore**. Giờ đây bạn có thể bắt đầu mua sắm các sản phẩm công nghệ tuyệt vời của chúng tôi.

<x-mail::button :url="route('shop.index')">
Bắt đầu mua sắm ngay
</x-mail::button>

Cảm ơn bạn,<br>
{{ config('app.name') }}
</x-mail::message>
