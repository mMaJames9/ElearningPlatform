<x-jet-form-section submit="updateProfileInformation">

    <x-slot name="form">

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        @include('partials._profile-photos')
        @endif

    {{-- </x-slot>
</x-jet-form-section> --}}
@role('Member')
<div class="alert alert-info border-2" role="alert">
    <div class="d-flex justify-content-between">
        @if($currentSubscription == null)
        <div class="d-flex align-items-center">
            <div class="bg-info me-3 icon-item">
                <span class="fas fa-info-circle text-white fs-3"></span>
            </div>
            <p class="mb-0 flex-1">
                <span class="fw-bold">{{ $currentSubscription->plan->name ?? 'No active' }} {{__('plan')}}</span>
            </p>
        </div>
        <div class="d-flex align-items-center">
            <a href="{{ route('plans.index') }}" class="btn btn-falcon-info me-1 mb-1">{{__('Subscribe')}}</a>
        </div>
        @else
        <div class="d-flex align-items-center">
            <div class="bg-info me-3 icon-item">
                <span class="fas fa-info-circle text-white fs-3"></span>
            </div>
            <p class="mb-0 flex-1">
                <span class="fw-light">{{__('To Modify your Classroom you must cancel your subscription to the current Classroom')}}</span>
            </p>
        </div>
        <div class="d-flex align-items-center">
            <a href="{{ route('plans.index') }}" class="btn btn-falcon-info me-1 mb-1">{{__('Cancel current plan')}}</a>
        </div>
        @endif
    </div>
</div>
@endrole

<div class="row g-0">

    <div class="col-lg-8 pe-lg-2">
        {{-- Profile Information --}}
        {{-- <x-jet-form-section submit="updateProfileInformation">
            <x-slot name="form"> --}}

                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">{{__('Update Profile Information')}}</h5>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label class="form-label" for="name">{{ __('Name') }}</label>
                                <input type="text" class="@error('name') is-invalid @enderror form-control" id="name" name="name" :value="old('name')" placeholder="{{ __('Name') }}" required autofocus wire:model.defer="state.name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label" for="username">{{ __('Username') }}</label>
                                <input type="text" class="@error('username') is-invalid @enderror form-control" id="username" name="username" :value="old('username')" placeholder="{{ __('Username') }}" required autofocus wire:model.defer="state.username">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12 col-lg">
                                <label class="form-label" for="email">{{ __('Email') }}</label>
                                <input type="email" class="@error('email') is-invalid @enderror form-control" id="email" name="email" :value="old('email')" placeholder="{{ __('Email') }}" required autofocus wire:model.defer="state.email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                                <p class=" mt-2 fs--1">
                                    {{ __('Your email address is unverified.') }}

                                    <button type="button" class="underline fs--1 fw-medium" wire:click.prevent="sendEmailVerification">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if ($this->verificationLinkSent)
                                <p v-show="verificationLinkSent" class="mt-2 fs--1 text-primary fw-medium">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                                @endif
                                @endif
                            </div>

                            <div class="col-12 col-lg">
                                <label class="form-label" for="phone_number">{{ __('Phone Number') }}</label>
                                <input type="text" data-inputmask-alias="+237 699 999 999" class="@error('phone_number') is-invalid @enderror form-control" id="phone_number" name="phone_number" :value="old('phone_number')" placeholder="{{ __('Phone Number') }}" required autofocus wire:model.defer="state.phone_number">

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            @role('Member')
                            @if($currentSubscription == null)
                            <div class="col-12 col-lg" wire:model.defer="state.classroom_id">
                                <label class="form-label" for="classroom_id">{{ __('classroom') }}</label>
                                <select class="form-select @error('classroom_id') is-invalid @enderror" data-width="100%" id="classroom_id" name="classroom_id" :value="old('classroom_id')" required autofocus data-options='{"removeItemButton":true,"placeholder":true}'>
                                    @foreach($classrooms as $id => $classroom)
                                    <option value="{{ $id }}" @if ($id == Auth::user()->classroom_id) selected="selected" @endif>{{ ucwords($classroom) }}</option>
                                    @endforeach
                                </select>

                                @error('classroom_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @endif
                            @endrole

                        </div>

                        <div class="d-flex align-items-center mt-5">
                            <button class="btn btn-primary me-2" type="submit" wire:loading.attr="disabled" wire:target="photo">{{ __('Save') }} </button>
                            <x-jet-action-message class="text-success fs--1 fw-bold" on="saved">
                                {{ __('Saved.') }}
                            </x-jet-action-message>
                        </div>

                    </div>
                </div>

            </x-slot>
        </x-jet-form-section>

        {{-- Brower Sessions --}}
        @livewire('profile.logout-other-browser-sessions-form')

    </div>

    <div class="col-lg-4 ps-lg-2">

        {{-- Password --}}
        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        @livewire('profile.update-password-form')
        @endif

        {{-- Two Factor --}}
        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        @livewire('profile.two-factor-authentication-form')
        @endif

        {{-- Delete User --}}
        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
        @livewire('profile.delete-user-form')
        @endif
    </div>
</div>

<div class="row g-0 d-flex">
    <div class="col pe-lg-2 flex-1">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-3">{{__('Referred Users')}}</h5>
                @forelse(auth()->user()->getReferrals() as $referral)
                <p class="mb-0 fs--1 fw-medium">{{__('Referral Link')}}:</p>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="myInput" name="myInput" disabled readonly value="{{ $referral->link }}">

                    <span class="btn btn-success" onclick="myFunction()">
                        <span class="fas far fa-clipboard me-1" data-fa-transform="shrink-3"></span>
                        {{__('Copy Link')}}
                    </span>
                </div>

                @empty
                <p class="mb-0 fs--1 fw-medium">{{__('No referrals')}}</p>
                @endforelse
            </div>
            <div class="card-body bg-light p-0">
                <div class="tab-pane preview-tab-pane active" role="tabpanel">
                    <div id="tableReferrals" data-list='{"valueNames":["name", "phone_number", "subscription", "price"], "page":10, "pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-bordered fs--1 mb-0">
                                <thead class="bg-200 fw-bold">
                                    <tr class="align-middle py-3">
                                        <th class="text-start">#</th>
                                        <th class="sort" data-sort="name">{{__('Name')}}</th>
                                        <th class="sort" data-sort="phone_number">{{__('Phone Number')}}</th>
                                        <th class="sort" data-sort="subscription">{{__('Subscription')}}</th>
                                        <th class="sort text-center" data-sort="price">{{__('Price')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="list align-middle text-nowrap">

                                    @foreach($referral->relationships as $key => $relationship)

                                    <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                        <td class="text-start">{{ $loop->iteration }}</td>

                                        <td class="name">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl">
                                                    <img class="rounded-circle" src="{{ $relationship->user->profile_photo_url }}" alt="{{ $relationship->user->username }}" />
                                                </div>
                                                <h6 class="mb-0 ps-2 text-800">{{  ucwords($relationship->user->name) }}</h6>
                                            </div>
                                        </td>

                                        <td class="phone_number">
                                            {{ $relationship->user->phone_number }}
                                        </td>

                                        <td class="subscription">
                                            @if ($relationship->user->subscriptions->isNotEmpty())
                                            @if ($relationship->user->subscriptions->first()->suppressed_at == null)
                                            <span class="badge badge rounded-pill badge-soft-success">
                                                {{__('Active')}}
                                                <span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span>
                                            </span>
                                            @else
                                            <span class="badge badge rounded-pill badge-soft-danger">
                                                {{__('Canceled')}}
                                                <span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span>
                                            </span>
                                            @endif
                                            @else
                                            <span class="badge badge rounded-pill badge-soft-secondary">
                                                {{__('Pending')}}
                                                <span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span>
                                            </span>
                                            @endif
                                        </td>

                                        <td class="price text-center">
                                            @if ($relationship->user->subscriptions->isNotEmpty())
                                            {{ $relationship->user->subscriptionPrices->first()->pivot->subscription_price }} XAF
                                            @else
                                            -
                                            @endif
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev">
                                <span class="fas fa-chevron-left"></span>
                            </button>

                            <ul class="pagination mb-0"></ul>

                            <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next">
                                <span class="fas fa-chevron-right"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @role('Member')
    <div class="col-lg-5 ps-lg-2 flex-2">
        <div class="card mb-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="align-self-center">
                        <h5 class="mb-0 fw-bold">{{__('Table of Downloads')}}</h5>
                        <p class="mb-0 fs--1 fw-medium">{{$data}} {{__('download(s)')}}</p>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light p-0">
                <div class="tab-content">

                    <div class="tab-pane preview-tab-pane active mt-4" role="tabpanel">
                        <div id="tableDownloads" data-list='{"valueNames":["name", "type", "created_at"], "page":10, "pagination":true}'>
                            <div class="table-responsive scrollbar">
                                <table class="table table-striped fs--1 mb-0">
                                    <thead class="bg-200 fw-bold">
                                        <tr class="align-middle py-3">
                                            <th class="text-start">#</th>
                                            <th class="sort" data-sort="type">{{__('Document')}}</th>
                                            <th class="sort" data-sort="created_at">{{__('Date')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list align-middle text-nowrap">

                                        @foreach($downloads as $key => $download)
                                        <tr class="hover-actions-trigger btn-reveal-trigger hover-bg-100">
                                            <td class="text-start">{{ $loop->iteration }}</td>

                                            <td class="type">
                                                <a href="@if ($download->document->document_type == "Book")
                                                    {{ route('books.show', $download->document->id) }}
                                                @else
                                                {{ route('papers.show', $download->document->id) }}
                                                @endif">
                                                    {{ ucwords($download->document->document_type) ?? '' }}
                                                </a>
                                            </td>


                                            <td class="created_at">
                                                {{ $download->created_at }}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev">
                                    <span class="fas fa-chevron-left"></span>
                                </button>

                                <ul class="pagination mb-0"></ul>

                                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next">
                                    <span class="fas fa-chevron-right"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
</div>
