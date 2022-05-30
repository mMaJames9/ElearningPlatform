<x-jet-form-section submit="updatePassword">

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <div class="form-group">
                <label for="current_password">{{ __('Current Password') }}</label>
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0" style="padding: 1.1rem .75rem;">
                            <i class="ti-lock text-primary"></i>
                        </span>
                    </div>
                    <input type="password" class="@error('password') is-invalid @enderror form-control form-control-lg border-left-0" id="current_password" placeholder="{{ __('Current Password') }}" name="current_password" required autofocus wire:model.defer="state.current_password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0" style="padding: 1.1rem .75rem;">
                            <i class="ti-lock text-primary"></i>
                        </span>
                    </div>
                    <input type="password" class="@error('password') is-invalid @enderror form-control form-control-lg border-left-0" id="password" placeholder="{{ __('Password') }}" name="password" :value="old('password')" required autofocus wire:model.defer="state.password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <div class="form-group">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0" style="padding: 1.1rem .75rem;">
                            <i class="ti-lock text-primary"></i>
                        </span>
                    </div>
                    <input type="password" class="@error('password_confirmation') is-invalid @enderror form-control form-control-lg border-left-0" id="password_confirmation" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" :value="old('password_confirmation')" required autofocus wire:model.defer="state.password_confirmation">

                    @error('password_confirmation')
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

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
