@props([
    'items' => [],
    'autoRotate' => false,
])
@php
    $length = count($items);
@endphp

<div x-data="carousel3D({ items: {{ $length }}, distance: 1900 })" x-init="startAutoRotate({{ $autoRotate }})" @mousedown="startDrag($event)" @mousemove="onDrag($event)"
    @mouseup="endDrag({{ $autoRotate }})" @mouseleave="endDrag({{ $autoRotate }})" @touchstart="startDrag($event)"
    @touchmove="onDrag($event)" @touchend="endDrag({{ $autoRotate }})"
    {{ $attributes->twMerge([
        'class' => 'banner w-full h-fit overflow-hidden relative flex items-center  select-none cursor-pointer',
    ]) }}>
    <div x-ref="slider" class="relative w-80 h-130 " style="left: calc(50% - 100px); perspective: 500px;">
        <div class="w-full h-full relative transform-3d transition-transform duration-500 ease-out "
            :style="'transform: rotateY(' + angle + 'deg)'">
            @foreach ($items as $item)
                @php
                    $angle = ($item['id'] - 1) * (360 / $length);
                @endphp
                <div class="absolute inset-0 " style="transform: rotateY({{ $angle }}deg) translateZ(1200px);">
                    <div
                        class="border-4   w-full h-full flex items-center
                         justify-center text-white text-xl font-bold rounded-lg shadow-xl">
                        <img src="{{ $item['image'] }}"
                            class="object-cover w-full h-full select-none border-8 rounded-lg border-white"
                            alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

<script>
    function carousel3D({
        items,
        distance
    }) {
        return {
            angle: 0,
            interval: null,
            isDragging: false,
            startX: 0,
            currentX: 0,
            rotateStep: 360 / items,

            startAutoRotate(rotate) {
                if (rotate) {
                    this.interval = setInterval(() => {
                        this.angle += this.rotateStep;
                    }, 3000);
                }
            },

            stopAutoRotate() {
                clearInterval(this.interval);
            },

            startDrag(event) {
                this.stopAutoRotate();
                this.isDragging = true;
                this.startX = event.type.includes('touch') ? event.touches[0].clientX : event.clientX;
            },

            onDrag(event) {
                if (!this.isDragging) return;
                this.currentX = event.type.includes('touch') ? event.touches[0].clientX : event.clientX;
                const deltaX = this.currentX - this.startX;
                this.angle += deltaX * 0.1;
                this.startX = this.currentX;
            },

            endDrag(rotate) {
                this.isDragging = false;
                this.startAutoRotate(rotate);
            }
        }
    }
</script>
