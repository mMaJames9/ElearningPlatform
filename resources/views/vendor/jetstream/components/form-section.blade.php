@props(['submit'])

{{-- <div>
    <div> --}}
        <form wire:submit.prevent="{{ $submit }}">
            {{-- <div>
                <div> --}}
                    {{ $form }}
                {{-- </div>
            </div> --}}

            @if (isset($actions))
                <div>
                    {{ $actions }}
                </div>
            @endif
        </form>
    {{-- </div>
</div> --}}
