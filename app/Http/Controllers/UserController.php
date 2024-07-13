<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'email' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required'],
            'address' => ['nullable'],
        ]);

        $user = User::query()->where('id', $id)->first();

        if ($request->file('image')) {
            $validated['image'] = 'storage/' . $request->file('image')->store('images');
        } else {
            $validated['image'] = $user->image;
        }

        $user->update($validated);
        return redirect('profile')->with('success', 'Berhasil diubah');
    }
}
