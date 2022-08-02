<x-app-layout>

    @role('Admin')
    @include('partials._dashboard-admin')
    @endrole

    @role('Super Admin')
    @include('partials._dashboard-admin')
    @endrole

    @role('Member')
    @include('partials._dashboard-member')
    @endrole

</x-app-layout>
