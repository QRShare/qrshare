<div
    class="flex flex-col items-center justify-center flex-grow h-full min-h-screen sm:justify-center sm:pt-0 bg-gradient-to-bl from-indigo-500 via-purple-500 to-pink-500">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full px-6 py-4 mt-2 overflow-hidden sm:max-w-md sm:rounded-lg">
        {{ $slot }}
    </div>
</div>