<section class="min-h-screen py-26 bg-orange-200">
    <div class="container px-4 mx-auto">
        <div class="py-12 px-6 md:p-16 border-3 border-king shadow bg-white rounded-2xl max-w-2xl mx-auto">

            <x-jet-authentication-card-logo />

            <div class="text-center my-8">
                <h2 class="text-3xl md:text-4xl font-extrabold mb-2">{{ $page }}</h2>
            </div>

            {{ $slot }}

        </div>
    </div>
</section>
