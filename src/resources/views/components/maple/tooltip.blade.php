@props([
    'items' => [],
    'tooltipBackground' => 'bg-black',
    'tooltipText' => 'text-white',
    'tooltipWidth' => '20',
])

<div class="flex -space-x-4 items-center">
    @foreach ($items as $item)
        @php
            $rotation = ($loop->count - $loop->index) * 1.5;
        @endphp

        <div class="relative group" x-data="{ show: false, x: 0 }" @mouseenter="show = true"
            @mousemove="x = $event.offsetX - ($event.target.offsetWidth / 2)" @mouseleave="show = false">

            <div x-show="show" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-75 translate-y-5 "
                x-transition:enter-end="opacity-100 scale-100 translate-y-0 "
                x-transition:leave="transition ease-in duration-150 "
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-75 translate-y-2 translate-x-0"
                x-bind:style="'transform: translateX(' + (x / 2) + 'px) rotate(' + (x / 5) + 'deg)'"
                class="absolute -top-16 left-1/2 -translate-x-1/2 z-50 w-max {{ $tooltipBackground }} {{ $tooltipText }} text-xs
                    px-4 py-2 rounded shadow-lg whitespace-nowrap wiggle ">
                <div class="font-semibold text-sm min-w-fit w-{{ $tooltipWidth }}">{{ $item['name'] }}</div>
                <div class="text-xs">{{ $item['designation'] }}</div>
            </div>

            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" style="transform: rotate({{ $rotation }}deg);"
                onmouseover="this.style.transform='rotate(0deg)'"
                onmouseout="this.style.transform='rotate({{ $rotation }}deg)'"
                {{ $attributes->twMerge([
                    'class' =>
                        'h-20 w-20 rounded-xl object-cover border-2 cursor-pointer transition-transform duration-300 group-hover:scale-105 relative z-10',
                ]) }} />
        </div>
    @endforeach
</div>
<style>
    @keyframes wiggle {
        0% {
            transform: rotate(5deg);
            scale: 0.6;
        }

        50% {
            transform: rotate(0);
            scale: 1.2;
        }

        75% {

            transform: rotate(5deg);
            scale: 1.1;
        }

        100% {
            transform: rotate(0);
            scale: 1;
        }
    }

    .wiggle {
        animation: wiggle 0.5s ease-in-out;
    }
</style>
