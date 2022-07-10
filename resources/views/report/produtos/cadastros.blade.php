<!doctype html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

    <table class="tabela" width="border:0;" style="width: 2380px; margin: 50px 0 0 50px; text-transform: uppercase">
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td colspan="2">
                <img style="max-width: 250px;" src="https://superalfa.coop.br/themes/site/img/logo.png">
            </td>
            <td colspan="2">
                <h2>Ficha de Cadastro de Produtos</h2>

            </td>
        </tr>
        <tr>
            <td colspan="4">
                <h2>DADOS DO FORNECEDOR</h2>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Nome:</span>
                {{ $produto->user->name }}
            </td>
            <td colspan="2">
                <span>Razão Social:</span>
                {{ $produto->user->fantasy }}
            </td>
        </tr>
        <tr>
            <td>
                <span>CNPJ:</span>
                {{ $produto->user->document }}
            </td>
            <td>
                <span>Telefone:</span>
                {{ $produto->user->phone }}
            </td>
            <td>
                <span>Email:</span>
                {{ $produto->user->email }}
            </td>
        </tr>
        <tr>
            <td colspan="1">
                @if ($produto->imagem)
                    <img style="max-width: 450px;" src="{{ url('storage') . '/' . $produto->imagem }}">
                @endif
            </td>
            <td colspan="3">
                <span>Data de Cadastro:</span>
                {{ $produto->created_at->format('d/m/Y') }}<br />
                <span>Descrição Completa:</span>
                {{ $produto->descricao_completa }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Cod. Prod. do Fornecedor:</span>
                {{ $produto->cod_prod_fornecedor }}
            </td>
            <td>
                <span>Categoria Produto:</span>
                {{ $produto->categoria_produto }}
            </td>
            <td>
                <span>SubCategoria:</span>
                {{ $produto->subcategoria }}
            </td>
        </tr>
        <tr>
            <td colspan="">
                <span>Tipo de embalagem:</span>
                {{ $produto->segmento_name ? $produto->segmento_name->name : $produto->tipo_de_embalagem }}
            </td>
            <td colspan="">
                <span>Unidade de Medida</span>

                @if ($produto->unidade_medida)
                    @php
                        if ($unidade_de_medida = \App\Models\Medida::find($produto->unidade_medida)) {
                            $produto->unidade_medida = $unidade_de_medida->name;
                        }
                    @endphp
                    {{ $produto->unidade_medida }}
                @endif
            </td>

            <td colspan="">
                <span>Volume de embalagem:</span>
                {{ $produto->volume_de_embalagem }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Marca:</span>
                {{ $produto->marca }}
            </td>
            <td>
                <span>Modelo/Tipo/Referência:</span>
                {{ $produto->modelo }}
            </td>
            <td>
                <span>Cor:</span>
                {{ $produto->cor }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Fragrância/Sabor:</span>
                @if ($produto->fragrancia_sabor)
                    {{ $produto->fragrancia_sabor }}
                @else
                    {{ $produto->sabor }}
                @endif
            </td>
            <td>
                <span>Segmento:</span>
                {{ $produto->segmento }}
            </td>
            <td>
                <span>Subsegmento:</span>
                {{ $produto->subsegmento }}
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <span>Outras especificações:</span>
                {{ $produto->outras_especificacoes }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>% MVA Interno:</span>
                {{ $produto->mva_interno }}
            </td>
            <td>
                <span>% MVA Ajustado:</span>
                {{ $produto->mva_ajustado }}
            </td>
            <td>
                <span>Tipo de Frete (FOB/CIF):</span>
                {{ $produto->tipo_de_frete }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Classif. Fiscal NCM:</span>
                {{ $produto->classif_fiscal_ncm }}
            </td>
            <td>
                <span>Qde por Cx/Fdo/etc:</span>
                {{ $produto->qde_por_cx }}
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <span>Cód. Barras EAN-13:</span>
                {{ $produto->cod_barras }}
            </td>
            <td>
                <span>Prazo de Validade:</span>
                {{ $produto->prazo_de_validade }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Unidade de Medida:</span>
                {{ $produto->unidade_medida }}
            </td>
            <td>
                <span>Peso Bruto da UND:</span>
                {{ $produto->peso_bruto_da_und }}
            </td>
            <td>
                <span>Peso Líquido da UND:</span>
                {{ $produto->peso_liquido_da_und }}
            </td>
            <td>
                <span>Preço Custo UN:</span>
                {{ $produto->preco_custo_un }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Altura da UND:</span>
                {{ $produto->altura_da_und }}
            </td>
            <td>
                <span>Largura da UND:</span>
                {{ $produto->largura_da_und }}
            </td>
            <td>
                <span>Profundidade da UND:</span>
                {{ $produto->profundidade_da_und }}
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <h2>DADOS LOGISTICOS e/ou EMBALAGENS SECUNDÁRIAS</h2>

            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>DUN 14:</span>
                {{ $produto->embalagem->dun_14 }}
            </td>
            <td>
                <span>Qde na emb:</span>
                {{ $produto->embalagem->qde_na_emb_secundaria }}
            </td>
            <td>
                <span>Peso Bruto:</span>
                {{ $produto->embalagem->peso_bruto }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Peso Liquido:</span>
                {{ $produto->embalagem->peso_liquido }}
            </td>
            <td>
                <span>Altura:</span>
                {{ $produto->embalagem->altura }}
            </td>
            <td>
                <span>largura:</span>
                {{ $produto->embalagem->largura }}
            </td>
            <td>
                <span>Profundidade:</span>
                {{ $produto->embalagem->profundidade }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Qde por Camada:</span>
                {{ $produto->embalagem->qde_por_camada }}
            </td>
            <td>
                <span>Empilhamento:</span>
                {{ $produto->embalagem->empilhamento }}
            </td>
            <td>
                <span>Qde no palete:</span>
                {{ $produto->embalagem->qde_no_palete }}
            </td>
            <td>
                <span>Tem Emb. Secundaria:</span>
                {{ $produto->embalagem->tem_embalagem_secundaria }}
            </td>

        </tr>
        <tr>
            <td colspan="4">
                <h2>DADOS COMPRAS</h2>

            </td>
        </tr>
        <tr>
            <td>
                <span>Código Interno Alfa:</span>
                {{ $produto->compra->codigo_interno }}
            </td>
            <td>
                <span>Categoria ALFA:</span>
                @if ($produto->coperat)
                    {{ $produto->coperat->name }}
                @endif
            </td>
            <td>
                <span>Margem do Produto:</span>
                {{ $produto->compra->margem_do_produto }}
            </td>
            <td>
                <span>Quantidade Mínima de Tranf.:</span>
                {{ $produto->compra->quantidade_minima_de_tranf }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Nº do Depósito do CD:</span>
                {{ $produto->compra->n_do_deposito_cd }}
            </td>
            <td>
                <span>Entrega CD ou na Filial:</span>
                {{ $produto->compra->entrega_cd_ou_na_filial }}
            </td>
            <td>
                <span>Item é c D?:</span>
                {{ $produto->compra->item_e_c_d }}
            </td>
        </tr>
        @if ($produto->compra->inclusao_na_linha_ou_substituicao_de_produto)
            <tr>
                <td colspan="4">
                    <span>Inclusão na Linha ou Substituição de Produto:</span>

                    {{ $produto->compra->codigo_do_produto_a_ser_substituído }}
                </td>
            </tr>
        @endif
        <tr>
            <td colspan="2">
                <span>App:</span>
                {{ $produto->compra->app }}
            </td>
            <td colspan="2">
                <span>Ecommerce:</span>
                {{ $produto->compra->ecommerce }}
            </td>
        </tr>
        @if ($produto->compra->ecommerce == 'SIM')

            <tr>
                <td colspan="2">
                    <span>Máximo de unidade por compra:</span>
                    {{ $produto->maximo_de_unidade_por_compra }}
                </td>
                <td colspan="2">
                    <span>Quantidade mínima para compra:</span>
                    {{ $produto->quantidade_minima_para_compra }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span>Fração da unidade de venda:</span>
                    {{ $produto->fracao_da_unidade_de_venda }}
                </td>
                <td colspan="2">
                    <span>Quantidade fixa de estoque:</span>
                    {{ $produto->quantidade_fixa_de_estoque }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span>Percentual sobre estoque:</span>
                    {{ $produto->percentual_sobre_estoque }}
                </td>
                <td colspan="1">
                    <span>Estoque mínimo para loja física:</span>
                    {{ $produto->estoque_mínimo_para_loja_fisica }}
                </td>
                <td colspan="1">
                    <span>Integrar Estoque com quantidade fixa:</span>
                    {{ $produto->integrar_estoque_com_quantidade_fixa }}
                </td>
            </tr>
            @if ($lojas = $produto->lojas)
                <tr>
                    <td colspan="4">
                        <h2>LOJAS ECOMMERCE</h2>
                    </td>
                </tr>
                @foreach ($lojas as $loja)
                    <tr>
                        <td colspan="4">
                            <span>Loja:</span>
                            {{ $loja }}
                        </td>
                    </tr>
                @endforeach
            @endif
        @endif
        <tr>
            <td colspan="4">
                <h2>DADOS MARKETING</h2>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Descrição comercial:</span>
                {{ $produto->marketing->descricao_comercial }}
            </td>
            <td colspan="2">
                <span>Descrição para ERP:</span>
                {{ $produto->marketing->descricao_para_erp }}
            </td>
        </tr>
        @if ($conta_nivel04 = $produto->nivel($produto->marketing->conta_nivel04))
            @if ($conta_nivel03 = $produto->nivel($conta_nivel04->bc_id))
                @if ($conta_nivel02 = $produto->nivel($conta_nivel03->bc_id))
                    @if ($conta_nivel01 = $produto->nivel($conta_nivel02->bc_id))
                        <tr>
                            <td>
                                <span>Conta Nivel 1:</span>
                                {{ $conta_nivel01->name }}
                            </td>
                            <td>
                                <span>Conta Nivel 2:</span>
                                {{ $conta_nivel02->name }}
                            </td>
                            <td>
                                <span>Conta Nivel 3:</span>
                                {{ $conta_nivel03->name }}
                            </td>
                            <td>
                                <span>Conta Nivel 4:</span>
                                {{ $conta_nivel04->name }}
                            </td>
                        </tr>
                    @endif
                @endif
            @endif
        @endif

        <tr>
            <td>
                <span>Atributo 1:</span>
                {{ $produto->marketing->atributo01 }}
            </td>
            <td>
                <span>Atributo 2:</span>
                {{ $produto->marketing->atributo02 }}
            </td>
            <td>
                <span>Atributo 3:</span>
                {{ $produto->marketing->atributo03 }}
            </td>
            <td>
                <span>Atributo 4:</span>
                {{ $produto->marketing->atributo04 }}
            </td>
        </tr>
    </table>

    <style>
        @page {
            margin: 0px;
        }

        .page-break {
            page-break-after: always;
        }

        .table,
        td {
            border: 1px dashed #cbcbcb;
            padding: 15px;
            font-size: 30px;
            font-weight: bold;
        }

        .tabela {
            font-family: Sans-serif !important;
        }

        .tabela td span {
            font-weight: normal;
            color: #666;
        }

        .tabela h2 {
            text-align: center;
            color: #666;
            font-size: 40px;
            font-weight: bold;
            padding: 15px;
            margin: 0;
            font-style: italic;
        }
    </style>
</body>

</html>
