@props([
    'text' => 'something better than nothing is better than everything',
])
@php
    $array = explode(' ', $text);
@endphp

<div {{ $attributes->twMerge([
    'class' => 'bg-black w-40 h-40 rounded-lg p-2 text-white',
]) }}>
    @foreach ($array as $index => $item)
        <span class=" h-fit  opacity-0 blur-sm animate-fade-in"
            style="animation-delay: {{ $index * 0.3 }}s; animation-fill-mode: forwards;">
            {{ $item }}
        </span>
    @endforeach
</div>

<style>
    @keyframes fade-in {
        0% {
            opacity: 0;
            filter: blur(4px);
        }

        100% {
            opacity: 1;
            filter: blur(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.6s ease-out forwards;
    }
</style>
