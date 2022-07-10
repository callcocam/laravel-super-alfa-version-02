<style>
    /*@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');*/
    table{
        width: 100%;
        font-family: 'Roboto', sans-serif;
    }
    table > tr{
        border: 1px solid #c3c9da;
        padding: 2px;
    }
    tr>th{
        text-align: right;
        width: 30%;
        padding: 2px;
    }
    tr>td{
        width: 70%;
        padding: 2px;
    }
</style>
<h1>{{ $produto->user->name }}</h1>
<h3>{{ $produto->user->document }}</h3>
<table>
    <tr>
        <th>
            Descrição Completa
        </th>
        <td>
            {{ $produto->descricao_completa }}
        </td>
    </tr>
    <tr>
        <th>
            Cod.Prod.do Fornecedor
        </th>
        <td>
            {{ $produto->cod_prod_fornecedor }}
        </td>
    </tr>
    <tr>
        <th>
            Outras especificações
        </th>
        <td>
            {{ $produto->outras_especificacoes }}
        </td>
    </tr>
    <tr>
        <th>
            Categoria Produto
        </th>
        <td>
            {{ $produto->categoria_produto }}
        </td>
    </tr>
     <tr>
        <th>

        </th>
        <td>
            {{ $produto->descricao_completa }}
        </td>
    </tr>
       <tr>
        <th>
            Subcategoria
        </th>
        <td>
            {{ $produto->subcategoria }}
        </td>
    </tr>
    <tr>
        <th>
            Segmento
        </th>
        <td>
            {{ $produto->segmento }}
        </td>
    </tr>
    <tr>
        <th>
            Subsegmento
        </th>
        <td>
            {{ $produto->subsegmento }}
        </td>
    </tr>
    <tr>
        <th>
            Segmento
        </th>
        <td>
            {{ $produto->segmento }}
        </td>
    </tr>
    <tr>
        <th>
            Marca
        </th>
        <td>
            {{ $produto->marca }}
        </td>
    </tr>
    <tr>
        <th>
            Cor
        </th>
        <td>
            {{ $produto->cor }}
        </td>
    </tr>
    <tr>
        <th>
            Fragrância
        </th>
        <td>
            {{ $produto->fragrancia }}
        </td>
    </tr>
    <tr>
        <th>
            Sabor
        </th>
        <td>
            {{ $produto->sabor }}
        </td>
    </tr>
    <tr>
        <th>
            Modelo
        </th>
        <td>
            {{ $produto->modelo }}
        </td>
    </tr>
    <tr>
        <th>
            Tamanho
        </th>
        <td>
            {{ $produto->tamanho }}
        </td>
    </tr>
    <tr>
        <th>
            % MVA Interno
        </th>
        <td>
            {{ $produto->mva_interno }}
        </td>
    </tr>
    <tr>
        <th>
            % MVA Ajustado
        </th>
        <td>
            {{ $produto->mva_ajustado }}
        </td>
    </tr>
    <tr>
        <th>
            Tipo de Frete (FOB/CIF)
        </th>
        <td>
            {{ $produto->tipo_de_frete }}
        </td>
    </tr>
    <tr>
        <th>
            Classif. Fiscal NCM
        </th>
        <td>
            {{ $produto->classif_fiscal_ncm }}
        </td>
    </tr>
    <tr>
        <th>
            Cód. Barras EAN-13
        </th>
        <td>
            {{ $produto->cod_barras }}
        </td>
    </tr>
    <tr>
        <th>
            Prazo de Validade (em dias)
        </th>
        <td>
            {{ $produto->prazo_de_validade }}
        </td>
    </tr>
    <tr>
        <th>
            Peso Bruto da UND (em Grama)
        </th>
        <td>
            {{ $produto->peso_bruto_da_und }}
        </td>
    </tr>
    <tr>
        <th>
            Peso Líquido da UND (em Grama)
        </th>
        <td>
            {{ $produto->peso_liquido_da_und }}
        </td>
    </tr>
    <tr>
        <th>
            Preço Custo UN
        </th>
        <td>
            {{ $produto->preco_custo_un }}
        </td>
    </tr>
    <tr>
        <th>
            Altura da UND (em cm)
        </th>
        <td>
            {{ $produto->altura_da_und }}
        </td>
    </tr>
    <tr>
        <th>
            Largura da UND (em cm)
        </th>
        <td>
            {{ $produto->largura_da_und }}
        </td>
    </tr>
    <tr>
        <th>
            Profundidade da UND (em cm)
        </th>
        <td>
            {{ $produto->profundidade_da_und }}
        </td>
    </tr>
    <tr>
        <th>
            Qde por Cx/Fdo/etc
        </th>
        <td>
            {{ $produto->qde_por_cx }}
        </td>
    </tr>
</table>
