<?php

namespace App\Livewire\Pages;

use App\Models\Page;
use Livewire\Attributes\Url;
use Livewire\Component;

class Cards extends Component
{
    #[Url('')]
    public Page $selected;

    public function selectPage(Page $page)
    {
        $this->selected = $page;
        $this->dispatch('timestamp-updated', ['timestamp' => (string) $page->date]);
        $this->dispatch('change-card', $page->date);
    }

    public function mount()
    {
        $this->selected = Page::first();
    }

    public function render()
    {
        $pages = Page::simplePaginate(5);

        return view('livewire.pages.cards', [
            'pages' => $pages
        ]);
    }
}
