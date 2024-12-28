<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate]
    public string $name = '';
    #[Validate]
    public string $email = '';
    #[Validate]
    public string $password = '';
    #[Validate]
    public string $password_confirmation = '';

    public function rules()
    {
        return [
            'name' => ['required','string','min:3','max:30'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required',Password::min(8)->letters()->mixedCase()->numbers()->symbols(),'confirmed']
        ];
    }
}
