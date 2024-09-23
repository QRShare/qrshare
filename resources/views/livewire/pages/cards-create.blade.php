<div class="container flex flex-col h-full gap-8 mx-auto mb-12 lg:flex-row mt-28">
    <div class="flex-1">
        <form wire:submit.prevent='submit'
            class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
            <div class="px-4 py-6 sm:p-8">
                <div class="flex flex-col max-w-2xl gap-x-4 gap-y-4">
                    <div class="grid grid-cols-6 gap-4 col-span-full">
                        <div class="md:col-span-4 col-span-full xl:col-span-4 lg:col-span-full">
                            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">
                                Nome da Página
                            </label>
                            <div class="mt-2">
                                <div
                                    class="relative flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                    <label for="slug"
                                        class="flex items-center pl-3 text-gray-500 select-none sm:text-sm">{{
                                        preg_replace('/^(https?:\/\/)?(www\.)?/', '', config('app.url')) }}/p/</label>
                                    <input type="text" name="slug" id="slug" wire:model.lazy='slug' autocomplete="slug"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="julia-silva">
                                    <div class="absolute bottom-0 text-xs text-red-400 translate-y-full">
                                        @error('slug') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="relative md:col-span-2 col-span-full xl:col-span-2 lg:col-span-full">
                            <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Data *</label>
                            <div class="relative mt-2">
                                <div
                                    class="flex pl-1 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                    <input type="datetime-local" name="date" id="date" wire:model.lazy='date'
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" />
                                </div>
                                <div class="absolute bottom-0 text-xs text-red-400 translate-y-full">
                                    @error('date') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row items-end col-span-full gap-x-6">
                        <div class="flex-1">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Título
                                *</label>
                            <div class="relative mt-2">
                                <input type="text" name="title" id="title" wire:model.lazy='title' autocomplete="title"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <div class="absolute bottom-0 text-xs text-red-400 translate-y-full">
                                    @error('title') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row items-end col-span-full gap-x-6">
                        <div class="flex-1">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Mensagem
                                *</label>
                            <div class="relative mt-2">
                                <textarea id="description" name="description" wire:model.lazy='description' rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                <div class="absolute bottom-0 text-xs text-red-400 translate-y-full">
                                    @error('description') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="images" class="block text-sm font-medium leading-6 text-gray-900">Imagens *</label>
                        <div
                            class="relative flex justify-center px-6 py-10 mt-2 border border-dashed rounded-lg border-gray-900/25">
                            <div class="text-center">
                                <svg class="w-12 h-12 mx-auto text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="flex mt-4 text-sm leading-6 text-gray-600">
                                    <label for="images"
                                        class="relative font-semibold text-indigo-600 bg-white rounded-md cursor-pointer focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Suba sua imagens</span>
                                        <input multiple id="images" wire:model.lazy='images' name="images" type="file"
                                            class="sr-only">
                                    </label>
                                    <p class="pl-1">ou arraste e solte</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF de até 10MB</p>
                            </div>
                            <div class="absolute bottom-0 text-xs text-red-400 translate-y-full">
                                @error('images') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row flex-wrap gap-4 col-span-full">
                        <div class="flex flex-col items-center justify-center">
                            <label for="pageBgColor" class="block text-sm leading-6 text-gray-900 whitespace-nowrap">
                                Fundo da Página
                            </label>
                            <input type="color" wire:model.live='pageBgColor' name="pageBgColor"
                                class="block p-1 bg-white border border-gray-200 rounded-full cursor-pointer h-9 w-9 disabled:opacity-50 disabled:pointer-events-none"
                                id="pageBgColor" title="Choose your color">
                        </div>

                        <div class="flex flex-col items-center justify-center">
                            <label for="dateTextColor" class="block text-sm leading-6 text-gray-900 whitespace-nowrap">
                                Texto Contador
                            </label>
                            <input type="color" wire:model.live='dateTextColor'
                                class="block p-1 bg-white border border-gray-200 rounded-full cursor-pointer h-9 w-9 disabled:opacity-50 disabled:pointer-events-none"
                                id="dateTextColor" name="dateTextColor" title="Choose your color"
                                wire:change="changeDateColor('bg')">
                        </div>

                        <div class="flex flex-col items-center justify-center">
                            <label for="dateBgColor" class="block text-sm leading-6 text-gray-900 whitespace-nowrap">
                                Fundo do Contador
                            </label>
                            <input type="color" wire:model.live='dateBgColor' name="dateBgColor"
                                class="block p-1 bg-white border border-gray-200 rounded-full cursor-pointer h-9 w-9 disabled:opacity-50 disabled:pointer-events-none"
                                id="dateBgColor" title="Choose your color" wire:change="changeDateColor('text')">
                        </div>

                        <div class="flex flex-col items-center justify-center">
                            <label for="titleTextColor"
                                class="block text-sm leading-6 text-center text-gray-900 whitespace-nowrap">
                                Cor do Título
                            </label>
                            <input type="color" wire:model.live='titleTextColor' name="titleTextColor"
                                class="block p-1 bg-white border border-gray-200 rounded-full cursor-pointer h-9 w-9 disabled:opacity-50 disabled:pointer-events-none"
                                id="titleTextColor" title="Choose your color" wire:change="changeDateColor('text')">
                        </div>

                        <div class="flex flex-col items-center justify-center">
                            <label for="descriptionTextColor"
                                class="block text-sm leading-6 text-gray-900 whitespace-nowrap">
                                Cor da Messagem
                            </label>
                            <input type="color" wire:model.live='descriptionTextColor' name="descriptionTextColor"
                                class="block p-1 bg-white border border-gray-200 rounded-full cursor-pointer h-9 w-9 disabled:opacity-50 disabled:pointer-events-none"
                                id="descriptionTextColor" title="Choose your color">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end px-4 py-4 border-t gap-x-6 border-gray-900/10 sm:px-8">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                    Cancelar
                </button>
                <button type="submit"
                    class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Salvar
                </button>
            </div>
        </form>
    </div>

    <div class="flex flex-1">
        <div style="background-color: {{ $pageBgColor }}"
            class="flex-1 shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
            <div class="h-full px-4 py-6 overflow-auto sm:p-8">
                @if ($images)
                <img src="{{ asset($images[0]->temporaryUrl()) }}"
                    class="object-cover w-full mb-8 rounded-lg aspect-video">
                @endif

                @if ($date)
                <livewire:components.time-difference :timestamp="$date" :bg_color="$dateBgColor"
                    :text_color="$dateTextColor" />
                @endif

                @if ($title)
                <h3 class="mt-4 mb-2 text-2xl font-bold" style="color: {{ $titleTextColor }}">
                    {{ $title }}
                </h3>
                @endif

                @if ($description)
                <p style="color: {{ $descriptionTextColor }}">
                    {{ $description }}
                </p>
                @endif

                @if (!$images && !$date && !$title && !$description)
                <div class="flex items-center justify-center flex-1 h-full">
                    <h3 class="text-gray-500">Preencha os campos para exibir a visualização.</h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>