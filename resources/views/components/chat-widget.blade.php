<!-- Chat Widget -->
<div id="chat-widget" class="fixed bottom-4 right-4 z-50">
    <!-- Chat Button -->
    <div id="chat-toggle" class="chat-btn cursor-pointer bg-indigo-600 text-white p-4 rounded-full shadow-lg hover:bg-indigo-700 transition-all hover:scale-110 duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
    </div>

    <!-- Chat Box -->
    <div id="chat-box" class="hidden w-80 h-96 bg-white shadow-xl rounded-lg overflow-hidden flex flex-col" style="display:none;">
        <div class="px-4 py-2 bg-indigo-600 text-white flex items-center justify-between">
            <div class="font-semibold">Hỗ trợ trực tuyến</div>
            <button id="chat-close" class="text-white">×</button>
        </div>

        <div id="chat-messages" class="flex-1 p-3 overflow-y-auto bg-slate-50"></div>

        <div class="p-3 border-t bg-white">
            <div id="user-info-section" class="mb-2">
                <input id="chat-name" type="text" placeholder="Tên của bạn" class="input input-sm w-full mb-2" />
                <input id="chat-email" type="email" placeholder="Email (để nhận thông báo)" class="input input-sm w-full" />
            </div>

            <form id="chat-form" class="flex gap-2 items-end">
                <textarea id="chat-message" rows="2" class="textarea textarea-sm flex-1" placeholder="Nhập tin nhắn..."></textarea>
                <button type="submit" id="chat-submit" class="btn btn-primary btn-sm">Gửi</button>
            </form>
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
    const userInfoSection = document.getElementById('user-info-section');

    // Server-provided user (if authenticated)
    const IS_LOGGED_IN = @json(Auth::check());
    const SERVER_NAME = @json(Auth::check() ? Auth::user()->name : null);
    const SERVER_EMAIL = @json(Auth::check() ? Auth::user()->email : null);

    // saved data in localStorage (fallback)
    let savedName = localStorage.getItem('chat_name');
    let savedEmail = localStorage.getItem('chat_email');

    // If user is logged in, prefer server info and persist it
    if (IS_LOGGED_IN && SERVER_NAME && SERVER_EMAIL) {
        savedName = SERVER_NAME;
        savedEmail = SERVER_EMAIL;
        localStorage.setItem('chat_name', savedName);
        localStorage.setItem('chat_email', savedEmail);
    }

    // Pre-fill saved name and email (if present)
    if (savedName) {
        document.getElementById('chat-name').value = savedName;
    }
    if (savedEmail) {
        document.getElementById('chat-email').value = savedEmail;
    }

    // Hide user info section if both are saved
    if (savedName && savedEmail) {
        userInfoSection.style.display = 'none';
    }

    // Conversation persistence
    const storedConv = localStorage.getItem('chat_conversation_id');
    if (storedConv) {
        loadConversation(storedConv);
    }

    // Toggle chat box
    chatToggle.addEventListener('click', function() {
        if (chatBox.style.display === 'none' || !chatBox.style.display) {
            chatBox.style.display = 'flex';
            document.getElementById('chat-message').focus();
        } else {
            chatBox.style.display = 'none';
        }
    });

    chatClose.addEventListener('click', function() {
        chatBox.style.display = 'none';
    });

    // Send message
    chatForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        const name = document.getElementById('chat-name').value || '';
        const email = document.getElementById('chat-email').value || '';
        const message = document.getElementById('chat-message').value || '';

        if (!message.trim()) return;

        try {
            const response = await fetch('/api/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ name, email, message })
            });

            const data = await response.json();

            if (data.success) {
                localStorage.setItem('chat_conversation_id', data.conversation_id);
                if (name) localStorage.setItem('chat_name', name);
                if (email) localStorage.setItem('chat_email', email);

                // hide inputs for future (if provided)
                if (localStorage.getItem('chat_name') && localStorage.getItem('chat_email')) {
                    userInfoSection.style.display = 'none';
                }

                // Add user message to chat
                addMessage(name || 'Bạn', message, 'user');
                document.getElementById('chat-message').value = '';

                // If bot has reply, reload conversation to show it
                if (data.bot_reply) {
                    setTimeout(() => loadConversation(data.conversation_id), 500);
                }
            } else {
                console.error('Chat error', data);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });

    function addMessage(name, message, type) {
        const messageEl = document.createElement('div');
        messageEl.className = type === 'user' ? 'flex gap-2 justify-end mb-2' : 'flex gap-2 mb-2';

        const avatar = document.createElement('div');
        avatar.className = `w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 text-xs font-bold text-white ${
            type === 'user' ? 'bg-blue-600 order-2' : 'bg-indigo-600'
        }`;
        avatar.textContent = type === 'user' ? (name ? name.charAt(0).toUpperCase() : 'B') : 'TB';

        const bubble = document.createElement('div');
        bubble.className = `p-3 rounded-lg text-sm max-w-xs ${
            type === 'user' ? 'bg-blue-600 text-white' : 'bg-white text-slate-700'
        }`;
        bubble.textContent = message;

        if (type === 'user') {
            messageEl.appendChild(bubble);
            messageEl.appendChild(avatar);
        } else {
            messageEl.appendChild(avatar);
            messageEl.appendChild(bubble);
        }

        chatMessages.appendChild(messageEl);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function loadConversation(convId) {
        fetch(`/api/chat/${convId}`)
            .then(res => res.json())
            .then(messages => {
                chatMessages.innerHTML = '';
                messages.forEach(msg => {
                    addMessage(msg.name, msg.message, msg.sender_type);
                });
            })
            .catch(err => console.error('Error loading conversation:', err));
    }
});
</script>

<style>
#chat-box { flex-direction: column; }
#chat-messages { min-height: 120px; }
#chat-messages::-webkit-scrollbar { width: 6px; }
#chat-messages::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 3px; }
#chat-messages::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
#chat-messages::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>
