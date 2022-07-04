@props(['title' => __('Confirm Password'), 'content' => __('For your security, please confirm your password to continue.'), 'button' => __('Confirm')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
<x-jet-dialog-modal wire:model="confirmingPassword">

    <x-slot name="title">{{ $title }}</x-slot>

    <x-slot name="content">
        <p class="text-word-break fs--1">
            {{ $content }}
        </p>
        <div class="mb-3" x-data="{}" x-data="{}" x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
            <input class="form-control" type="password" placeholder="{{ __('Password') }}" x-ref="confirmable_password" wire:model.defer="confirmablePassword" wire:keydown.enter="confirmPassword" />
            <x-jet-input-error class="fs--1 text-danger fw-bold" role="alert" for="confirmable_password" />
        </div>
    </x-slot>

    <x-slot name="footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" wire:click="stopConfirmingPassword" wire:loading.attr="disabled">{{ __('Cancel') }}</button>
        <button class="btn btn-primary" type="button" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled">{{ $button }}</button>
    </x-slot>

</x-jet-dialog-modal>
@endonce
