@props([
'type',
])

<div>
    @if($type == 'light')
    <a href="{{ route('web.home') }}" class="-m-1.5 p-1.5">
        <span class="sr-only">QRShare</span>
        <h2 class="text-2xl font-bold text-white">QRShare</h2>
    </a>
    @else
    <a href="{{ route('web.home') }}" class="-m-1.5 p-1.5">
        <span class="sr-only">QRShare</span>
        <h2
            class="inline-block text-2xl font-bold text-transparent bg-gradient-to-bl from-indigo-500 via-purple-500 to-pink-500 bg-clip-text">
            QRShare
        </h2>
    </a>
    @endif
</div>