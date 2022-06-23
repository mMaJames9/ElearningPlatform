<x-jet-form-section submit="updatePassword">

    <x-slot name="form">
        <div class="card">
            <div class="card-header py-4">
                <h6 class="card-title mb-0">{{__('Update Password')}}</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="current_password">{{ __('Current Password') }}</label>
                    <input type="password" class="@error('current_password') is-invalid @enderror form-control" id="current_password" name="current_password" :value="old('current_password')" placeholder="{{ __('Current Password') }}" required autofocus wire:model.defer="state.current_password">

                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <input type="password" class="@error('password') is-invalid @enderror form-control" id="password" name="password" :value="old('password')" placeholder="{{ __('Password') }}" required autofocus wire:model.defer="state.password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input type="password" class="@error('password_confirmation') is-invalid @enderror form-control" id="password_confirmation" name="password_confirmation" :value="old('password_confirmation')" placeholder="{{ __('Confirm Password') }}" required autofocus wire:model.defer="state.password_confirmation">

                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mt-5 text-end">
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>

                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </div>

        </div>

    </x-slot>
</x-jet-form-section>
