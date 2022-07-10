<table class="tabela-produtos">
    <tbody>
    <tr>
        <th colspan="16"><b>Nome da Campanha:</b> {{$campanha->nome}}</th>
    </tr>
    <tr>
        <th colspan="16"><b>Vigência:  </b> {{date_carbom_format($campanha->data_inicio)->format('d-m-Y')}} até {{date_carbom_format($campanha->data_fim)->format('d-m-Y')}} </th>
    </tr>
    <tr>
        <th colspan="16"><b>Loja(s):</b>
            @if($campanha->loja)
                @foreach($campanha->loja as $loja)
                    - {{$loja->nome}} ({{$loja->codigo}})
                @endforeach
            @endif
        </th>
    </tr>
    </tbody>
</table>

<table class="tabela-produtos">
    <tbody>
    <tr>
            <th>Categoria</th>
            <th style="background: #bcbcf1; text-align: center">Cód Interno</th>
            <th style="background: #bcbcf1; text-align: center">Cód. barras</th>
            <th style="background: #bcbcf1; text-align: center">Desc. Encarte/Cartaz</th>
            <th style="background: #bcbcf1; text-align: center">Observação</th>
            <th style="background: #bcbcf1; text-align: center">Qtd por caixa</th>

            <th style="background: #bcbcf1; text-align: center">Unidade de Medida</th>
            <th style="background: #bcbcf1; text-align: center">Preço Custo</th>
            <th style="background: #bcbcf1; text-align: center">Preço Normal</th>
            <th style="background: #bcbcf1; text-align: center">Preço Promo. </th>
            <th style="background: #bcbcf1; text-align: center">Parcelas</th>
            <th style="background: #bcbcf1; text-align: center">Valor da Parcela</th>
            <th style="background: #bcbcf1; text-align: center">É App? </th>

            <th style="background: #bcbcf1; text-align: center">Preço App </th>
            <th style="background: #bcbcf1; text-align: center">Preço mais desconto</th>
            <th style="background: #bcbcf1; text-align: center">Tipo</th>
        </tr>
        @foreach ($produtos as $produto)
            <?php $codbarras = (int) $produto->codigo_barras;
            $precoparcela = Calcular($produto->preco_promocional,(int)$produto->quantidade_parcelas, '/')
            ?>
{{--            @dd($produto)--}}
            <tr>
                <td>{{ $produto->coperat->name }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->codigo_interno }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $codbarras }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif">{{ $produto->descricao_comercial }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif">{{ $produto->descricao_auxiliar }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->qde_por_cx }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->tipo_embalagem }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->preco_custo }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->preco_normal }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->preco_promocional }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->quantidade_parcelas }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">@if($produto->app == "não" && (int)$produto->quantidade_parcelas != 1){{$precoparcela}}@endif</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->app }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">@if($produto->app == "sim") {{ $produto->preco_app }} @endif</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->preco_desconto }}</td>
                <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">PAI</td>
            </tr>
            @if ($grupos = $produto->grupo)
                @foreach ($grupos as $grupo)
                <?php $codbarras = (int) $grupo->produto->cod_barras;
                $precoparcela = Calcular($produto->preco_promocional,(int)$produto->quantidade_parcelas, '/')

                ?>
                    <tr>
                        <td>{{ $produto->coperat->name }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $grupo->produto->compra->codigo_interno }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $codbarras }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif">{{ $grupo->produto->marketing->descricao_comercial }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif">{{ $grupo->produto->descricao_auxiliar }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->qde_por_cx }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->tipo_embalagem }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->preco_custo }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->preco_normal }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->preco_promocional }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->quantidade_parcelas }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">@if($produto->app == "não" && (int)$produto->quantidade_parcelas != 1){{$precoparcela}}@endif</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->app }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">@if($produto->app == "sim") {{ $produto->preco_app }} @endif</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">{{ $produto->preco_desconto }}</td>
                        <td style="@if($produto->app == "sim") background: greenyellow; @endif text-align: center">PARCEIRO</td>
                    </tr>
                @endforeach
            @endif
        @endforeach
    </tbody>
</table>

