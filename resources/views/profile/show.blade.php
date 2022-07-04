<x-app-layout>

    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
    @livewire('profile.update-profile-information-form')
    @endif
    
</x-app-layout>


