<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        // Pastikan view mengarah ke folder yang benar, misalnya admin.posts.index
        return view('admin.posts.index', compact('posts'));
    }

    public function publicIndex()
    {
        $posts = Post::where('is_active', true)
            ->where('published_at', '<=', now())
            ->where('expired_at', '>=', now())
            ->latest()
            ->get();
        return view('pages.berita', compact('posts'))->with([
            'seo_title' => 'Berita Terbaru - SMPN 4 Genteng',
            'seo_description' => 'Baca berita dan informasi terbaru dari SMPN 4 Genteng.',
            'seo_keywords' => 'berita smpn 4 genteng, update smpn 4 genteng, informasi sekolah',
        ]);
    }

    public function show(Post $post)
    {
        return view('pages.berita-show', compact('post'))->with([
            'seo_title' => $post->title . ' - SMPN 4 Genteng',
            'seo_description' => Str::limit(strip_tags($post->content), 150),
            'seo_keywords' => Str::slug($post->title, ',') . ', smpn 4 genteng',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required',
            'announcement' => 'required|in:news,announcement',
            'thumbnail'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'required|date_format:Y-m-d\TH:i',
            'expired_at'   => 'required|date_format:Y-m-d\TH:i|after:published_at',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('posts', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        $data['slug']      = Str::slug($data['title']);
        $data['user_id']   = auth()->id();
        $data['is_active'] = $request->has('is_active') ? true : false;

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required',
            'announcement' => 'required|in:news,announcement',
            'thumbnail'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'required|date_format:Y-m-d\TH:i',
            'expired_at'   => 'required|date_format:Y-m-d\TH:i|after:published_at',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail && !filter_var($post->thumbnail, FILTER_VALIDATE_URL) && Storage::disk('public')->exists($post->thumbnail)) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('posts', 'public');
        }

        $data['slug'] = Str::slug($data['title']);
        $data['is_active'] = $request->has('is_active') ? true : false;

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->thumbnail && !filter_var($post->thumbnail, FILTER_VALIDATE_URL) && Storage::disk('public')->exists($post->thumbnail)) {
            Storage::disk('public')->delete($post->thumbnail);
        }
        $post->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}