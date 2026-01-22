<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'anouncement'  => 'required|in:news,announcement', // Sesuai kolom migration
            'thumbnail'    => 'nullable|url', // Jika input text URL
            'published_at' => 'required|date',
            'expired_at'   => 'required|date|after:published_at',
        ]);

        $data['slug']      = Str::slug($data['title']);
        $data['user_id']   = auth()->id();
        $data['is_active'] = $request->has('is_active') ? true : true; // Default aktif jika tidak ada input toggle

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Data berhasil ditambahkan');
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
            'anouncement'  => 'required|in:news,announcement',
            'thumbnail'    => 'nullable|url',
            'published_at' => 'required|date',
            'expired_at'   => 'required|date|after:published_at',
        ]);

        $data['slug'] = Str::slug($data['title']);

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}