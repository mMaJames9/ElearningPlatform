<x-jet-form-section submit="updatePassword">

    <x-slot name="form">

        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">{{__('Update Password')}}</h5>
            </div>
            <div class="card-body bg-light">
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

                <div class="mt-5">
                    <x-jet-action-message class="text-success text-center fs--1 fw-bold" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>
                    <button class="btn btn-primary d-block w-100" type="submit">{{__('Update Password')}}</button>
                </div>
            </div>
        </div>

    </x-slot>
</x-jet-form-section>
