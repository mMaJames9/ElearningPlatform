@props(['id' => null, 'maxWidth' => null])


<x-jet-modal class="modal fade" data-backdrop="false" :id="$id" :maxWidth="$maxWidth" {{ $attributes }} tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
        <div class="modal-content position-relative">

            <div class="modal-body p-0">
                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                    <h4 class="mb-1" name="title">
                        {{ $title }}
                    </h4>
                </div>
                <div class="p-4 pb-0" name="content">
                    {{ $content }}
                </div>
            </div>
            <div class="modal-footer" name="footer">
                {{ $footer }}
            </div>
        </div>
    </div>
</x-jet-modal>
