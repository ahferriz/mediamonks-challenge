<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Articles extends Component
{
    public $articulos = [];
    public $articulosBorrados = [];
    public Article $articulo;
    public $editModal = false;
    public $viewModal = false;
    
    protected $user;

    protected $rules = [
        'articulo.title' => 'required|string|min:3',
        'articulo.author' => 'nullable|string',
        'articulo.subtitle' => 'nullable|string|min:3',
        'articulo.content' => 'required|string|max:500',
    ];

    public function mount()
    {
        $this->articulos = Article::all();
        $this->articulosBorrados = Article::onlyTrashed()->get();
    }

    /**
     * Muestra vista
     */
    public function render()
    {
        return view('livewire.articles');
    }

    /**
     * Ver artículo
     */
    public function view(int $id)
    {
        if (auth()->user()->hasPermissionTo('ver articulo')) {
            $this->articulo = Article::find($id);
            $this->viewModal = true;
        }
    }

    /**
     * Crea nuevo artículo
     */
    public function create()
    {
        if (auth()->user()->hasPermissionTo('crear articulo')) {
            $this->articulo = new Article();
            $this->editModal = true;
        }
    }

    /**
     * Edita artículo
     */
    public function edit(int $id)
    {
        if (auth()->user()->hasPermissionTo('editar articulo')) {
            $this->articulo = Article::find($id);
            $this->editModal = true;
        }
    }

    /**
     * Guarda artículo
     */
    public function save()
    {
        if ($this->articulo->id) {
            if (auth()->user()->hasPermissionTo('editar articulo')) {
                $this->validate();
                $this->articulo->save();
                $this->editModal = false;
                $this->showFlash('Artículo actualizado');
                $this->mount();
            }
        } else {
            if (auth()->user()->hasPermissionTo('crear articulo')) {
                $this->validate();
                $this->articulo->save();
                $this->editModal = false;
                $this->showFlash('Artículo creado');
                $this->mount();
            }
        }
    }

    /**
     * Borra artículo
     */
    public function delete(int $id)
    {
        if (auth()->user()->hasPermissionTo('borrar articulo')) {
            Article::find($id)->delete();
            $this->showFlash('Artículo borrado', 'info');
            $this->mount();
        }
    }

    /**
     * Restaura artículo borrado
     */
    public function restore(int $id)
    {
        if (auth()->user()->hasPermissionTo('restaurar articulo')) {
            Article::withTrashed()->find($id)->restore();
            $this->showFlash('Artículo restaurado');
            $this->mount();
        }
    }


    public function closeViewModal()
    {
        $this->viewModal = false;
    }

    public function closeEditModal()
    {
        $this->editModal = false;
    }

    /**
     * Restaura artículo borrado
     */
    private function showFlash(string $text, string $icon = 'success') {
        $this->dispatchBrowserEvent('swal', [
            'title' => $text,
            'toast' => true,
            'timer' => 2000,
            'timerProgressBar' => true,
            'icon' => $icon,
            'showConfirmButton' => false,
            'position' => 'top-end',            
        ]);
    }

}
