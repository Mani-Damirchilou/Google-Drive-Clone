<div class="drawer" :class="{'lg:drawer-open': open}" x-data="{open: $persist(true)}">
    <input id="sidebar" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content flex flex-col">
        <nav class="navbar z-50 bg-base-300 flex flex-col justify-center sticky top-0 gap-4 py-4">
            <div class="flex justify-between w-full">
                <div class="w-full gap-4 flex items-center">
                    <label for="sidebar" class="lg:hidden btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5"/>
                        </svg>
                    </label>
                    <button @click="open = !open" class="max-lg:hidden btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 8.25V18a2.25 2.25 0 0 0 2.25 2.25h13.5A2.25 2.25 0 0 0 21 18V8.25m-18 0V6a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6ZM7.5 6h.008v.008H7.5V6Zm2.25 0h.008v.008H9.75V6Z"/>
                        </svg>
                    </button>
                    <livewire:components.search/>
                </div>
                <x-ui.theme-switch class="btn btn-ghost bg-base-200"/>
            </div>
            <div class="flex justify-between w-full">
                <x-ui.breadcrumb/>
            </div>
        </nav>
        <main class="bg-base-200 h-full">
            {{$slot}}
        </main>
    </div>
    <div class="drawer-side">
        <label for="sidebar" aria-label="close sidebar" class="drawer-overlay"></label>

        <ul class="menu bg-base-300 text-base-content min-h-full w-60 px-4 py-5">
            <span class="text-center font-bold text-lg">
                @lang('settings.app-name')
            </span>
            <div class="flex justify-between border-t border-b border-base-content my-10 py-5 items-center">
                <span>
                    {{auth()->user()->name}}
                </span>
                <livewire:components.logout/>
            </div>
            <li><a href="{{route('index')}}" wire:navigate wire:current="active">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776"/>
                    </svg>

                    @lang('navigations.index.title')
                </a>
            </li>
        </ul>
    </div>
</div>
