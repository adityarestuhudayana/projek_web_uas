<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.comments', [
            'comments' => Comment::query()->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.edit_comment', [
            'comment' => Comment::query()->firstWhere('id', $id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'comment' => ['required'],
        ]);

        $comment = Comment::query()->where('id', $id)->first();

        $comment->update($validated);
        return redirect('comments')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::query()->firstWhere('id', $id);
        $comment->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus');
    }
}
