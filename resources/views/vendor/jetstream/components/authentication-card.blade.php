<div class="h-screen flex flex-col justify-between bg-honey-light/40 gap-4">
    <div class=""></div>
    <div class="flex flex-col gap-12">
        <div class="flex items-center justify-center">
            {{ $logo }}
        </div>
        <div class="relative rounded-t-3xl bg-white">
            {{ $slot }}
        </div>
    </div>
</div>
