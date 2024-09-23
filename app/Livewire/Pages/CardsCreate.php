<?php

namespace App\Livewire\Pages;

use App\Models\Page;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CardsCreate extends Component
{
    use WithFileUploads;

    public string $slug;
    public string $title;
    public string $description;
    public $date;
    public $images;

    public string $dateBgColor = '#ffffff';
    public string $dateTextColor = '#171717';
    public string $titleTextColor = '#171717';
    public string $descriptionTextColor = '#171717';
    public string $pageBgColor = '#ffffff';

    public function changeDateColor(string $type)
    {
        $this->dispatch('colorUpdated', bg_color: $this->dateBgColor, text_color: $this->dateTextColor);
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'nullable|string|max:255|unique:pages,slug',
            'date' => 'required|date',
            'images.*' => 'nullable|image', // Cada imagem com no máximo 1MB
            'dateBgColor' => 'required|string|max:7',
            'dateTextColor' => 'required|string|max:7',
            'titleTextColor' => 'required|string|max:7',
            'descriptionTextColor' => 'required|string|max:7',
            'pageBgColor' => 'required|string|max:7',
        ]);

        try {
            // Criação do slug, se necessário
            if (empty($this->slug)) {
                $this->slug = Str::slug($this->title);
            }

            // Upload das imagens se existirem
            $imagesPath = [];
            if ($this->images) {
                foreach ($this->images as $image) {
                    $imagesPath[] = Storage::disk('public')->put('pages/'.$this->slug, $image); // Salva as imagens na pasta 'pages' no MinIO
                }
            }

            // Criação da página no banco de dados
            $page = Page::create([
                'title' => $this->title,
                'description' => $this->description,
                'slug' => $this->slug,
                'user_id' => auth()->id(), // O ID do usuário autenticado
                'images' => json_encode($imagesPath), // Armazena as imagens como JSON
                'date' => $this->date,
                'date_bg_color' => $this->dateBgColor,
                'date_text_color' => $this->dateTextColor,
                'title_text_color' => $this->titleTextColor,
                'description_text_color' => $this->descriptionTextColor,
                'page_bg_color' => $this->pageBgColor,
            ]);

            $page->save();

            // Exibe uma mensagem de sucesso e limpa os dados
            session()->flash('message', 'Página criada com sucesso!');
            $this->redirect(route('web.cards.show', $this->slug));
        } catch (Throwable $error) {
            // Log the error or handle it as needed
            Log::error($error->getMessage());

            // Return a custom error response
            return response()->json(['error' => 'There was an error creating the user.'], 500);
        }
    }

    public function render()
    {
        return view('livewire.pages.cards-create');
    }
}
