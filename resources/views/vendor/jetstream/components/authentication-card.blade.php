<div class="h-screen flex flex-col justify-center bg-honey-light/40 gap-4">
    <div class=""></div>
    <div class="flex flex-col gap-12">
        <div class="flex items-center justify-center">
            {{ $logo }}
        </div>
        <div class="relative rounded-3xl bg-white">
            {{ $slot }}
        </div>
    </div>
</div>
