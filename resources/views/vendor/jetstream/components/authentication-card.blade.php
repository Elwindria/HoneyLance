<div class="h-screen flex flex-col justify-between md:max-w-3xl md:mx-auto">
    <div class="flex h-full items-center justify-center">
        {{ $logo }}
    </div>
    <div class="relative rounded-t-3xl bg-white p-4 md:shadow-xl">
        {{ $slot }}
    </div>
</div>
