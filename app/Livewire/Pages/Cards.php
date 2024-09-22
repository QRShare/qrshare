<?php

namespace App\Livewire\Pages;

use App\Models\Page;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Cards extends Component
{
    use WithPagination;

    #[Url('')]
    public Page|null $selected;

    public function selectPage(Page $page)
    {
        $this->selected = $page;
        $this->dispatch('timestamp-updated', ['timestamp' => (string) $page->date]);
        $this->dispatch('change-card', $page->date);
    }

    public function mount()
    {
        $this->selected = Page::orderBy('updated_at', 'desc')->first();
    }

    public function render()
    {
        $pages = Page::orderBy('updated_at', 'desc')->simplePaginate(4);

        return view('livewire.pages.cards', [
            'pages' => $pages
        ]);
    }
}
