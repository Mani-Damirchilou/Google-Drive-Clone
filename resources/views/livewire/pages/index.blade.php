<?php

use App\Models\Folder;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public ?Folder $folder;

    public array $selected = [];

    public $selectAll = false;

    public $folders;

    public function mount(?Folder $folder)
    {
        $this->folder = $folder;
        $this->folders = $this->getFolders();
    }

    public function updatedSelected()
    {
        if (count($this->folders) === count($this->selected))
        {
            $this->selectAll = true;
        }else{
            $this->selectAll = false;
        }
    }

    public function updatedSelectAll()
    {
        if ($this->selectAll){
            $this->selected = $this->folders->pluck('id')->toArray();
        }else{
            $this->selected = [];
        }
    }

    private function getFolders()
    {
        return $this->folder->id ? $this->folder->children : auth()->user()->folders()->whereNull('parent_id')->get();
    }
}; ?>

<x-layouts.auth>
    <div>
        <div class="overflow-x-auto ">
            <table class="table">
                <thead>
                <tr>
                    <th>
                        <input type="checkbox" class="checkbox" wire:model.live="selectAll">
                    </th>
                    <th>
                        @lang('validation.attributes.name')
                    </th>
                    <th>
                        @lang('validation.attributes.created_at')
                    </th>
                    <th>
                        @lang('validation.attributes.updated_at')
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($folders as $folder)
                    <tr wire:key="folder-{{$folder->id}}">
                        <td>
                            <input type="checkbox" class="checkbox" value="{{$folder->id}}" wire:model.live="selected"/>
                        </td>
                        <td>
                            <a href="{{route('index',$folder)}}">
                                {{$folder->name}}
                            </a>
                        </td>
                        <td>
                            {{$folder->created_at_farsi}}
                        </td>
                        <td>
                            {{$folder->updated_at_farsi}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.auth>
