@props(['submit'])
<form wire:submit.prevent="{{ $submit }}">
    {{ $form }}

    @if (isset($actions))
        <div>
            {{ $actions }}
        </div>
    @endif
</form>
