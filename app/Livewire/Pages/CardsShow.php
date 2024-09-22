<?php

namespace App\Livewire\Pages;

use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CardsShow extends Component
{
    public Page $page;

    public function mount($slug)
    {
        $this->page = Page::findBySlug($slug);
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.pages.cards-show');
    }
}
