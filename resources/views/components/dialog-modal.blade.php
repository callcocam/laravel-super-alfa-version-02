@props(['id' => null, 'maxWidth' => null])
<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{ $title }}
            </div>
            <div class="modal-body">
                {{ $content }}
            </div>
            <div class="modal-footer">
                {{ $footer }}
            </div>
        </div>
    </div>
</x-modal>
