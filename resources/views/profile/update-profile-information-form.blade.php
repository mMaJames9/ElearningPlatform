<x-jet-form-section submit="updateProfileInformation">

    <x-slot name="form">

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        @include('partials._profile-photos')
        @endif

    {{-- </x-slot>
</x-jet-form-section> --}}

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
