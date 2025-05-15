@props([
    'color' => 'bg-white',
    'text' => 'text-black',
    'border' => 'border-zinc-800',
])

<div x-data="{ open: false }" class="h-screen w-full {{ $color }}  {{ $text }} overflow-hidden relative ">
    <aside x-show="open" x-transition:enter="transition transform ease-out duration-500"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform ease-in duration-500" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed top-0 left-0 w-52 h-full {{ $color }}  border-r {{ $border }} z-20 shadow-lg"
        @click.outside="open = false">
        <div class="flex items-center justify-between px-4 py-3 border-b {{ $border }}">
            {{ $header }}
            <button @click="open = false" class="  rounded  transition cursor-pointer">
                ✕
            </button>
        </div>

        <div class="px-4 py-4 {{ $text }}">
            {{ $SidebarItems }}
        </div>

    </aside>
    <button @click="open = true" x-show="!open" x-transition
        class="fixed top-4 left-2 z-10 cursor-pointer p-2 rounded transition">
        ☰
    </button>

    <div class="h-full transition-all duration-500" :class="open ? 'ml-52' : 'ml-20'">
        {{ $slot }}
    </div>
</div>
