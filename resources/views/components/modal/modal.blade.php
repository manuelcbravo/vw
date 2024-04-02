<div id="{{ $id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered {{ $size ?? '' }}" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary pb-4 pt-4">
                <h3 class="modal-title text-white" id="exampleModalCenteredScrollableTitle">{{ $titulo }}</h3>
                <button type="button" class="btn-close bg-white rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               {{ $body }}
            </div>
                {{ $footer ?? '' }}
        </div>
    </div>
</div>
