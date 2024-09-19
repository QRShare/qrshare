<div class="container flex flex-col-reverse items-center mx-auto max-w-7xl sm:px-4 md:px-2 lg:px-0 md:flex-row">
    <!-- Main Hero Content -->
    <div class="flex flex-col flex-1 h-full max-h-full px-6 py-4 mx-auto mt-px text-left gap-y-4 ">
        @foreach ($pages as $page)
            <div class=" transition-all group hover:pr-0 {{ $selected->id === $page->id ? 'pr-0' : 'pr-8' }}">
                <button wire:click="selectPage({{ $page->id }})"
                    class="flex p-2 w-full border min-h-[120px] rounded-lg shadow gap-x-4 {{ $selected->id === $page->id ? 'bg-rose-600/20' : '' }}">
                    <div class="">
                        <img src="{{ $page->images[0][0] ?? 'https://picsum.photos/500' }}" alt="{{ $page->title }}"
                            class="rounded-lg aspect-square h-[100px]">
                    </div>
                    <div class="flex-1 text-left">
                        <h3 class="mb-1 font-medium line-clamp-1">{{ $page->title }}</h3>
                        <p class="line-clamp-3">{{ $page->description }}</p>
                    </div>
                </button>
            </div>
        @endforeach

        <div class="">
            {{ $pages->links() }}
        </div>
    </div>

    <div class="flex-1 w-full h-full px-6 mt-8 sm:mt-0">
        <div class="pt-4 bg-white border shadow rounded-2xl">
            <div class="p-4">
                <img src="{{ $selected->images[0][0] ?? 'https://picsum.photos/500' }}" alt="{{ $selected->title }}"
                    class="object-cover w-full mb-8 rounded-lg aspect-video">

                <livewire:components.time-difference :timestamp="$selected->date" />

                <h3 class="mt-4 mb-2 text-2xl font-bold">{{ $selected->title }}</h3>
                <p class="text-gray-500">{{ $selected->description }}</p>
            </div>
            <div class="p-4">
                <p class="text-gray-500">{{ $selected->content }}</p>
            </div>
            <div class="flex justify-end p-4">
                <a wire:navigate.hover href="{{ route('web.cards.show', $selected->slug) }}">Visitar</a>
            </div>
        </div>
    </div>
</div>
