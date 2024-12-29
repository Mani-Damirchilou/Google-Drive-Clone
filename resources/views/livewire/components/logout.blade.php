<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public function logout()
    {
        Auth::logout();
        session()->regenerate();
        session()->regenerateToken();
        $this->notify('danger',__('notifications.logout'));
        $this->redirectRoute('login',navigate: true);
    }
}; ?>

<div>
    <x-ui.button wire:loading.attr="disabled" wire:target="logout" wire:click="logout"
                 class="hover:bg-base-300 bg-red-500/10 border border-red-500 text-red-500 btn-circle btn-sm">
        <x-ui.button.loading target="logout" class="loading-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9"/>
            </svg>
        </x-ui.button.loading>
    </x-ui.button>
</div>
