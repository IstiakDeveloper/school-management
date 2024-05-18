<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;

class Register extends Component
{
    public string $name = '';
    public string $credential = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'credential' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function register()
    {
        $validated = $this->validate();

        $credentials = $validated['credential'];

        if (filter_var($credentials, FILTER_VALIDATE_EMAIL)) {
            $validated['email'] = $credentials;
        } else {
            $validated['phone'] = $credentials;
        }

        unset($validated['credential']);
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);
        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('dashboard');
    }
    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');
    }
}
