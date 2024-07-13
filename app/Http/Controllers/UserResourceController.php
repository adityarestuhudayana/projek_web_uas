<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users', [
            'users' => User::query()->latest()->get()
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
        $validated = $request->validate([
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required'],
            'address' => ['nullable'],
            'is_admin' => ['required'],
        ]);
        $validated['image'] = 'storage/' . $request->file('image')->store('images');

        User::create($validated);

        return redirect()->back()->with('success', 'Berhasil');
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
        return view('admin.edit_user', [
            'user' => User::query()->firstWhere('id', $id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'email' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required'],
            'address' => ['nullable'],
            'is_admin' => ['required'],
        ]);

        $user = User::query()->where('id', $id)->first();

        if ($request->file('image')) {
            $validated['image'] = 'storage/' . $request->file('image')->store('images');
        } else {
            $validated['image'] = $user->image;
        }

        $user->update($validated);
        return redirect('users')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::query()->firstWhere('id', $id);
        $user->delete();
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus');
    }
}
