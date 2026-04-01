<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TarjetaFantasma extends Component
{
    /**
     * Create a new component instance.
     */

    public string $nombre;
    public string $descripcion;
    public string $detalleAdicional;

    public function __construct(string $nombre, string $descripcion, string $detalleAdicional)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->detalleAdicional = $detalleAdicional;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tarjeta-fantasma');
    }
}
