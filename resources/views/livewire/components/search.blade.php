<?php

use App\Models\Folder;
use Livewire\Volt\Component;

new class extends Component {
    public string $search = '';

    public function with()
    {
        return [
            'folders' => auth()->user()->folders()->where('name',"LIKE","%{$this->search}%")->get(['id','name'])
        ];
    }

    public function emptySearch()
    {
        $this->reset('search');
    }
}; ?>

<div class="w-1/2" x-data>
    <label class="input input-bordered w-full flex gap-2" x-ref="search">
        <input type="text" class="grow" wire:model.live="search"
               placeholder="{{__('components.search.placeholder')}}" @blur="$wire.emptySearch()">
    </label>
    @if($search)
        <div class="card card-compact bg-base-100" x-anchor.offset.10="$refs.search">
            <div class="card-body flex flex-col">
                <ul class="menu">
                    @forelse($folders as $folder)
                        <li><a href="{{route('index',$folder)}}" wire:navigate>{{$folder->name}}</a></li>
                    @empty
                        <span class="text-md">
                            @lang('components.search.empty', ['search' => $search])
                        </span>
                    @endforelse
                </ul>
            </div>
        </div>
    @endif
</div>
