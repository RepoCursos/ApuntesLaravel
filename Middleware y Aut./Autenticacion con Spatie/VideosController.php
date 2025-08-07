<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VideosController extends Controller
{
    //Ejemplo de alcance de un middleware
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $datos = $request->all();
            $datos['plataforma'] = strtoupper($request->plataforma);
            $request->replace($datos);
            $response = $next($request);
            return $response;
        })->only(['store', 'update']);
    }

    public function index(): View
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    public function create(): View
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video' => ['required'],
            'plataforma' => ['required']
        ]);

        Video::create($request->all());
        return redirect()->route('videos.create')->with('success', 'Video Guardado');
    }

    public function show(Video $video): View
    {
        return view('videos.show', compact('video'));
    }

    public function edit(Video $video): View
    {
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'video' => ['required'],
            'plataforma' => ['required']
        ]);

        $video->update($request->all());
        return redirect()->route('videos.index')->with('success', 'Video actualizado');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->with('danger', 'Video eliminado');
    }
}
