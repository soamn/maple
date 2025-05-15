<button x-data="{ isClicked: false }" x-on:click="isClicked = !isClicked; setTimeout(() => isClicked = false, 300)"
    x-bind:class="{
        'animate-pop': isClicked,
    }"
    {{ $attributes->twMerge([
        'class' => 'bg-zinc-900 text-white px-4 py-2 rounded-md 
                focus:outline-none transition duration-900 
            ease-in-out cursor-pointer hover:shadow-xl shadow-gray-500',
    ]) }}>
    {{ $slot }}
</button>

<style>
    @keyframes pop {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(0.9);
        }

        100% {
            transform: scale(1);
        }
    }

    .animate-pop {
        animation: pop 0.3s ease-in-out;
    }
</style>
