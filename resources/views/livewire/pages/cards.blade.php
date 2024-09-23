<div class="container flex flex-col-reverse items-start h-full mx-auto mb-12 mt-28 sm:px-4 md:px-2 lg:px-0 md:flex-row">
    <!-- Main Hero Content -->
    <div class="flex flex-col flex-1 h-full max-h-full mt-px text-left gap-y-4">
        @if (count($pages))
        @foreach ($pages as $page)
        <div class="flex items-center overflow-hidden bg-white border rounded-lg shadow-sm border-neutral-200/60">
            <img class="object-cover w-1/3 h-full rounded-lg aspect-square"
                src="{{ json_decode($page->images)[0] ? asset('storage/' . json_decode($page->images)[0]) : asset('src/images/general/no-image.jpg') }}" />
            <div class="px-6 py-2">
                <button wire:click="selectPage({{ $page->id }})" class="block mb-3 text-left">
                    <h5 class="text-xl font-bold leading-none tracking-tight line-clamp-2 text-neutral-900">
                        {{ $page->title }}</h5>
                </button>
                <p class="mb-4 text-sm text-neutral-500 line-clamp-3">
                    {{ $page->description }}
                </p>
                <div class="">
                    <button wire:click="selectPage({{ $page->id }})"
                        class="inline-flex items-center justify-between w-auto h-10 px-4 py-2 text-sm font-medium text-white transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-neutral-950 hover:bg-neutral-950/90">
                        <span>Preview</span>
                    </button>
                    <a wire:navigate.hover href="{{ route('web.cards.show', $page->slug) }}"
                        class="inline-flex items-center justify-between w-auto h-10 px-4 py-2 text-sm font-medium transition-colors rounded-md group text-neutral-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
                        <span>Visitar</span>
                        <svg class="w-4 h-4 ml-2 -mr-1 transition-all duration-300 group-hover:translate-x-1"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="flex items-center overflow-hidden bg-white border rounded-lg shadow-sm border-neutral-200/60">
            <div class="flex items-center justify-center w-full p-4">
                <h3 class="text-center text-gray-500">Não foi encontrada nenhuma página, cadastre a primeira agora
                    mesmo.</h3>
            </div>
        </div>
        @endif
        <div class="">
            {{ $pages->links() }}
        </div>
    </div>

    <div class="flex-1 w-full h-full pl-6 mt-8 sm:mt-0">
        <div style="background-color: {{ $selected->page_bg_color ?? '#ffffff' }}"
            class="h-full py-4 bg-white border rounded-lg shadow">
            @if ($selected)
            <div class="p-4">
                @if ($selected->images)
                <img src="{{ json_decode($page->images)[0] ? asset('storage/' . json_decode($page->images)[0]) : asset('src/images/general/no-image.jpg') }}"
                    alt="{{ $selected->title }}" class="object-cover w-full mb-8 rounded-lg aspect-video">
                @endif

                @if ($selected->date)
                <livewire:components.time-difference :timestamp="$selected->date" :bg_color="$selected->date_bg_color"
                    :text_color="$selected->date_text_color" />
                @endif

                @if ($selected->title)
                <h3 class="mt-4 mb-2 text-2xl font-bold" style="color: {{ $selected->title_text_color }}">{{
                    $selected->title }}</h3>
                @endif
                @if ($selected->description)
                <p class="text-gray-500" style="color: {{ $selected->description_text_color }}">{{
                    $selected->description }}</p>
                @endif
            </div>
            <div class="flex justify-end p-4">
                <a wire:navigate.hover href="{{ route('web.cards.show', $selected->slug) }}">Visitar</a>
            </div>
            @else
            <div class="flex items-center justify-center">
                <h3 class="text-gray-500">Selecione um cartão para exibir a visualização.</h3>
            </div>
            @endif
        </div>
    </div>
</div>