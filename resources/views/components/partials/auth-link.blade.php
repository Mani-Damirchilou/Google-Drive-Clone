@props([
    'text'
])
<a {{$attributes->only('href')}} wire:navigate class="link text-center my-4">
    {{$text}}
</a>
