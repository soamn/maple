@props([
    'maxRotation' => 10,
])

<div class="h-fit m-20 flex items-center justify-center ">
    <div x-data="{
        rotateX: 0,
        rotateY: 0,
        handleMouseMove(e) {
            const card = e.currentTarget;
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
    
            const rotateMax = {{ $maxRotation }};
            this.rotateY = ((x - centerX) / centerX) * rotateMax;
            this.rotateX = -((y - centerY) / centerY) * rotateMax;
        },
        resetRotation() {
            this.rotateX = 0;
            this.rotateY = 0;
        }
    }" @mousemove="handleMouseMove" @mouseleave="resetRotation"
        {{ $attributes->twMerge([
            'class' =>
                'w-40 h-60 p-1 rounded-lg shadow-lg transition-transform duration-600 cursor-pointer  bg-gradient-to-r from-zinc-800 via-zinc-500 to-white relative group',
        ]) }}
        :style="'transform: perspective(600px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg)'">
        {{ $slot }}
    </div>
</div>
