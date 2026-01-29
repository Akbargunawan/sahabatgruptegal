<div
    id="chatbot"
    class="fixed bottom-24 right-6 w-80 h-[480px] bg-blue-500 rounded-xl shadow-2xl hidden flex flex-col z-50"
>

    <!-- HEADER -->
    <div class="flex items-center justify-between px-4 py-3 border-b border-blue-300 text-white">
        <h3 class="font-semibold">Chatbot</h3>
        <button onclick="toggleChatbot()">✕</button>
    </div>

    <!-- CHAT BODY -->
    <div class="flex-1 p-4 space-y-3 overflow-y-auto text-sm">

        <div class="bg-white text-gray-800 rounded-lg px-3 py-2 w-fit max-w-[75%]">
            Halo selamat datang, ada yang bisa di bantu?
        </div>

        <div class="bg-blue-600 text-white rounded-lg px-3 py-2 w-fit ml-auto max-w-[75%]">
            iya saya ingin bertanya
        </div>

        <div class="bg-white text-gray-500 rounded-lg px-3 py-2 w-fit italic">
            sedang mengetik.....
        </div>

    </div>

    <!-- INPUT -->
    <div class="border-t border-blue-300 p-3 flex items-center gap-2 bg-blue-500">
        <input
            type="text"
            placeholder="Tulis pesan anda"
            class="flex-1 bg-transparent text-white placeholder-blue-200 outline-none text-sm"
        >
        <button class="text-white">
            ➤
        </button>
    </div>
</div>
