<div>
    <form wire:submit.prevent="saveAndGoBack">
        <table class="table table-sm p-0 m-0">
            <tr>
                <td colspan="2">DESCRIÇÃO COMERCIAL </td>
                <td colspan="2">DESCRIÇÃO ENCARTE/CARTAZ </td>
                <td colspan="1" width="100">UNIDADE DE MEDIDA </td>
                <td colspan="1"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea style="width: 250px" wire:model.lazy="descricao_comercial" type="text" class="form-control border @if(!$descricao_comercial)border-danger @else border-success @endif"
                              placeholder="" aria-describedby="button-addon1"> </textarea>
                </td>
                <td colspan="2">
                    <textarea style="width: 250px" wire:model.lazy="descricao_para_encarte" type="text" class="form-control border @if(!$descricao_para_encarte)border-danger @else border-success @endif"
                              placeholder="" aria-describedby="button-addon1"></textarea><br/>
                </td>
                <td colspan="1">
                    <button style="width: 100px" class="btn btn-sm @if($unidade_medida_name == "Selecione")btn-warning @else btn-success @endif
                     dropdown-toggle" type="button" data-bs-toggle="dropdown"
                              aria-expanded="false" style="width: 150px">
                        {{$unidade_medida_name}}
                    </button>
                    <ul class="dropdown-menu" style="margin: 0px;">
                        @foreach($this->um as $key =>$um)
                            <li class="m-0 p-0"><a class="dropdown-item m-0 p-0 {{ $key == $unidade_medida ? 'text-danger':'' }}" wire:click.prevent="setUnidadeMedida('{{ $key }}','{{ $um  }}')" href="#">{{ $um }}</a></li>
                        @endforeach
                    </ul>
                </td>
                <td  colspan="1" class="text-end">
                    <button class="btn btn-primary" type="submit" id="button-addon1">Salvar</button>
                </td>
            </tr>
        </table>
    </form>

</div>
