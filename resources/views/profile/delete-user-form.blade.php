<x-jet-action-section>
    <x-slot name="content">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">{{__('Delete this account')}}</h5>
            </div>
            <div class="card-body bg-light">
                <p class="fs--1">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>

                <a class="btn btn-falcon-danger d-block mt-5" wire:click="confirmUserDeletion" wire:loading.attr="disabled">{{ __('Delete Account') }}</a>

                <x-jet-dialog-modal wire:model="confirmingUserDeletion">

                    <x-slot name="title">{{ __('Delete Account') }}</x-slot>

                    <x-slot name="content">
                        <p class="text-word-break fs--1">
                            {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>
                        <div class="mb-3" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                            <input class="form-control"  type="password" placeholder="{{ __('Password') }}" x-ref="password" wire:model.defer="password" wire:keydown.enter="deleteUser" />
                            <x-jet-input-error class="valid-feedback" role="alert" for="password" />
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">{{ __('Cancel') }}</button>
                                <button class="btn btn-danger" type="button" wire:click="deleteUser" wire:loading.attr="disabled">{{ __('Delete Account') }} </button>
                    </x-slot>

                </x-jet-dialog-modal>

            </div>
        </div>
    </x-slot>
</x-jet-action-section>
