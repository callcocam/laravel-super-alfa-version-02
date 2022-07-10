<div>
    <style>
        ul.timeline {
            list-style-type: none;
            position: relative;
        }
        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }
        ul.timeline > li {
            margin: 20px 0;
            padding-left: 20px;
        }
        ul.timeline > li:before {
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #22c0e8;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }
    </style>
       <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $model->descricao_completa }}</h5>
                <a class="btn btn-danger" href="javascript:;"
                   wire:click="closeModalForm('openPanelRightLog')" wire:loading.attr="disabled">{{ __('Fechar') }}</a>
            </div>
            <div class="modal-body" style="max-height: 100%">
                <div class="action-sheet-content">
                    <div class="container mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <h4>Últimas atualizações do produto - {{ $model->descricao_completa }}</h4>
                                <ul class="timeline">
                                    @if($models)
                                        @foreach($models as $data)
                                            <li>
                                                <span>{{$data->name}} - {{$data->status}}</span>
                                                <span class="float-right"> {{ date_carbom_format($data->created_at)->format("d M, Y H:i:s") }}</span>
                                                <p>{{ $data->user->name }} - {{ $data->description }}</p>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Deposit Action Sheet -->
</div>
