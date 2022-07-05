<x-jet-form-section submit="updateProfileInformation">

    <x-slot name="form">

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        @include('partials._profile-photos')
        @endif

    {{-- </x-slot>
</x-jet-form-section> --}}

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
                                <input type="text" class="@error('phone_number') is-invalid @enderror form-control" id="phone_number" phone_number="phone_number" :value="old('Phone Number')" placeholder="{{ __('phone_number') }}" required autofocus data-inputmask-alias="+237 699 999 999" wire:model.defer="state.phone_number">

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            @foreach(Auth::user()->roles as $key => $item)
                            @if($item->name == "Member")

                            <div class="col-12 col-lg" wire:model.defer="state.classroom_id">
                                <label class="form-label" for="classroom_id">{{ __('Classroom') }}</label>
                                <select class="form-select @error('classroom_id') is-invalid @enderror" data-width="100%" id="classroom_id" name="classroom_id" :value="old('classroom_id')" required autofocus data-options='{"removeItemButton":true,"placeholder":true}'>
                                    {{-- <option value="" disabled selected hidden>{{__('Select the corresponding classroom')}}...</option> --}}
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
                            @endforeach
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
