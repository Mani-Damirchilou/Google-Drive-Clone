@props([
    'label'
])
<div {{$attributes->merge(['class' => 'form-control'])}}>
    <label class="label cursor-pointer">
        @isset($label)
            <span class="label-text">{{$label}}</span>
        @endisset
        <input type="checkbox" class="checkbox" {{$attributes->except(['class'])}}/>
    </label>
</div>
