<!DOCTYPE html>
<html lang="vi" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TechStore - Công nghệ tương lai')</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 flex flex-col">

    @include('partials.header')

    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Chat Widget -->
    @include('components.chat-widget')
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div id="toast-container" class="toast toast-end toast-bottom z-[100]"></div>

    <script>
        document.addEventListener('submit', function(e) {
            if (e.target.closest('.ajax-cart-form')) {
                e.preventDefault();
                const form = e.target.closest('.ajax-cart-form');
                const formData = new FormData(form);
                const url = form.getAttribute('action');

                fetch(url, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        }
                    })
                    .then(response => {
                        if (response.status === 401) {
                            window.location.href = "{{ route('login') }}";
                            return;
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (!data) return;
                        if (data.success) {
                            // Update cart count
                            const cartCountBadge = document.getElementById('cart-count');
                            if (cartCountBadge) {
                                cartCountBadge.innerText = data.cartCount;
                                cartCountBadge.classList.remove('hidden');
                                cartCountBadge.classList.add('animate-bounce');
                                setTimeout(() => cartCountBadge.classList.remove('animate-bounce'), 1000);
                            }

                            // Show toast
                            showToast(data.message, 'success');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Có lỗi xảy ra, vui lòng thử lại', 'error');
                    });
            }
        });

        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            const alertClass = type === 'success' ? 'alert-success' : 'alert-error';

            toast.innerHTML = `
                <div class="alert ${alertClass} shadow-xl text-white font-bold rounded-2xl border-none mb-2">
                    <div class="flex items-center gap-2">
                        ${type === 'success' ? 
                            '<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>' : 
                            '<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
                        }
                        <span>${message}</span>
                    </div>
                </div>
            `;

            container.appendChild(toast);
            setTimeout(() => {
                toast.classList.add('transition-opacity', 'duration-500', 'opacity-0');
                setTimeout(() => toast.remove(), 500);
            }, 3000);
        }
    </script>
</body>

</html>