<div class="">
    {{-- <div x-data="{
        checkScroll() {
                window.onscroll = function(ev) {
                    if ((window.innerHeight + window.scrollY) >= document.body.scrollHeight) {
                         @this.call('loadMore')
                    }
                };
            }
        }" x-init="checkScroll">
    </div> --}}

    <div x-data="{
        observe () {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        @this.call('loadMore')
                    }
                })
            }, {
                root: null
            })

            observer.observe(this.$el)
        }
    }" x-init="observe"></div>

    <div wire:loading class="mx-auto max-w-7xl flex w-full">

        <div class="flex flex-col gap-2">
            @for ($i = 0; $i < 10; $i++)
            <div class="animate-pulse flex items-center justify-between bg-white p-2 border-king rounded-3xl border-2">
                <div class="flex items-center gap-3 justify-between">
                    <svg class="text-slate-200" width="35" height="35" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M22.001 12c0-5.523-4.477-10-10-10s-10 4.477-10 10s4.477 10 10 10s10-4.477 10-10Zm-14.53.28a.75.75 0 0 1-.073-.976l.072-.085l4.001-4a.75.75 0 0 1 .977-.073l.084.073l4 4.001a.75.75 0 0 1-.977 1.133l-.084-.072l-2.72-2.722v6.691a.75.75 0 0 1-.649.744l-.101.006a.75.75 0 0 1-.743-.648l-.007-.102V9.56l-2.72 2.72a.75.75 0 0 1-.977.073l-.084-.073Z" />
                    </svg>
                    <div class="flex flex-col gap-1">
                        <div class="h-3 mt-2 bg-slate-200 rounded w-36"></div>
                        <div class="flex gap-1 flex-wrap">
                            <div class="bg-slate-200 h-5 w-12 text-xs text-honey-dark py-0.5 px-1.5 rounded-md whitespace-nowrap"> </div>
                            <div class="bg-slate-200 h-5 w-8 text-xs text-honey-dark py-0.5 px-1.5 rounded-md whitespace-nowrap"> </div>
                            <div class="bg-slate-200 h-5 w-10 text-xs text-honey-dark py-0.5 px-1.5 rounded-md whitespace-nowrap"> </div>
                        </div>
                    </div>
                </div>
                <div class='flex items-center gap-4'>
                    <div class="h-2 bg-slate-200 rounded w-24"></div>
                    <div class="text-slate-200">
                        <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1.41431" width="10" height="2" rx="1" transform="rotate(45 1.41431 0)" fill="currentColor" />
                            <rect y="13.071" width="10" height="2" rx="1" transform="rotate(-45 0 13.071)" fill="currentColor" />
                        </svg>
                    </div>
                </div>
            </div>
            @endfor
        </div>

    </div>

</div>
