@props([
    'label'
])
<div {{$attributes->merge(['class' => 'form-control'])}}>
    <label class="label cursor-pointer">
        <span class="label-text">{{$label}}</span>
        <input type="checkbox" checked="checked" class="checkbox" {{$attributes->except(['class'])}}/>
    </label>
</div>
