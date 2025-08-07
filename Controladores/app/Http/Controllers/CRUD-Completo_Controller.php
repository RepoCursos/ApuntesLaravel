<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

use App\Models\Video;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CRUDCompleto_Controller extends Controller
{
//Ejemplo Modelo Video
    public function index(): View
    {
        $videos = Video::all();
        return view('admin.video.index', compact('videos'));
    }

    public function create(): View
    {
        return view('admin.video.create');
    }

    public function store(VideoRequest $request): RedirectResponse
    {
        Video::create($request->all());
        return redirect()->route('admin.video.index')->with('success', 'video creado');
    }

    public function show(Video $video)
    {
        return view('admin.video.edit', compact('video'));
    }

    public function edit(Video $video): View
    {
        return view('admin.video.edit', compact('video'));
    }

    public function update(VideoRequest $request, Video $video): RedirectResponse
    {
        $video->update($request->all());
        return redirect()->route('admin.video.index')->with('succes', 'video Actualizado');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return back()->with('danger', 'Arbitro eliminado');
    }
}
