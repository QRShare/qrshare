<div class="flex items-center justify-center w-screen h-full min-h-screen"
    style="background-color: {{ $page->page_bg_color ?? '#ffffff' }}">
    <div style="background-color: {{ $page->page_bg_color ?? '#ffffff' }}" class="max-w-2xl py-4 bg-white rounded-lg">
        <div class="p-4">
            @if ($page->images)
            <img src="{{ !empty(json_decode($page->images)[0]) ? asset('storage/' . json_decode($page->images)[0]) : asset('src/images/general/no-image.jpg') }}"
                alt="{{ $page->title }}" class="object-cover w-full mb-8 rounded-lg aspect-video">
            @endif

            @if ($page->date)
            <livewire:components.time-difference :timestamp="$page->date" :bg_color="$page->date_bg_color"
                :text_color="$page->date_text_color" />
            @endif

            @if ($page->title)
            <h3 class="mt-4 mb-2 text-2xl font-bold" style="color: {{ $page->title_text_color }}">{{
                $page->title }}</h3>
            @endif
            @if ($page->description)
            <p class="text-gray-500" style="color: {{ $page->description_text_color }}">{{
                $page->description }}</p>
            @endif
        </div>
    </div>
</div>