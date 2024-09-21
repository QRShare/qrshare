<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;

class CardsCreate extends Component
{
    use WithFileUploads;

    public string $slug;
    public string $title = "lorem";
    public string $description= 'lorem';
    public $date;
    public $images;

    public string $dateBgColor = '#ffffff';
    public string $dateTextColor = '#171717';
    public string $titleTextColor = '#171717';
    public string $descriptionTextColor = '#171717';

    public function submit()
    {
        dd('Enviando');
    }

    public function render()
    {
        return view('livewire.pages.cards-create');
    }
}
