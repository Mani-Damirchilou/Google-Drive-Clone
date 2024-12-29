@props([
    'messages'
])
@if(!empty($messages))
    <ul class="text-xs flex flex-col gap-2 items-center text-error">
        @foreach((array)$messages as $message)
            <li>{{$message}}</li>
        @endforeach
    </ul>
@endif
