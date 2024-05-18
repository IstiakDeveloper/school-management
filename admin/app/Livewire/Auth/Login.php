<?php

namespace App\Livewire\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    public string $credential = '';
    public string $password = '';
    public bool $remember = false;

    protected function rules()
    {
        return [
            'credential' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function login()
    {
        $validated = $this->validate();

        $credentials = [
            filter_var($validated['credential'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone' => $validated['credential'],
            'password' => $validated['password']
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            return redirect()->route('dashboard');
        }

        throw ValidationException::withMessages([
            'credential' => [__('auth.failed')],
        ]);
    }
    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }
}
