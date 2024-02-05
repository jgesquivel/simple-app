<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $editing=true;

        return view('users.edit', compact('user','editing'));
    }

    public function update(User $user)
    {
        $validated = request()->validate(
            [
                'name' => 'required|max:40',
                'username' => 'required|max:40',
                'bio' => 'nullable|max:255',
            ]
        );
        
        $user->update($validated);

        return redirect()->route('profile');
        
    }

    public function profile(){
        return $this->show(auth()->user());
    }
}
