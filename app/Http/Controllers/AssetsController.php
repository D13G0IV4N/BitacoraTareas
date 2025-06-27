<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AssetsController extends Controller
{
    public function index()
    {
        $assets = Assets::orderBy('created_at', 'desc')->get();
        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        return view('assets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:4096',
            'video' => 'nullable|mimetypes:video/mp4,video/avi|max:51200',
        ]);

        $asset = new Assets();
        $asset->title = $data['title'] ?? null;

        if ($request->hasFile('image')) {
            $pathImg = Storage::disk('images')->putFile('', $request->file('image'));
            $asset->image = $pathImg;
        }

        if ($request->hasFile('video')) {
            $pathVid = Storage::disk('videos')->putFile('', $request->file('video'));
            $asset->video_path = $pathVid;
        }

        $asset->save();

        return redirect()->route('assets.index')->with('success', 'Asset subido y registrado correctamente.');
    }

    public function getImage(string $filename): Response
    {
        $path = Storage::disk('images')->path($filename);
        abort_unless(file_exists($path), 404);
        return response()->file($path);
    }

    public function getVideo(string $filename): Response
    {
        $path = Storage::disk('videos')->path($filename);
        abort_unless(file_exists($path), 404);
        return response()->file($path);
    }
}
