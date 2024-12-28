<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate]
    public string $email = '';
    #[Validate]
    public string $password = '';
    #[Validate]
    public bool $remember = false;

    public function rules()
    {
        return [
            'email' => ['required','email','exists:users,email'],
            'password' => ['required','string'],
            'remember' => ['bool']
        ];
    }
}
