<?php

namespace App\Http\Controllers;

use App\Models\Equipo; //Usaremos de ejemplo el controlador de Equipos 
use App\Http\Requests\EquipoRequest;
use Illuminate\Http\RedirectResponse;

use App\Http\Services\FileUploadService; // Ver el codigo del servicio en la siguiente ruta

//Este es un ejemplo de un controllador que llama a un servicio para el registro de las imagenes y no repetir codigo
class Llamando_a_Servicios_Controller extends Controller
{
    public function __construct(protected FileUploadService $fileUploadService) {}

    public function store(EquipoRequest $request): RedirectResponse
    {
        $equipo = Equipo::create($request->all());
        $this->fileUploadService->upload($request, $equipo);
        return redirect()->route('admin.equipo.index')->with('success', __('view.datos_creado'));
    }

    public function update(EquipoRequest $request, Equipo $equipo): RedirectResponse
    {
        $this->fileUploadService->update($request, $equipo);
        $equipo->update($request->input());
        return redirect()->route('admin.equipo.index')->with('success', __('view.datos_actualizado'));
    }

    public function destroy(Equipo $equipo)
    {
        $this->fileUploadService->delete($equipo);
        $equipo->delete();
        return redirect()->route('admin.equipo.index')->with('danger', __('view.datos_eliminado'));
    }
}
