@props([
    'target'
])
<div>
    <span wire:loading wire:target="{{$target}}" {{$attributes->merge(['class' => 'loading'])}}></span>
    <span wire:loading.remove wire:target="{{$target}}">
        {{$slot}}
    </span>
</div>
