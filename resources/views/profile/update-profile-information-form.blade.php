<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="form">

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div class="col-xl-12">
            <div class="card mb-4 pt-6 profile-cover">
                <div class="card-body pt-6 d-flex justify-content-between" x-data="{photoName: null, photoPreview: null}">

                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="photoName = $refs.photo.files[0].name;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        photoPreview = e.target.result;
                    };
                    reader.readAsDataURL($refs.photo.files[0]);" />

                    <!-- Current Profile Photo -->
                    <div class="my-auto"  x-show="! photoPreview">
                        <div class="d-flex justify-content-between">
                            <div class=" px-0 text-md-end">
                                <img class="wd-70 ht-70 rounded-circle" src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}">
                            </div>
                            <div class="my-auto text-start d-none d-md-block">
                                <span class="ms-2 h4 text-white">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="my-auto"  x-show="photoPreview" style="display: none;">
                        <div class="d-flex justify-content-between">
                            <div class=" px-0 text-md-end">
                                <img class="wd-70 ht-70 rounded-circle bg-no-repeat bg-center bg-cover" x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                            </div>
                            <div class="my-auto text-start d-none d-md-block">
                                <span class="ms-2 h4 text-white">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="my-auto text-end">
                        <div class="d-flex justify-content-between">
                            <div class="text-end my-auto me-1 px-0">
                                <x-jet-button x-on:click.prevent="$refs.photo.click()">
                                    {{ __('Select A New Photo') }}
                                </x-jet-button>
                            </div>
                            @if ($this->user->profile_photo_path)
                            <div class="text-start my-auto px-0 d-none d-md-block">
                                <x-jet-button wire:click="deleteProfilePhoto">
                                    {{ __('Remove Photo') }}
                                </x-jet-button>
                            </div>
                            @endif
                        </div>
                        <x-jet-input-error for="photo" class="mt-2" />
                    </div>


                </div>
            </div>
        </div>
        @endif

        {{-- <div class="row profile-body"> --}}
        {{-- Update Information --}}
        <div class="col-md-4 col-xl-12 left-wrapper">
            <div class="card mb-4">
                <div class="card-header py-4">
                    <h6 class="card-title mb-0">{{__('Update Profile Information')}}</h6>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label" for="name">{{ __('Name') }}</label>
                        <input type="text" class="@error('name') is-invalid @enderror form-control" id="name" name="name" :value="old('name')" placeholder="{{ __('Name') }}" required autofocus wire:model.defer="state.name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">{{ __('Email') }}</label>
                        <input type="email" class="@error('email') is-invalid @enderror form-control" id="email" name="email" :value="old('email')" placeholder="{{ __('Email') }}" required autofocus wire:model.defer="state.email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                        <p class="text-sm mt-2">
                            {{ __('Your email address is unverified.') }}

                            <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if ($this->verificationLinkSent)
                        <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                        @endif
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="username">{{ __('Username') }}</label>
                        <input type="text" class="@error('username') is-invalid @enderror form-control" id="username" name="username" :value="old('username')" placeholder="{{ __('Username') }}" required autofocus wire:model.defer="state.username">

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="phone_number">{{ __('Phone Number') }}</label>
                        <input type="text" class="@error('phone_number') is-invalid @enderror form-control" id="phone_number" phone_number="phone_number" :value="old('Phone Number')" placeholder="{{ __('phone_number') }}" required autofocus data-inputmask-alias="+237 699 999 999" wire:model.defer="state.phone_number">

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mt-5 text-end">
                        <x-jet-action-message class="mr-3" on="saved">
                            {{ __('Saved.') }}
                        </x-jet-action-message>

                        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>

                </div>
            </div>

        </div>

    </x-slot>
</x-jet-form-section>
