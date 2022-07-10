<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Lista de produtos da familia {{ $model->name }}</h4>                
            </div>
            <div class="card-content">
                <div class="card-body">
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table uppercase text-sm-start"
                            style="text-transform: uppercase; font-size: 12px;">
                            <thead>
                                <tr>
                                    <th> Imagem </th>
                                    <th> Descrição </th>
                                    <th> Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model->produtos_familia as $produto)
                                <tr>
                                    <td>
                                        <a href="{{ \Storage::url($produto->imagem) }}"
                                            target="_blank">
                                            <img width="50" height="50"
                                                src="{{ \Storage::url($produto->imagem) }}"
                                                class="rounded-circle" style="background: rgba(0,255,128,0.32)">
                                        </a>
                                    </td>
                                    <td>
                                        {{$produto->search}}
                                    </td>
                                    <td>
                                        <span class="badge bg-info"> {{ $produto->status }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
