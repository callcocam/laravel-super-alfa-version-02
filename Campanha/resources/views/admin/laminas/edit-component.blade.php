<div>
    <script src="https://unpkg.com/fabric@4.6.0/dist/fabric.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @include('campanha::admin.laminas.fontes')

    @php
        //$produtos = $model->produtos->where('status', 'published');
        $produtos = $model->produtos;
        if($cat_id = request('cat')){
         $produtos = $model->produtos->where('coperat_id', $cat_id);
       //  $produtos = $model->produtos->where('status', 'published')->where('coperat_id', $cat_id);
        }
      // dd($query)
    @endphp


    <ul class="nav nav-pills">
        @forelse($model->coperat as $categoria)
            <li class="nav-item">
                <a class="nav-link active ms-3" href="{{ route('campanhas.laminas.produtos', compact('model'))}}?cat={{$categoria->id}}">{{$categoria->name}}</a>
            </li>
        @empty
        @endforelse
    </ul>

    <div class="row">
        <div class="col-md-12 bg-white py-4">
            <div class="canvas" id="canvas">
                <div class="conteudo-lamina" style="display: grid; grid-template-columns: auto auto auto;grid-template-rows: auto auto auto; ">
                    @forelse($produtos->sortBy('order') as $produto)
                        @php
                            $idcard = rand(0, 99999);
                              if($produto->app == "sim"){
                                  $produto->app = 1;
                                   $produto->promo = 0;
                                }else{
                                    $produto->app = 0;
                                   $produto->promo = 1;
                                }

                             $selo = null;
                            $bgselo = null;
                            if($produto->selos){
                                $selo = 1;
                            }
                            $tipo_campanha = $model->type;
                            $bglamina = null;
                            $corpromo= "#ccc";
                            $corselo= "#ccc";

                            $selomaisdeconto = null;
                            if($produto->preco_desconto){
                                $selomaisdeconto = url('storage') . '/' . $midias_config->selo_mais_desconto;
                            }

                          if($tipo_campanha == "lamina_fim_semana"){
                          $bglamina = url('storage') . '/' . $midias_config->bg_lamina_fim_de_semana;
                          $corpromo = $midias_config->cor_fim_de_semana;
                          }elseif($tipo_campanha == "lamina_segunda_terca"){
                          $bglamina = url('storage') . '/' . $midias_config->bg_lamina_terca;
                          $corpromo = $midias_config->cor_segunda_e_terca;
                          }elseif($tipo_campanha == "lamina_terca_sabor"){
                          $bglamina = url('storage') . '/' . $midias_config->bg_lamina_terca_do_sabor;
                          $bgcard = null;
                          $bgcardapp = null;
                          $bgselo = url('storage') . '/' . $midias_config->bg_selo_terca_do_sabor;
                                        $corpromo = $midias_config->cor_terca_do_sabor;
                          $corselo = $midias_config->cor_selo_terca_sabor;
                          }elseif($tipo_campanha == "lamina_hortifruti"){
                          $bglamina = url('storage') . '/' . $midias_config->bg_lamina_hortifruiti;
                          $corpromo = $midias_config->cor_hortifruti;
                          }elseif($tipo_campanha == "lamina_ofertas_arrasadoras"){
                          $bglamina = url('storage') . '/' . $midias_config->bg_lamina_ofertas_arrasadoras;
                          $corpromo = $midias_config->cor_ofertas_arrasadoras;
                          }
                          elseif($tipo_campanha == "lamina_extra"){
                          $bglamina = url('storage') . '/' . $midias_config->bg_lamina_extra;
                          $corpromo = $midias_config->cor_lamina_extra;
                          } elseif($tipo_campanha == "eletro"){
                          $bglamina = url('storage') . '/' . $midias_config->bg_lamina_eletro;
                          $corpromo = $midias_config->cor_eletro;
                          }

                            $urlimage = null;
                            if ($produto->produto) {
                            if ($produto->produto->image) {
                                $urlimage = \Storage::url('') . $produto->produto->image->archive;
                            }
                              }

                            if ($produto->promo == 1){
                                if($produto->quantidade_parcelas){
                                $parcelas = (int)$produto->quantidade_parcelas;
                                $produto->preco_promocional_total = $produto->preco_promocional ;
                                $produto->preco_promocional = Calcular($produto->preco_promocional,$parcelas, '/') ;
                                $preco_total_reais = Str::before($produto->preco_promocional_total, ',');
                               $preco_total_centavos = Str::after($produto->preco_promocional_total, ',');
                              }
                            }


                            $preco_normal_reais = Str::before($produto->preco_normal, ',');
                            $preco_normal_centavos = Str::after($produto->preco_normal, ',');
                            $lencountnormal = strlen($preco_normal_reais);

                            $preco_promo_reais = Str::before($produto->preco_promocional, ',');
                            $preco_promo_centavos = Str::after($produto->preco_promocional, ',');
                            $lencountpromocional = strlen($preco_promo_reais);

                            if ($produto->fracionado == 1) {
                                $precofracionado = "R$ ". Calcula($produto->preco_promocional,10, '/');
                            }

                            if (isset($produto->preco_app)) {
                                $preco_app_reais = Str::before($produto->preco_app, ',');
                                $preco_app_centavos = Str::after($produto->preco_app, ',');
                                $lencountapp = strlen($preco_app_reais);
                            }
                            $selodesconto = 0;
                            if (isset($produto->preco_desconto)&& $produto->preco_desconto != null && $produto->preco_desconto != '') {
                                $selodesconto = 1;
                                $urlselomaisdeconoto = url('storage/' . $model->selo_mais_desconto);
                            }
                             $concatenacao = null;
                              if($produto->grupos_produtos->count()){
                                  if($produtosparceiros = $produto->grupos_produtos){

                                 $concatenacao = 'ou';
                                 if($produto->concatenacao_produto){
                                     $concatenacao = $produto->concatenacao_produto;

                                 }

                                   foreach($produtosparceiros as $prod){
                                               $produto->descricao_comercial = $produto->descricao_comercial . ' '. $concatenacao . ' '. $prod->produto->marketing->descricao_comercial;
                                    }
                              }
                              }

                            $produto->descricao_comercial = mb_strtolower($produto->descricao_comercial);


                          // Define qual modelo usar


                          $modelo = "1x1y";

                          if(($produto->largura && $produto->largura == "1")&& ($produto->altura && $produto->altura == "1")){
                            $modelo = '1x1y';
                          }
                          if(($produto->largura && $produto->largura == "1")&& ($produto->altura && $produto->altura == "2")){
                            $modelo = '1x2y';
                          }
                          if(($produto->largura && $produto->largura == "1")&& ($produto->altura && $produto->altura == "3")){
                            $modelo = '1x3y';
                          }
                          if(($produto->largura && $produto->largura == "2")&& ($produto->altura && $produto->altura == "1")){
                            $modelo = '2x1y';
                          }
                          if(($produto->largura && $produto->largura == "2")&& ($produto->altura && $produto->altura == "2")){
                            $modelo = '2x2y';
                          }

                          if(($produto->largura && $produto->largura == "3")&& ($produto->altura && $produto->altura == "1")){
                            $modelo = '3x1y';
                          }
                          if(($produto->largura && $produto->largura == "3")&& ($produto->altura && $produto->altura == "2")){
                            $modelo = '3x2y';
                          }

                          $alturabox = "height: 466px;";
                          $largurabox = "width: 466px;";
                          $x = "1";
                          $y = "1";
                          $bgbox= null;

                          if($produto->altura && $produto->altura == "1"){
                            $alturabox = "height: 466px;";
                             $y = "1";
                          }
                          if($produto->altura && $produto->altura == "2" ){
                            $alturabox = "height: 951px;";
                            $y = "2";
                          }
                          if($produto->altura && $produto->altura == "3" ){
                            $alturabox = "height: 1438px;";
                            $y = "3";
                          }

                          if($produto->largura && $produto->largura == "1" ){
                            $largurabox = "width: 466px;";
                            $x = "1";
                          }
                          if($produto->largura && $produto->largura == "2" ){
                            $largurabox = "width: 944px;";
                            $x = "2";
                          }
                          if($produto->largura && $produto->largura == "3" ){
                            $largurabox = "width: 1422px;";
                            $x = "3";
                          }
                          if($produto->fundo ){
                           $bgbox = url('storage/'.$produto->fundo);
                          }

                          if($produto->borda_produto_lamina == "sim" ){
                           $borda = "border: 2px solid ".$produto->cor_borda_produto_lamina .";";
                           $arredondamento = "border-radius: ".$produto->arredondamento_produto_lamina ."px;";
                          }
                          if($produto->cor_fundo_produto_lamina){
                           $cor_fundo = "background: ".$produto->cor_fundo_produto_lamina .";";
                          }
                        @endphp

                        <style>
                            .lamina-produto-content{{ $idcard}} {
                                grid-column: span {{$x}};
                                grid-row: span {{$y}};
                                {{$alturabox}};
                                {{$largurabox}};
                               margin-left: 10px;
                                margin-top: 20px;
                                @if($model->exibir_borda_produto_lamina == "sim")
                                    @if($produto->borda_produto_lamina == "sim")
                                      {{$borda ?? ''}}
                                      {{$arredondamento ?? ''}}
                                    @else
                                         @if ($produto->app == 1)
                                             border: {{$model->tamanho_borda_produto_lamina ?? '2'}}px solid{{$midias_config->cor_app ?? ''}};
                                border-radius: {{$model->tamanho_arredondamento_produto_lamina ?? '5'}}px;
                                @else
                                border: {{$model->tamanho_borda_produto_lamina ?? '2'}}px solid{{$corpromo ?? ''}};
                                border-radius: {{$model->tamanho_arredondamento_produto_lamina ?? '5'}}px;
                                @endif
                            @endif
                        @endif
                       @if($produto->cor_fundo_produto_lamina)
                       {{$cor_fundo}}
                       @endif
                       @if($bgbox != null)
background-image: url('{{$bgbox}}');
                                background-size: cover;
                                background-repeat: no-repeat;
                            @endif
}
                        </style>
{{--                        <div id="lamina-produto{{ $idcard }}">--}}
                            <div class="lamina-produto-content{{ $idcard}}">
                                @if($bgbox != null)
                                    <span style="cursor: pointer; padding: 2px 5px" class="badge abremodalimage  bg-warning m-0" data-bs-toggle="modal" href="#exampleModalToggle{{$idcard}}">&#x2699;</span>
                                    @else
                                    @include('campanha::admin.laminas.blocos.'.$modelo)
                                @endif
{{--                            </div>--}}
                        </div>
                        <div class="modal fade modalconfig" id="exampleModalToggle{{$idcard}}" aria-hidden="true" aria-labelledby="{{$idcard}}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @livewire("admin.laminas.produtoconfig-component", ["model"=>$produto],
                                        key(uniqid($produto)))
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
                <div class="lamina-validade rnphysis-bolditalic">
                    <div>
                        Ofertas válidas
                        @if($model->data_inicio != $model->data_fim)
                            de {{ date_carbom_format($model->data_inicio)->format('d/m') }} a
                            {{ date_carbom_format($model->data_fim)->format('d/m/Y') }}
                        @else
                            para {{ date_carbom_format($model->data_fim)->format('d/m/Y') }},
                        @endif
                        @if($model->loja)
                            para

                            @foreach($model->loja as $loja)
                                @php
                                    $nome =   mb_strtolower($loja->nome);
                                @endphp
                                <span style="text-transform: capitalize">{{$nome}}</span>@if(!$loop->last),  @endif
                                @if($loop->last)
                                    ou enquanto durarem os estoques.
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div id="aguarde"
                 style="color: #efefef; background-color: #f3b601;  text-align: center; padding: 10px; display: none;">
                <div class="spinner-border text-danger" role="status">
                    <span class="sr-only"></span>
                </div>
                AGUARDE, GERANDO IMAGEM
            </div>
            <div id="deuerro" style="color: #efefef; background-color: #c33838;  text-align: center; padding: 10px">
                <div class="spinner-border text-info" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                Oops, deu um erro ao gerar a imagem, Contate o administrador do sistema.
            </div>
            <input type="button" data-canvas="canvas" class="btncanva btn btn-sm mt-2 btn-success" value="Baixar Imagem" />

        </div>
    </div>
    <style>
        .lamina-imagem-box{

        }
        .textoapp {
            color: @if ($midias_config->cor_app) {{ $midias_config->cor_app }} @else #000 @endif;
        }

        .textopromo {
            color: {{$corpromo ?? '#000'}};
        }

        .canvas {
            width: 1450px;
            height: 2577px;
            border: 1px solid #fff;
            display: block;
            background-image: url("{{$bglamina?? ''}}");
            background-size: 1450px;
        }

        .conteudo-lamina {
            width: 1440px;
            height: 1950px;
            margin-top: 485px;
            overflow: hidden;

        }
        .lamina-validade {
            width: 900px;
            height: 100px;
            margin-top: 30px;
            margin-left: 300px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 25px;
            color: #ffffff;
            line-height: 26px;
            letter-spacing: 2px;
        }

        /*Preço normal App*/



          .produto-lamina-preco-normal-app{
            width: 100%;
            height: auto;
            display: flex;
            justify-content: end;
            padding-right: 15px;
        }
        .produto-lamina-preco-normal-app-reais{
            font-size: 80px;
            line-height: 60px;
            padding: 0;
        }
        .produto-lamina-preco-normal-app-centavos{
            font-size: 35px;
            line-height: 25px;
            padding: 0;
        }
        .produto-lamina-preco-normal-app-embalagem{
            font-size: 15px;
            text-align: right;
            text-transform: lowercase;
        }
        /*Preço app*/





        .produto-lamina-preco-ofertas_arrasadoras{
            min-width: 100px;
            float: left;
            background: #E83934;
            border-radius: 10px;
            display: block;
            margin: 10px 0 -5px;

        }
        .produto-lamina-preco-ofertas_arrasadoras .preco_normal{
            font-size: 25px;
        }
        .produto-lamina-preco-ofertas_arrasadoras .preco_normal_riscado{
            width: 80px; height: 1px;
            border-bottom: 3px solid #000;
            display: block;
            float: left;
            transform: rotate(160deg);
            margin-top: -20px;;
            margin-left: 10px;
        }


        .lamina-selo{
            background: #D35928;
            border-radius: 20px;
            width: 160px;
            height: auto;
            float: right;
            top: 0;
            position: inherit;
            padding: 15px;
            font-size: 25px;
            font-family: 'bwglennsans-black';
            line-height: 25px;
        }
        .lamina-selo-titulo{
            color: #fff;
        }
        .lamina-selo-subtitulo{
            color: #FFD948;
        }

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.2/dist/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" defer></script>

    <script>
        var aguarde = document.querySelector('#aguarde');
        var deuerro = document.querySelector('#deuerro');
        aguarde.style.display = "none";
        deuerro.style.display = "none";
        var scale = 1;
        document.querySelectorAll('.btncanva').forEach((btn) => {
            btn.addEventListener('click', function(e) {
                aguarde.style.display = "block";
                document.querySelectorAll('.config-img-lamina').forEach(function(a) {
                    a.remove()
                })
                document.querySelectorAll('.modalconfig').forEach(function(e) {
                    e.remove()
                })
                document.querySelectorAll('.abremodalimage').forEach(function(e) {
                    e.remove()
                })
                var node = document.getElementById(e.target.dataset.canvas);
                domtoimage.toPng(node, {
                    width: node.clientWidth * scale,
                    height: node.clientHeight * scale,
                    style: {
                        transform: 'scale(' + scale + ')',
                        transformOrigin: 'top left'
                    }
                })
                    .then(function(dataUrl) {
                        var img = new Image();
                        img.src = dataUrl;
                        window.saveAs(img.src, 'lamina.png')
                        console.log('baixou')
                        aguarde.style.display = "none";
                    })
                    .catch(function(error) {
                        console.error('oops, deu erro!', error);
                        aguarde.style.display = "none";
                        deuerro.style.display = "block";
                    });
            });
        })
    </script>
</div>
