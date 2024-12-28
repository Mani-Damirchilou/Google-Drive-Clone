<?php

use App\Livewire\Forms\RegisterForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Livewire\Volt\Component;

new class extends Component {

    public RegisterForm $form;

    public function rendering(View $view)
    {
        $view->title(__('pages.register.title'));
    }

    public function register()
    {
        $this->form->validate();

        $user = User::create($this->form->only('name', 'email', 'password'));

        Auth::login($user);

        $this->form->reset();

        $this->redirectRoute('index', navigate: true);
    }

}; ?>

<x-layouts.guest>

    <x-partials.auth-heading :text="__('pages.register.title')"/>

    <x-forms.error-bag/>

    <form class="flex flex-col" wire:submit="register">
        <x-forms.inputs.text class="rounded-b-none" :placeholder="__('validation.attributes.name')"
                             wire:model="form.name"/>

        <x-forms.inputs.text class="rounded-none" :placeholder="__('validation.attributes.email')"
                             wire:model="form.email"/>

        <x-forms.inputs.password class="rounded-none" :placeholder="__('validation.attributes.password')"
                                 wire:model="form.password"/>

        <x-forms.inputs.password class="rounded-t-none" :placeholder="__('validation.attributes.password_confirmation')"
                                 wire:model="form.password_confirmation"/>

        <x-ui.button class="bg-base-100 mt-10">
            <x-ui.button.loading target="register" class="loading-spinner">
                @lang('pages.register.submit')
            </x-ui.button.loading>

        </x-ui.button>

        <x-partials.auth-link href="{{route('login')}}" :text="__('pages.register.login')"/>

    </form>
</x-layouts.guest>
