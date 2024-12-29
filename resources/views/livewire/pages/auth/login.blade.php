<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Volt\Component;

new class extends Component {

    public LoginForm $form;

    public function rendering(View $view)
    {
        $view->title(__('pages.login.title'));
    }

    public function login()
    {
        $this->form->validate();

        if (RateLimiter::tooManyAttempts($this->form->email, 5)) {
            throw ValidationException::withMessages([
                'email' => __('auth.throttle', ['seconds' => RateLimiter::availableIn($this->form->email)])
            ]);
        }
        if (!Auth::attempt($this->form->only('email','password'),$this->form->remember))
        {
            RateLimiter::hit($this->form->email);
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }
        RateLimiter::clear($this->form->email);
        session()->regenerate();
        $this->form->reset();
        $this->notify('success',__('notifications.login-success'));
        $this->redirectIntended(navigate: true);
    }

}; ?>

<x-layouts.guest>
    <x-partials.auth-heading :text="__('pages.login.title')"/>

    <x-forms.error-bag/>

    <form wire:submit="login" class="flex flex-col">

        <x-forms.inputs.text wire:model="form.email" class="rounded-b-none"
                             :placeholder="__('validation.attributes.email')" wire:model="form.email"/>

        <x-forms.inputs.password wire:model="form.password" class="rounded-t-none"
                                 :placeholder="__('validation.attributes.password')" wire:model="form.password"/>

        <x-forms.inputs.checkbox wire:model="form.remember" class="my-4" :label="__('validation.attributes.remember')"/>

        <x-ui.button class="bg-base-100 btn-ghost">
            <x-ui.button.loading target="login">
                @lang('pages.login.submit')
            </x-ui.button.loading>
        </x-ui.button>

        <x-partials.auth-link :text="__('pages.login.register')" href="{{route('register')}}"/>

    </form>
</x-layouts.guest>
