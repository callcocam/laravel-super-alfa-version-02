<table>
    <tbody>
        <tr>
            <th>Cód Interno</th>
            <th>Cód. barras</th>
            <td>peso_bruto_da_und</td>
            <td>peso_liquido_da_und</td>
            <td>altura_da_und</td>
            <td>largura_da_und</td>
            <td>profundidade_da_und</td>
            <td>peso_bruto_emb_secundaria</td>
            <td>peso_liquido_emb_secundaria</td>
            <td>altura_emb_secundaria</td>
            <td>largura_emb_secundaria</td>
            <td>profundidade_emb_secundaria</td>
        </tr>
        @foreach ($produtos as $produto)

            <tr>
                <td>{{ $produto->compra->codigo_interno }}</td>
                <td>{{ $produto->cod_barras }}</td>
{{--                <td></td>--}}
{{--                <td></td>--}}
{{--                <td></td>--}}
{{--                <td></td>--}}
{{--                <td></td>--}}
{{--                <td></td>--}}
{{--                <td></td>--}}
{{--                <td></td>--}}
{{--                <td></td>--}}
{{--                <td></td>--}}
                <td>{{ $produto->peso_bruto_da_und }}</td>
                <td>{{ $produto->peso_liquido_da_und }}</td>
                <td>{{ $produto->profundidade_da_und }}</td>
                <td>{{ $produto->altura_da_und }}</td>
                <td>{{ $produto->largura_da_und }}</td>
               <?php  if($embalagem = \App\Models\Embalagem::query()->where('produto_id', $produto->id)->first()){ ?>
                <td>{{ $embalagem->peso_bruto }}</td>
                <td>{{ $embalagem->peso_liquido }}</td>
                <td>{{ $embalagem->altura }}</td>
                <td>{{ $embalagem->largura }}</td>
                <td>{{ $embalagem->profundidade }}</td>
    <?php } ?>

            </tr>

        @endforeach
    </tbody>
</table>
