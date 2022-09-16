<x-app-layout>

    @section('styles')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @endsection

    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
    @livewire('profile.update-profile-information-form')
    @endif

</x-app-layout>


