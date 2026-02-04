<!-- Chat Widget -->
@auth
<div id="chat-widget" class="fixed bottom-6 right-6 z-[60]">
    <!-- Chat Button -->
    <div id="chat-toggle" class="chat-btn group cursor-pointer bg-indigo-600 text-white p-4 rounded-2xl shadow-[0_20px_50px_rgba(79,70,229,0.3)] hover:shadow-[0_20px_50px_rgba(79,70,229,0.5)] transition-all hover:scale-110 duration-500 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-700 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
        <div class="relative z-10 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle transition-transform group-hover:rotate-12">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
            </svg>
            <span class="max-w-0 overflow-hidden group-hover:max-w-xs transition-all duration-500 font-bold text-sm whitespace-nowrap">Hỗ trợ</span>
        </div>
    </div>

    <!-- Chat Box -->
    <div id="chat-box" class="hidden fixed bottom-24 right-6 w-[380px] h-[520px] bg-white/95 backdrop-blur-xl shadow-[0_25px_80px_rgba(0,0,0,0.15)] rounded-[2.5rem] overflow-hidden flex flex-col border border-white/50 transition-all duration-500 origin-bottom-right" style="display:none; transform: scale(0.9); opacity: 0;">
        <!-- Header -->
        <div class="px-6 py-5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white flex items-center justify-between shadow-lg">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <div class="w-10 h-10 rounded-2xl bg-white/20 flex items-center justify-center backdrop-blur-md border border-white/30">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bot"><path d="M12 8V4H8"/><rect width="16" height="12" x="4" y="8" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/></svg>
                    </div>
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-indigo-600 rounded-full"></span>
                </div>
                <div>
                    <div class="font-bold text-sm">TechStore Support</div>
                    <div class="text-[10px] text-indigo-100 font-medium uppercase tracking-widest flex items-center gap-1">
                        <span class="w-1 h-1 bg-indigo-100 rounded-full animate-pulse"></span>
                        Đang trực tuyến
                    </div>
                </div>
            </div>
            <button id="chat-close" class="p-2 hover:bg-white/10 rounded-xl transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>

        <!-- Messages Area -->
        <div id="chat-messages" class="flex-1 p-6 overflow-y-auto space-y-6 bg-slate-50/50 scroll-smooth">
            {{-- Skeleton for loading --}}
            <div class="flex gap-3 animate-pulse">
                <div class="w-8 h-8 bg-slate-200 rounded-full"></div>
                <div class="h-10 bg-slate-100 rounded-2xl w-32"></div>
            </div>
        </div>

        <!-- Footer / Input -->
        <div class="p-5 bg-white border-t border-slate-100">
            <form id="chat-form" class="relative group">
                <textarea id="chat-message" rows="1" 
                    class="textarea textarea-bordered w-full pr-14 pl-5 pt-4 bg-slate-50 border-slate-100 focus:border-indigo-500 focus:bg-white transition-all rounded-2xl min-h-[56px] max-h-32 resize-none text-sm font-medium leading-relaxed" 
                    placeholder="Nhập nội dung cần hỗ trợ..."></textarea>
                <button type="submit" id="chat-submit" 
                    class="absolute right-2 bottom-2 p-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all hover:scale-105 active:scale-95 shadow-lg shadow-indigo-200 disabled:bg-slate-300 disabled:shadow-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send-horizontally"><path d="m3 3 3 9-3 9 19-9Z"/><path d="M6 12h16"/></svg>
                </button>
            </form>
            <p class="mt-3 text-[10px] text-center text-slate-400 font-medium tracking-wide">AI ChatBot • Phản hồi ngay tức thì</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatToggle = document.getElementById('chat-toggle');
    const chatBox = document.getElementById('chat-box');
    const chatClose = document.getElementById('chat-close');
    const chatForm = document.getElementById('chat-form');
    const chatMessages = document.getElementById('chat-messages');

    // Load initial history
    loadConversation();

    // Toggle chat box with Animation
    chatToggle.addEventListener('click', function() {
        if (chatBox.style.display === 'none' || !chatBox.style.display) {
            chatBox.style.display = 'flex';
            setTimeout(() => {
                chatBox.style.transform = 'scale(1)';
                chatBox.style.opacity = '1';
                document.getElementById('chat-message').focus();
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 10);
        } else {
            closeChat();
        }
    });

    chatClose.addEventListener('click', closeChat);

    function closeChat() {
        chatBox.style.transform = 'scale(0.9)';
        chatBox.style.opacity = '0';
        setTimeout(() => {
            chatBox.style.display = 'none';
        }, 300);
    }

    // Auto-resize textarea
    const textarea = document.getElementById('chat-message');
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    // Send message
    chatForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const message = textarea.value.trim();
        if (!message) return;

        addMessage('Bạn', message, 'user');
        textarea.value = '';
        textarea.style.height = 'auto';

        try {
            const response = await fetch('/api/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ message })
            });

            const data = await response.json();
            if (data.success && data.bot_reply) {
                setTimeout(() => loadConversation(), 500);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });

    function addMessage(name, message, type) {
        const messageEl = document.createElement('div');
        messageEl.className = `flex gap-3 mb-6 animate-fade-in ${type === 'user' ? 'justify-end' : ''}`;

        const avatarHtml = `<div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0 text-[10px] font-black text-white shadow-sm ${
            type === 'user' ? 'bg-indigo-500 order-2' : (type === 'bot' ? 'bg-gradient-to-tr from-purple-500 to-indigo-500' : 'bg-slate-700')
        }">${type === 'user' ? 'BẠN' : (type === 'bot' ? 'BOT' : 'AD')}</div>`;

        const bubbleClass = type === 'user' 
            ? 'bg-indigo-600 text-white rounded-2xl rounded-tr-none shadow-lg shadow-indigo-100' 
            : 'bg-white text-slate-700 rounded-2xl rounded-tl-none shadow-sm border border-slate-100';

        messageEl.innerHTML = `
            ${avatarHtml}
            <div class="max-w-[75%] space-y-1">
                <div class="${bubbleClass} p-4 text-sm font-medium leading-relaxed">
                    ${message}
                </div>
            </div>
        `;

        chatMessages.appendChild(messageEl);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function loadConversation() {
        fetch('/api/chat/history')
            .then(res => res.json())
            .then(messages => {
                // Clear skeleton
                chatMessages.innerHTML = '';
                if (messages.length === 0) {
                    addMessage('Bot', 'Xin chào! TechStore có thể giúp gì cho bạn hôm nay?', 'bot');
                } else {
                    messages.forEach(msg => {
                        addMessage(msg.name, msg.message, msg.sender_type);
                    });
                }
            });
    }
});
</script>
@else
<!-- Floating Login to Chat Button -->
<div class="fixed bottom-6 right-6 z-[60]">
    <a href="{{ route('login') }}" class="group flex items-center gap-4 bg-white/90 backdrop-blur-md p-3 pr-8 rounded-[1.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.1)] hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)] hover:scale-105 transition-all border border-white">
        <div class="bg-indigo-600 text-white p-4 rounded-2xl group-hover:rotate-12 transition-transform shadow-lg shadow-indigo-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <div class="flex flex-col">
            <span class="text-[10px] font-black text-indigo-500 uppercase tracking-widest leading-none mb-1">Hỗ trợ trực tuyến</span>
            <span class="text-sm font-bold text-slate-900 line-clamp-1">Đăng nhập để chat ngay</span>
        </div>
    </a>
</div>
@endauth

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
#chat-messages::-webkit-scrollbar { width: 6px; }
#chat-messages::-webkit-scrollbar-track { background: #f1f5f9; }
#chat-messages::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
#chat-messages::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

#chat-box { 
    flex-direction: column; 
    z-index: 100;
}
</style>
