<div class="flex items-center justify-center w-screen h-full min-h-screen"
    style="background-color: {{ $page->page_bg_color ?? '#ffffff' }}">
    <div style="background-color: {{ $page->page_bg_color ?? '#ffffff' }}" class="max-w-2xl py-4 bg-white rounded-lg">
        <div class="p-4">
            @if ($page->images)
            <!-- Slider main container -->
            <div class="swiper pagesSlidderSwiper" data-swiper-autoplay="2000">
                <div class="swiper-wrapper">
                    @foreach(json_decode($page->images) as $image)
                    <div class="mb-8 swiper-slide">
                        <img src="{{ !empty($image) ? asset(config('filesystems.disks.r2.url_public') . $image) : asset('src/images/general/no-image.jpg') }}"
                            alt="{{ $page->title }}" class="object-cover w-full rounded-lg aspect-video">
                    </div>
                    @endforeach
                </div>
                {{-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> --}}
            </div>


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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var themeColorMeta = document.getElementById('theme-color-meta');
        themeColorMeta.setAttribute('content', '{{ $page->page_bg_color ?? '#ffffff' }}');
    });
</script>