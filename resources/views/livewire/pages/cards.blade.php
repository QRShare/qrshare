<div class="container flex flex-col-reverse items-start flex-grow mx-auto mb-12 mt-28 max-w-7xl sm:px-4 md:px-2 lg:px-0 md:flex-row">
    <!-- Main Hero Content -->
    <div class="flex flex-col flex-1 h-full max-h-full mx-auto mt-px text-left gap-y-4 ">
        @foreach ($pages as $page)
            {{-- <div class="transition-all group hover:pr-0 {{ $selected->id === $page->id ? 'pr-0' : 'pr-8' }}">
                <button wire:click="selectPage({{ $page->id }})"
                    class="bg-zinc-50 flex p-2 w-full border min-h-[120px] rounded-lg shadow gap-x-4 {{ $selected->id === $page->id ? 'bg-rose-600/20' : '' }}">
                    <div class="">
                        <img src="{{ $page->images[0][0] ?? 'https://picsum.photos/500' }}" alt="{{ $page->title }}"
                            class="rounded-lg aspect-square h-[100px]">
                    </div>
                    <div class="flex-1 text-left">
                        <h3 class="mb-1 font-medium line-clamp-1">{{ $page->title }}</h3>
                        <p class="line-clamp-3">{{ $page->description }}</p>
                    </div>
                </button>
            </div> --}}
            <div class="flex items-center overflow-hidden bg-white border rounded-lg shadow-sm border-neutral-200/60">
                <img class="object-cover w-1/3 rounded-lg h-36 aspect-video" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2370&q=80" />
                <div class="p-5">
                    <a href="#_" class="block mb-3">
                        <h5 class="text-xl font-bold leading-none tracking-tight line-clamp-2 text-neutral-900">{{ $page->title }}</h5>
                    </a>
                    <p class="mb-4 text-sm text-neutral-500 line-clamp-3">
                        {{ $page->description }}
                    </p>
                    <div class="">
                        <button wire:click="selectPage({{ $page->id }})" class="inline-flex items-center justify-between w-auto h-10 px-4 py-2 text-sm font-medium text-white transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-neutral-950 hover:bg-neutral-950/90">
                            <span>Preview</span>
                        </button>
                        <a wire:navigate.hover href="{{ route('web.cards.show', $page->slug) }}" class="inline-flex items-center justify-between w-auto h-10 px-4 py-2 text-sm font-medium transition-colors rounded-md group text-neutral-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
                            <span>Visitar</span>
                            <svg class="w-4 h-4 ml-2 -mr-1 transition-all duration-300 group-hover:translate-x-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>
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

                <livewire:components.time-difference :timestamp="$selected->date" bg_color="bg-[#B22222]"
                    text_color="text-white" />

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
