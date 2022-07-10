<x-report-layout>
    <div class="p-4">
        <div class="row">
            <div class="topo">
                <img style="max-width: 250px;" src="https://superalfa.coop.br/themes/site/img/logo.png">
                <h1>Ficha de Cadastro de Produtos</h1>
            </div>
        </div>
        <div class="divider">
            <div class="divider-text">DADOS DO FORNECEDOR</div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nome
                            </span>
                        </div>
                        <label class="form-control">{{ $produto->descricao_completa }}</label>
                    </div>

                </fieldset>
            </div>
            <div class="col-md-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Razão Social
                            </span>
                        </div>
                        <input class="form-control" id="" name="">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">CNPJ
                            </span>
                        </div>
                        <input class="form-control" id="" name="">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email
                            </span>
                        </div>
                        <input class="form-control" id="" name="">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Telefone
                            </span>
                        </div>
                        <input class="form-control" id="" name="">
                    </div>

                </fieldset>
            </div>
        </div>

        <div class="divider">
            <div class="divider-text">DADOS DO PRODUTO</div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-2"><img class="img-fluid"
                                            src="https://d1fk7i3duur4ft.cloudfront.net/cp8RiBJ7URrLRDgfS57m_TUYOZ0=/fit-in/382x382/https://sup-ecommerce-alfa.s3.sa-east-1.amazonaws.com/65a95fc5-20185.png">
            </div>
            <div class="col-md-8 mb-2">
                <fieldset>
                    <div class="input-group  mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Data de Cadastro
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input class="form-control" id="descricao_completa" name="descricao_completa">
                    </div>

                </fieldset>
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Descrição Completa
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=descricao_completa" class="form-control"
                               id="descricao_completa" name="descricao_completa">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cod. Prod. do Fornecedor
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=cod_prod_fornecedor" class="form-control"
                               id="cod_prod_fornecedor" name="cod_prod_fornecedor">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Categoria Produto
                            </span>
                        </div>
                        <input value="=categoria_produto" class="form-control" id="categoria_produto"
                               name="categoria_produto">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">SubCategoria
                            </span>
                        </div>
                        <input value="=subcategoria" class="form-control" id="subcategoria"
                               name="subcategoria">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-7 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Segmento
                            </span>
                        </div>
                        <input value="=segmento" class="form-control" id="segmento" name="segmento">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-5 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Subsegmento
                            </span>
                        </div>
                        <input value="=subsegmento" class="form-control" id="subsegmento"
                               name="subsegmento">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-5 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Marca
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=marca" class="form-control" id="marca" name="marca">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Modelo
                            </span>
                        </div>
                        <input value="=modelo" class="form-control" id="modelo" name="modelo">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-3 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cor
                            </span>
                        </div>
                        <input value="=cor" class="form-control" id="cor" name="cor">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Fragrância
                            </span>
                        </div>
                        <input value="=fragrancia" class="form-control" id="fragrancia"
                               name="fragrancia">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Sabor
                            </span>
                        </div>
                        <input value="=sabor" class="form-control" id="sabor" name="sabor">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tamanho
                            </span>
                        </div>
                        <input value="=tamanho" class="form-control" id="tamanho" name="tamanho">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Outras especificações
                            </span>
                        </div>
                        <input value="=outras_especificacoes" class="form-control"
                               id="outras_especificacoes" name="outras_especificacoes">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">% MVA Interno
                            </span>
                        </div>
                        <input value="=mva_interno" class="form-control" id="mva_interno"
                               name="mva_interno">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">% MVA Ajustado
                            </span>
                        </div>
                        <input class="form-control" id="mva_ajustado" name="mva_ajustado">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tipo de Frete (FOB/CIF)
                            </span>
                        </div>
                        <input value="=tipo_de_frete" class="form-control" id="tipo_de_frete"
                               name="tipo_de_frete">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Classif. Fiscal NCM
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=classif_fiscal_ncm" class="form-control"
                               id="classif_fiscal_ncm" name="classif_fiscal_ncm">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-6 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Qde por Cx/Fdo/etc
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=qde_por_cx" class="form-control" id="qde_por_cx"
                               name="qde_por_cx">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-7 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cód. Barras EAN-13
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=cod_barras" class="form-control" id="cod_barras"
                               name="cod_barras">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-5 col-lg-3 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Prazo de Validade
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=prazo_de_validade" class="form-control" id="prazo_de_validade"
                               name="prazo_de_validade" title="(em dias)" data-bs-toggle="tooltip" data-bs-placement="top">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Peso Bruto da UND
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=peso_bruto_da_und" class="form-control" id="peso_bruto_da_und"
                               name="peso_bruto_da_und" title="(em Grama)" data-bs-toggle="tooltip"
                               data-bs-placement="top">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Peso Líquido da UND
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=peso_liquido_da_und" class="form-control"
                               id="peso_liquido_da_und" name="peso_liquido_da_und" title="(em Grama)"
                               data-bs-toggle="tooltip" data-bs-placement="top">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Preço Custo UN
                            </span>
                        </div>
                        <input value="=preco_custo_un" class="form-control" id="preco_custo_un"
                               name="preco_custo_un">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Altura da UND
                            </span>
                        </div>
                        <input value="=altura_da_und" class="form-control" id="altura_da_und"
                               name="altura_da_und" title="(em cm)" data-bs-toggle="tooltip" data-bs-placement="top">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Largura da UND
                            </span>
                        </div>
                        <input value="=largura_da_und" class="form-control" id="largura_da_und"
                               name="largura_da_und" title="(em cm)" data-bs-toggle="tooltip" data-bs-placement="top">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Profundidade da UND
                            </span>
                        </div>
                        <input value="=profundidade_da_und" class="form-control"
                               id="profundidade_da_und" name="profundidade_da_und" title="(em cm)" data-bs-toggle="tooltip"
                               data-bs-placement="top">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="divider">
            <div class="divider-text">DADOS LOGISTICOS e/ou EMBALAGENS SECUNDÁRIAS</div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 mb-2">
                <label fo="dun_14">
                    DUN 14:
                    <span class="text-danger">*</span>
                </label>
                <div class="form-group">
                    <input value="=embalagens.dun_14" class="form-control" id="dun_14"
                           title="(ou EAN quando Embalagem em CX/FDO/Display)" data-bs-toggle="tooltip"
                           data-bs-placement="top">
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mb-2">
                <label fo="qde_na_emb_secundaria">
                    Qde na emb:
                    <span class="text-danger">*</span>
                </label>
                <div class="form-group">
                    <input value="=embalagens.qde_na_emb_secundaria" class="form-control"
                           id="qde_na_emb_secundaria" title="Secundária (cx/fdo/display)" data-bs-toggle="tooltip"
                           data-bs-placement="top">
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mb-2">
                <label fo="peso_bruto">
                    Peso Bruto:
                    <span class="text-danger">*</span>
                </label>
                <div class="form-group">
                    <input value="=embalagens.peso_bruto" class="form-control" id="peso_bruto"
                           title="cx/fdo (em grama)" data-bs-toggle="tooltip" data-bs-placement="top">
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mb-2">
                <label fo="peso_liquido">
                    Peso Liquido:
                    <span class="text-danger">*</span>
                </label>
                <div class="form-group">
                    <input value="=embalagens.peso_liquido" class="form-control" id="peso_liquido"
                           title="cx/fdo (em grama)" data-bs-toggle="tooltip" data-bs-placement="top">
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mb-2">
                <label fo="altura">
                    Altura:
                    <span class="text-danger">*</span>
                </label>
                <div class="form-group">
                    <input value="=embalagens.altura" class="form-control" id="altura"
                           title="cx/fdo (em cm)" data-bs-toggle="tooltip" data-bs-placement="top">
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mb-2">
                <label fo="largura">
                    largura:
                    <span class="text-danger">*</span>
                </label>
                <div class="form-group">
                    <input value="=embalagens.largura" class="form-control" id="largura"
                           title="cx/fdo (em cm)" data-bs-toggle="tooltip" data-bs-placement="top">
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mb-2">
                <label fo="profundidade">
                    Profundidade:
                    <span class="text-danger">*</span>
                </label>
                <div class="form-group">
                    <input value="=embalagens.profundidade" class="form-control" id="profundidade"
                           title="cx/fdo (em cm)" data-bs-toggle="tooltip" data-bs-placement="top">
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mb-2">
                <label fo="qde_por_camada">
                    Qde por Camada:
                    <span class="text-danger">*</span>
                </label>
                <div class="form-group">
                    <input value="=embalagens.qde_por_camada" class="form-control"
                           id="qde_por_camada" title="(em cx/fdo,etc)" data-bs-toggle="tooltip" data-bs-placement="top">
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mb-2">
                <label fo="empilhamento">
                    Empilhamento:
                    <span class="text-danger">*</span>
                </label>
                <div class="form-group">
                    <input value="=embalagens.empilhamento" class="form-control" id="empilhamento"
                           title="(em cx/fdo,etc)" data-bs-toggle="tooltip" data-bs-placement="top">
                </div>
            </div>
            <div class="col-md-12 col-lg-2 mb-2">
                <label fo="qde_no_palete">
                    Qde no palete:
                    <span class="text-danger">*</span>
                </label>
                <div class="form-group">
                    <input value="=embalagens.qde_no_palete" class="form-control" id="qde_no_palete"
                           title="(em cx/fdo,etc)" data-bs-toggle="tooltip" data-bs-placement="top">
                </div>
            </div>
        </div>
        <div class="divider">
            <div class="divider-text">PREENCHIMENTO COOPERALFA</div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Código Interno Alfa
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=codigo_interno" class="form-control" id="codigo_interno"
                               name="codigo_interno">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-6 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Conta de estoque Cooperate
                            </span>
                        </div>
                        <input value="=conta_de_estoque_cooperate" class="form-control"
                               id="conta_de_estoque_cooperate" name="conta_de_estoque_cooperate">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Margem do Produto
                            </span>
                        </div>
                        <input value="=margem_do_produto" class="form-control" id="margem_do_produto"
                               name="margem_do_produto">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-6 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Quantidade Mínima de Tranf.
                            </span>
                        </div>
                        <input value="=quantidade_minima_de_tranf" class="form-control"
                               id="quantidade_minima_de_tranf" name="quantidade_minima_de_tranf">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nº do Depósito do CD
                            </span>
                        </div>
                        <input value="=n_do_deposito_cd" class="form-control" id="n_do_deposito_cd"
                               name="n_do_deposito_cd">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-6 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Conta Nivel 4
                            </span>
                        </div>
                        <input value="=entrega_cd_ou_na_filial" class="form-control"
                               id="entrega_cd_ou_na_filial" name="entrega_cd_ou_na_filial">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-4 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Entrega CD ou na Filial
                            </span>
                        </div>
                        <input value="=item_e_c_d" class="form-control" id="item_e_c_d"
                               name="item_e_c_d">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-8 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Inclusão na Linha ou Substituição de Produto
                            </span>
                        </div>
                        <input value="=inclusao_na_linha_ou_substituicao_de_produto"
                               class="form-control" id="inclusao_na_linha_ou_substituicao_de_produto"
                               name="inclusao_na_linha_ou_substituicao_de_produto">
                    </div>

                </fieldset>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-6 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Descrição comercial
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=descriçao_comercial" class="form-control"
                               id="descriçao_comercial" name="descriçao_comercial">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-6 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Descrição para ERP
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=descricao_para_erp" class="form-control"
                               id="descricao_para_erp" name="descricao_para_erp">
                    </div>

                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-3 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Conta Nivel 1
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=conta_nivel01" class="form-control" id="conta_nivel01"
                               name="conta_nivel01">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-3 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Conta Nivel 2
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=conta_nivel02" class="form-control" id="conta_nivel02"
                               name="conta_nivel02">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-3 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Conta Nivel 3
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=conta_nivel03" class="form-control" id="conta_nivel03"
                               name="conta_nivel03">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-3 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Conta Nivel 4
                                <span class="text-danger">*</span>
                            </span>
                        </div>
                        <input value="=conta_nivel04" class="form-control" id="conta_nivel04"
                               name="conta_nivel04">
                    </div>

                </fieldset>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-3 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Atributo 1
                            </span>
                        </div>
                        <input value="=atributo01" class="form-control" id="atributo01"
                               name="atributo01">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-3 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Atributo 2
                            </span>
                        </div>
                        <input value="=atributo02" class="form-control" id="atributo02"
                               name="atributo02">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-3 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Atributo 3
                            </span>
                        </div>
                        <input value="=atributo03" class="form-control" id="atributo03"
                               name="atributo03">
                    </div>

                </fieldset>
            </div>
            <div class="col-md-12 col-lg-3 mb-2">
                <fieldset>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Atributo 4
                            </span>
                        </div>
                        <input value="=atributo04" class="form-control" id="atributo04"
                               name="atributo04">
                    </div>

                </fieldset>
            </div>
        </div>
    </div>
    <style>
        .topo {
            display: flex;
            align-items: center;
            align-content: center;
        }

        .topo h1 {
            color: rgb(68, 63, 63);
            padding-left: 50px;
        }

        .divider {
            background-color: rgb(156, 155, 154);
            padding: 15px;
            margin: 20px 0;
            color: #fff;
            font-weight: bold;
        }
    </style>
</x-report-layout>
