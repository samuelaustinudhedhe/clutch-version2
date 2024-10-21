@props(['images',
    'containerClass' => ''
])

<div x-data="{            
    currentSlideIndex: 1,
    previous() {                
        if (this.currentSlideIndex > 1) {                    
            this.currentSlideIndex = this.currentSlideIndex - 1;                
        } else {   
            this.currentSlideIndex = {{ count($images) }};                
        }            
    },            
    next() {                
        if (this.currentSlideIndex < {{ count($images) }}) {                    
            this.currentSlideIndex = this.currentSlideIndex + 1;                
        } else {                 
            this.currentSlideIndex = 1;                
        }            
    },        
}" class="relative w-full overflow-hidden border border-gray-200 dark:border-gray-700 xl:rounded-b-lg mt-[-1px]">

    <!-- previous button -->
    <button type="button" class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white" aria-label="previous slide" x-on:click="previous()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </button>

    <!-- next button -->
    <button type="button" class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white" aria-label="next slide" x-on:click="next()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </button>
   
    <!-- slides -->
    <div class="relative min-h-[30svh] h-[40vh] lg:min-h-[50svh] md:h-[500px] w-full overflow-hidden rounded-none {{ $containerClass }} ">
        @foreach ($images as $index => $image)
            <div x-show="currentSlideIndex === {{ $index + 1 }}" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                <x-img class="absolute w-full h-full inset-0 object-cover text-neutral-600 dark:text-neutral-300" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" />
            </div>
        @endforeach
    </div>
    
    <!-- indicators -->
    <div class="absolute rounded-md bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 bg-white/75 px-1.5 py-1 md:px-2 dark:bg-neutral-950/75" role="group" aria-label="slides" >
        @foreach ($images as $index => $image)
            <button class="size-2 cursor-pointer rounded-full transition bg-neutral-600 dark:bg-neutral-300" x-on:click="currentSlideIndex = {{ $index + 1 }}" x-bind:class="[currentSlideIndex === {{ $index + 1 }} ? 'bg-neutral-600 dark:bg-neutral-300' : 'bg-neutral-600/50 dark:bg-neutral-300/50']" aria-label="slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
</div>