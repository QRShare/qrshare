<section class="w-full h-screen antialiased bg-white">
    <div class="h-full mx-auto max-w-7xl">
        <livewire:components.header />

        <div class="container flex items-center mx-auto">
            <!-- Main Hero Content -->
            <div
                class="container flex flex-col flex-1 h-full max-w-sm py-4 mx-auto mt-px text-left gap-y-4 sm:max-w-md md:max-w-lg">
                @foreach ($pages as $page)
                    <div class=" transition-all group hover:pr-0 {{ $selected->id === $page->id ? 'pr-0' : 'pr-8' }}">
                        <button wire:click="selectPage({{ $page->id }})"
                            class="flex p-2 border rounded-lg shadow gap-x-4 {{ $selected->id === $page->id ? 'bg-rose-600/20' : '' }}">
                            <div class="">
                                <img src="{{ $page->images[0] }}" alt="{{ $page->title }}"
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

            <div class="flex-1 h-full px-2">
                <div class="pt-4 bg-white border rounded-2xl">
                    <div class="p-4">
                        <img src="{{ $page->images[0] }}" alt="{{ $selected->title }}"
                            class="object-cover w-full mb-8 rounded-lg aspect-video">

                        {{-- <livewire:components.time-difference :timestamp="$selected->date" /> --}}

                        <h3 class="mt-4 mb-2 text-2xl font-bold">{{ $selected->title }}</h3>
                        <p class="text-gray-500">{{ $selected->description }}</p>
                    </div>
                    <div class="p-4">
                        <p class="text-gray-500">{{ $selected->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
