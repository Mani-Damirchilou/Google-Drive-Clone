@if($errors->any())
    <ul class="alert bg-red-500/25 border border-red-500 text-red-500 flex flex-col items-start w-auto text-sm list-disc list-inside">
        @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif
