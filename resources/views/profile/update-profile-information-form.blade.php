<x-jet-form-section submit="updateProfileInformation">

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">

            <!-- Profile Photo File Input -->
            <input type="file" class="hidden"
            wire:model="photo"
            x-ref="photo"
            x-on:change="
            photoName = $refs.photo.files[0].name;
            const reader = new FileReader();
            reader.onload = (e) => {
                photoPreview = e.target.result;
            };
            reader.readAsDataURL($refs.photo.files[0]);
            " />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="mx-auto mb-3 rounded-full w-20 h-20 bg-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="mx-auto mb-3 block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <div class="d-flex justify-content-center">
                <x-jet-button x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-button>

                @if ($this->user->profile_photo_path)
                <x-jet-button wire:click="deleteProfilePhoto">
                    {{ __('Remove Photo') }}
                </x-jet-button>
                @endif
            </div>

            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0" style="padding: 1.1rem .75rem;">
                            <i class="ti-user text-primary"></i>
                        </span>
                    </div>
                    <input type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }} form-control form-control-lg border-left-0" id="name" placeholder="{{ __('Name') }}" name="name" :value="old('name')" required autofocus wire:model.defer="state.name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0" style="padding: 1.1rem .75rem;">
                            <i class="ti-email text-primary"></i>
                        </span>
                    </div>
                    <input type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}  form-control form-control-lg border-left-0" id="email" placeholder="{{ __('Email') }}" name="email" :value="old('email')" required autofocus wire:model.defer="state.email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

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
        </div>

        <!-- Username -->
        <div class="col-span-6 sm:col-span-4">
            <div class="form-group">
                <label for="username">{{ __('Username') }}</label>
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0" style="padding: 1.1rem .75rem;">
                            <i class="ti-user text-primary"></i>
                        </span>
                    </div>
                    <input type="text" class="{{ $errors->has('username') ? 'is-invalid' : '' }} form-control form-control-lg border-left-0" id="username" placeholder="{{ __('Username') }}" name="username" :value="old('username')" required autofocus wire:model.defer="state.username">

                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Phone Number -->
        <div class="col-span-6 sm:col-span-4">
            <div class="form-group">
                <label for="phone_number">{{ __('Phone Number') }}</label>
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0" style="padding: 1.1rem .75rem;">
                            <i class="ti-mobile text-primary"></i>
                        </span>
                    </div>
                    <input type="text" class="{{ $errors->has('phone_number') ? 'is-invalid' : '' }} form-control form-control-lg border-left-0" id="phone_number" placeholder="{{ __('Phone Number') }}" name="phone_number" :value="old('phone_number')" required autofocus data-inputmask-alias="+237 699 999 999" wire:model.defer="state.phone_number">

                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>
