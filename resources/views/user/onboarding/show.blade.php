<div>

    @switch($step)
        @case(0)
            @include('user.onboarding.welcome')
        @break

        @case(1)
            @livewire('user.onboarding.step1')
        @break

        @case(2)
            @livewire('user.onboarding.step2')
        @break

        @case(3)
            @livewire('user.onboarding.step3')
        @break

        @default
            @livewire('user.onboarding.completed')
    @endswitch
</div>
