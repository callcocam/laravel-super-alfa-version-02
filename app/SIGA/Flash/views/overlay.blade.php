<div>
    @if($shown)
        <div class="modal" tabindex="-1" style="display: block">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> {{ $title }}</h5>
                        @isset ($dismissable)
                            @if ($dismissable)
                                <button wire:click="dismiss" type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            @endif
                        @endisset
                    </div>
                    <div class="modal-body">
                        <p> {{$message}}</p>
                    </div>
                    <div class="modal-footer">
                        @isset ($dismissable)
                            @if ($dismissable)
                                <button wire:click="dismiss" type="button" class="btn btn-secondary"
                                        data-dismiss="modal"> @lang('flash.cancel')</button>
                            @endif
                        @endisset
                        @isset($confirm)
                            <button wire:click="confirm" type="button"
                                    class="btn btn-primary"> @lang('flash.deactivate')</button>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
