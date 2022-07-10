<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://unpkg.com/fabric@4.6.0/dist/fabric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.2/dist/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js"
            integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA=="
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/fabric@4.6.0/dist/fabric.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>
<div class="container-fluid">
    <div class="row">
        @forelse($model->produtos->where('status','published')->sortBy('order') as $produto)
            @php
                $selo = null;
                     $bgselo = null;

                       $bebacommoderacao = 0;

                              if($produto->produto->coperat_id == '6c4c77fb-2ff1-4f75-a339-7cf0b75e035f'){
                                  $bebacommoderacao = 1;
                              }
                          if($produto->selos){
                                $selo = 1;
                            }

                                 $selomaisdeconto = null;
                                  if($produto->preco_desconto){
                                      $selomaisdeconto = url('storage') . '/' . $midias_config->selo_mais_desconto;
                                  }
                     $tipo_campanha = $model->type;
                     $bglamina = null;
                     $bgstoriepromo  = null;
                     $bgstorieapp  = null;
                     $corselo= "#ccc";
                     $corpromo= "#ccc";

                if($tipo_campanha == "lamina_fim_semana"){
                  $bgstoriepromo = url('storage') . '/' . $midias_config->bg_stories_promo;
                  $bgstorieapp = url('storage') . '/' . $midias_config->bg_stories_app;
                  $bgselo = url('storage') . '/' . $midias_config->bg_selo_fim_de_semana;
                  $corselo = $midias_config->cor_selo_fim_de_semana;
                  $corpromo = $midias_config->cor_fim_de_semana;

                }elseif($tipo_campanha == "lamina_segunda_terca"){
                  $bgstoriepromo = url('storage') . '/' . $midias_config->bg_stories_promo_segunda_terca;
                  $bgstorieapp = url('storage') . '/' . $midias_config->bg_stories_app_segunda_terca;
                  $bgselo = url('storage') . '/' . $midias_config->bg_selo_segunda_e_terca;
                  $corselo = $midias_config->cor_selo_segunda_terca;
                   $corpromo = $midias_config->cor_segunda_e_terca;
                }elseif($tipo_campanha == "lamina_terca_sabor"){
                  $bgstoriepromo = null;
                  $bgstorieapp = null;
                  $bgselo = url('storage') . '/' . $midias_config->bg_selo_terca_do_sabor;
                  $corselo = $midias_config->cor_selo_terca_sabor;

                }elseif($tipo_campanha == "lamina_hortifruti"){
                  $bgstoriepromo = url('storage') . '/' . $midias_config->bg_stories_promo_hortifruti;
                  $bgstorieapp = url('storage') . '/' . $midias_config->bg_stories_app_hortifruti;
                   $bgselo = url('storage') . '/' . $midias_config->bg_selo_horti;
                  $corselo = $midias_config->cor_selo_hortifruti;
                   $corpromo = $midias_config->cor_hortifruti;
                }elseif($tipo_campanha == "lamina_ofertas_arrasadoras"){
                  $bgstoriepromo = url('storage') . '/' . $midias_config->bg_stories_promo_ofertas_arrasadoras;
                  $bgstorieapp = url('storage') . '/' . $midias_config->bg_stories_app_ofertas_arrasadoras;
                   $bgselo = url('storage') . '/' . $midias_config->bg_selo_ofertas_arrasadoras;
                  $corselo = $midias_config->cor_selo_ofertas_arrasadoras;
                   $corpromo = $midias_config->cor_ofertas_arrasadoras;
                }
                 elseif($tipo_campanha == "lamina_extra"){
                    $bgstoriepromo = url('storage') . '/' . $midias_config->bg_stories_promo_lamina_extra;
                   $bgstorieapp = url('storage') . '/' . $midias_config->bg_stories_app_lamina_extra;
                    $bgselo = url('storage') . '/' . $midias_config->bg_selo_lamina_extra;
                   $corpromo = $midias_config->cor_lamina_extra;
                   $corselo = $midias_config->cor_selo_lamina_extra;
                 }
                elseif($tipo_campanha == "eletro"){
                                                $bgstoriepromo = url('storage') . '/' . $midias_config->bg_stories_promo_eletro;
                                               $corpromo = "#fff";
                 }

               // dd($bgstoriepromo);
                   $idcard = rand(0, 99999);
                   // $imagemurl =url('/storage').'/'.$produto->produto->imagem;
                    $urlimage = null;
                    if ($produto->produto->image) {
                               $urlimage = \Storage::url('') . $produto->produto->image->archive;
                    }

                   $preco_normal_reais = Str::before($produto->preco_normal, ',');
                   $preco_normal_centavos = Str::after($produto->preco_normal, ',');
                   $lencountnormal = strlen($preco_normal_reais);

                   $preco_promo_reais = Str::before($produto->preco_promocional, ',');
                   $preco_promo_centavos = Str::after($produto->preco_promocional, ',');
                   $lencountpromocional = strlen($preco_promo_reais);

                   if (isset($produto->preco_app)) {
                       $preco_app_reais = Str::before($produto->preco_app, ',');
                       $preco_app_centavos = Str::after($produto->preco_app, ',');
                       $lencountapp = strlen($preco_app_reais);

                   }
                   $precofracionado = null;
                   if ($produto->fracionado == 1) {
                                $precofracionado = "R$ ". Calcula($produto->preco_promocional,10, '/');
                   }

                   $selodesconto = 0;
                   if (isset($produto->preco_desconto)) {
                     $selodesconto = 1 ;
                           $urlselomaisdeconoto = url('storage/'.$model->selo_mais_desconto) ;
                   }
                    if($produtosparceiros = $produto->grupos_produtos){

                                  foreach($produtosparceiros as $prod){
                                              $produto->descricao_comercial = $produto->descricao_comercial . ' ou ' . $prod->produto->marketing->descricao_comercial;
                                   }
                             }

                   $produto->descricao_comercial = mb_strtolower($produto->descricao_comercial);
                  // $produto->descricao_comercial = ucwords($produto->descricao_comercial);

                   //Prepara dados para box normal

                       if($lencountnormal == 1 ):
                         $normalreaisfontsize = 'font-size: 110px; line-height: 90px; padding-left: 5px; letter-spacing: -5px;';
                         $normalcentavosfs ='font-size: 40px; line-height: 33px; letter-spacing: 0; text-align: right;padding-left: 10px';
                       elseif ($lencountnormal == 2 ):
                        $normalreaisfontsize = 'font-size: 110px; line-height: 90px; padding-left: 5px; letter-spacing: -5px;';
                         $normalcentavosfs ='font-size: 40px; line-height: 33px; letter-spacing: 0; text-align: right;padding-left: 10px';
                         elseif ($lencountnormal == 3 ):
                          $normalreaisfontsize = 'font-size: 110px; line-height: 90px; padding-left: 5px; letter-spacing: -5px;';
                         $normalcentavosfs ='font-size: 40px; line-height: 33px; letter-spacing: 0; text-align: right;padding-left: 10px';
                       elseif ($lencountnormal == 4 ):
                          $normalreaisfontsize = 'font-size: 110px; line-height: 90px; padding-left: 5px; letter-spacing: -5px;';
                         $normalcentavosfs ='font-size: 40px; line-height: 33px; letter-spacing: 0; text-align: right;padding-left: 10px';
                        else:
                          $normalreaisfontsize = 'font-size: 110px; line-height: 90px; padding-left: 5px; letter-spacing: -5px;';
                         $normalcentavosfs ='font-size: 40px; line-height: 33px; letter-spacing: 0; text-align: right;padding-left: 10px';
                       endif;

                       //Prepara dados para box promo
                       if($lencountpromocional == 1 ):
                         $promoreaisfontsize = 'font-size: 210px; line-height: 160px; padding-left: 5px; letter-spacing: -5px;';
                         $promocentavosfs ='font-size: 80px; line-height: 64px; letter-spacing: 0;text-align: right;padding-left: 10px';
                       elseif ($lencountpromocional == 2 ):
                         $promoreaisfontsize = 'font-size: 210px; line-height: 160px; padding-left: 5px; letter-spacing: -5px;';
                         $promocentavosfs = 'font-size: 80px; line-height: 64px; letter-spacing: 0;text-align: right;padding-left: 10px';

                       elseif ($lencountpromocional == 3 ):
                          $promoreaisfontsize = 'font-size: 170px; line-height: 130px;  padding-left: 5px; letter-spacing: -5px; ';
                         $promocentavosfs = 'font-size: 50px; line-height: 40px; letter-spacing: 0;text-align: right;padding-left: 10px';
                       elseif ($lencountpromocional == 4 ):
                          $promoreaisfontsize = 'font-size: 130px; line-height: 100px; padding-left: 5px; letter-spacing: -5px;';
                         $promocentavosfs = 'font-size: 45px; line-height: 35px; letter-spacing: 0;text-align: right;padding-left: 10px';
                      else:
                        $promoreaisfontsize = 'font-size: 130px; line-height: 100px; padding-left: 5px; letter-spacing: -5px;';
                         $promocentavosfs = 'font-size: 45px; line-height: 35px; letter-spacing: 0;text-align: right;padding-left: 10px';
                       endif;

                   //Prepara dados para box app
                   if (!isset($lencountapp)) {
                      $lencountapp = 1;

                   }
                       if($lencountapp == 1 ):
                            $appreaisfontsize = 'font-size: 210px; line-height: 160px;  margin-left: -5px; letter-spacing: -5px;';
                            $appcentavosfs = 'font-size: 80px; line-height: 67px; letter-spacing: 0;text-align: right;padding-left: 10px';
                       elseif ($lencountapp == 2 ):
                             $appreaisfontsize = 'font-size: 210px; line-height: 160px; margin-left: -5px; letter-spacing: -5px;';
                             $appcentavosfs = 'font-size: 80px; line-height: 67px; letter-spacing: 0;text-align: right;padding-left: 10px';
                       elseif ($lencountapp == 3 ):
                             $appreaisfontsize =  'font-size: 170px; line-height: 135px;   margin-left: -5px; letter-spacing: -5px;';
                             $appcentavosfs = 'font-size: 50px; line-height: 50px; letter-spacing: 0;text-align: right;padding-left: 10px';
                       elseif ($lencountapp >= 4 ):
                              $appreaisfontsize = 'font-size: 130px; line-height: 100px;  margin-left: -5px; letter-spacing: -5px;';
                             $appcentavosfs = 'font-size: 45px; line-height: 35px; letter-spacing: 0;text-align: right;padding-left: 10px';
                      else:
                        $appreaisfontsize = 'font-size: 130px; line-height: 100px;  margin-left: -5px; letter-spacing: -5px;';
                             $appcentavosfs = 'font-size: 45px; line-height: 35px; letter-spacing: 0;text-align: right;padding-left: 10px';
                       endif;
            @endphp
            <div class="card">
                <div class="canvas" id="canvas{{ $idcard }}"
                     @if ($produto->app == 'sim')
                     style="background-image: url('{{ $bgstorieapp }}');"
                     @else
                     style="background-image: url('{{ $bgstoriepromo }}');"
                    @endif
                >

                    <div class="card-content">
                        @if ($produto->app == 'sim')
                            @include('campanha::admin.stories.produtoapp')
                        @else
                            @include('campanha::admin.stories.produtopromo')
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-end pt-1">
                        <span style="cursor: pointer; padding: 2px 5px" class="badge  bg-danger m-0" id="excluir{{$idcard}}">&#x2716;</span>
                        <span style="cursor: pointer; padding: 2px 5px" class="badge  bg-info m-0" id="parafrente{{$idcard}}">&uArr;</span>
                        <span style="cursor: pointer; padding: 2px 5px" class="badge  bg-info m-0" id="emcima{{$idcard}}">&uArr;&uArr;</span>
                        <span style="cursor: pointer; padding: 2px 5px" class="badge  bg-info m-0" id="paratraz{{$idcard}}">&dArr;</span>
                        <span style="cursor: pointer; padding: 2px 5px" class="badge  bg-info m-0" id="embaixo{{$idcard}}">&dArr;&dArr;</span>
                        <span style="cursor: pointer; padding: 2px 5px"  class="badge  bg-danger m-0 resetar{{ $idcard }}">Resetar</span>
                        <input type="button" data-canvas="canvas"
                               class="btncanva{{ $idcard }} btn btn-sm btn-success mt-2 m-sm-1" value="Baixar" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div id="aguarde{{ $idcard }}"
                             style="color: #efefef; background-color: #f3b601;  text-align: center; padding: 5px 10px; display: none;">
                            <div class="spinner-border text-danger" role="status">
                                <span class="sr-only"></span>
                            </div>
                            Aguarde
                        </div>
                        <div id="deuerro{{ $idcard }}"
                             style="color: #efefef; background-color: #c33838;  text-align: center; padding: 10px">
                            <div class="spinner-border text-info" role="status">
                                <span class="sr-only"></span>
                            </div>
                            Ops, deu um erro.
                        </div>
                    </div>
                </div>

                <script>
                    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
                    axios.defaults.withCredentials = true;

                    document.querySelectorAll('.resetar{{ $idcard }}').forEach((btn) => {
                        btn.addEventListener('click', function(e) {
                            {{-- alert('{{$idcard}}') --}}
                            var json = null;
                            // console.log(json);
                            axios.get('/sanctum/csrf-cookie').then(response => {
                                axios.post('{{ route('api.campanhas.stories.save', $produto) }}', json).then(
                                    resp => {
                                        // console.log(resp)
                                        if (resp.status === 200) {

                                            document.location.reload(true)
                                        }
                                    })
                            });
                        });
                    })

                    imagemproduto{{$idcard}}.on('mouse:up', function(options) {
                        // console.log('envia aqui');
                        var json = imagemproduto{{ $idcard }}.toJSON();
                        // console.log(json);
                        axios.get('/sanctum/csrf-cookie').then(response => {
                            axios.post('{{ route('api.campanhas.stories.save', $produto) }}', json).then(
                                resp => {
                                    // console.log(resp.status)
                                    if (resp.status === 200) {
                                        console.log('salvou!')
                                    }
                                })
                        });
                    });

                    document.getElementById("excluir{{ $idcard }}").addEventListener("click", excluir{{$idcard}});


                    if (document.getElementById("discartSelection{{ $idcard }}")) {
                        document.getElementById("discartSelection{{ $idcard }}").addEventListener("click", discart);
                    }

                    document.getElementById("parafrente{{$idcard}}").addEventListener("click", parafrente{{$idcard}});
                    function parafrente{{ $idcard }}() {
                        imagemproduto{{ $idcard }}.getActiveObjects().forEach((obj) => {
                            imagemproduto{{ $idcard }}.bringForward(obj)
                            imagemproduto{{ $idcard }}.discardActiveObject().renderAll();
                        });
                    }
                    document.getElementById("paratraz{{$idcard}}").addEventListener("click", paratraz{{$idcard}});
                    function paratraz{{ $idcard }}() {
                        imagemproduto{{ $idcard }}.getActiveObjects().forEach((obj) => {
                            imagemproduto{{ $idcard }}.sendBackwards(obj)
                            imagemproduto{{ $idcard }}.discardActiveObject().renderAll();
                        });
                    }
                    document.getElementById("emcima{{$idcard}}").addEventListener("click", emcima{{$idcard}});
                    function emcima{{ $idcard }}() {
                        imagemproduto{{ $idcard }}.getActiveObjects().forEach((obj) => {
                            imagemproduto{{ $idcard }}.bringToFront(obj)
                            imagemproduto{{ $idcard }}.discardActiveObject().renderAll();
                        });
                    }
                    document.getElementById("embaixo{{$idcard}}").addEventListener("click", embaixo{{$idcard}});
                    function embaixo{{ $idcard }}() {
                        imagemproduto{{ $idcard }}.getActiveObjects().forEach((obj) => {
                            imagemproduto{{ $idcard }}.sendToBack(obj)
                            imagemproduto{{ $idcard }}.discardActiveObject().renderAll();
                        });
                    }

                    function discart() {
                        imagemproduto{{ $idcard }}.discardActiveObject();
                        imagemproduto{{ $idcard }}.requestRenderAll();
                    }
                    function excluir{{ $idcard }}() {
                        imagemproduto{{ $idcard }}.getActiveObjects().forEach((obj) => {
                            imagemproduto{{ $idcard }}.remove(obj)
                        });
                        imagemproduto{{ $idcard }}.discardActiveObject().renderAll()
                        imagemproduto{{ $idcard }}.remove(imagemproduto{{ $idcard }}.getActiveObject());
                    }


                    imagemproduto{{$idcard}}.on('mouse:dblclick', function(options) {
                        var selecionado = imagemproduto{{ $idcard }}.getActiveObject()
                        if(selecionado.isType('image')) {
                            selecionado.clone(function (cloned) {
                                _clipboard = cloned;
                                Paste{{$idcard}}()
                            });
                        }
                    });

                    function Paste{{ $idcard }}() {
                        _clipboard.clone(function(clonedObj) {
                            imagemproduto{{ $idcard }}.discardActiveObject();
                            clonedObj.set({
                                left: clonedObj.left + 120,
                                top: clonedObj.top + 20,
                                evented: true,
                            });
                            if (clonedObj.type === 'activeSelection') {
                                // active selection needs a reference to the canvas.
                                clonedObj.canvas = canvas;
                                clonedObj.forEachObject(function(obj) {
                                    canvas.add(obj);
                                });
                                // this should solve the unselectability
                                clonedObj.setCoords();
                            } else {
                                imagemproduto{{ $idcard }}.add(clonedObj);
                            }
                            imagemproduto{{ $idcard }}.setActiveObject(clonedObj);
                            imagemproduto{{ $idcard }}.requestRenderAll();
                        });
                    }


                    var aguarde{{ $idcard }} = document.querySelector('#aguarde{{ $idcard }}');
                    var deuerro{{ $idcard }} = document.querySelector('#deuerro{{ $idcard }}');
                    aguarde{{ $idcard }}.style.display = "none";
                    deuerro{{ $idcard }}.style.display = "none";
                    var scale = 1;
                    document.querySelectorAll('.btncanva{{ $idcard }}').forEach((btn) => {
                        btn.addEventListener('click', function(e) {

                            aguarde{{ $idcard }}.style.display = "block";
                            var node = document.getElementById('canvas{{ $idcard }}');
                            console.log(node);
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
                                    window.saveAs(img.src, '{{ $produto->produto->cod_barras }}.png')
                                    console.log('baixou')
                                    aguarde{{ $idcard }}.style.display = "none";
                                })
                                .catch(function(error) {
                                    console.error('oops, deu erro!', error);
                                    aguarde{{ $idcard }}.style.display = "none";
                                    deuerro{{ $idcard }}.style.display = "block";
                                });
                        });
                    })
                </script>
            </div>
        @empty
        @endforelse
    </div>

</div>
<style>

    /*RNS PHISICS BOLD ITALIC*/
    /*RNS PHISICS ITALIC*/


    /* ok RNS PHISICS lIGTH*/



    .rnphysis-light {
        font-family: 'rnphysis-light';
    }

    @font-face {
        font-family: 'rnphysis-light';
        src: url('{{ url('cards/fonts/rnsphysis-light-webfont.woff') }}') format('woff2'),
        url('{{ url('cards/fonts/rnsphysis-light-webfont.woff2') }}') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    .rnphysis-lightitalic {
        font-family: 'RNSPhysis-LightItalic';
    }

    @font-face {
        font-family: 'RNSPhysis-LightItalic';
        src:url('{{ url('cards/fonts/RNSPhysis-LightItalic.woff') }}') format('woff'),
        url('{{ url('cards/fonts/RNSPhysis-LightItalic.woff2') }}') format('woff2');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    .rnphysis-bolditalic {
        font-family: 'RNSPhysis-BoldItalic';
    }

    @font-face {
        font-family: 'RNSPhysis-BoldItalic';
        src:url('{{ url('cards/fonts/RNSPhysis-BoldItalic.woff') }}') format('woff'),
        url('{{ url('cards/fonts/RNSPhysis-BoldItalic.woff2') }}') format('woff2');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    /*RNS PHISICS medium*/

    .rnphysis-medium {
        font-family: 'rnphysis-medium';
    }

    @font-face {
        font-family: 'rnphysis-medium';
        src: url('{{ url('cards/fonts/rnsphysis-medium-webfont.woff') }}') format('woff2'),
        url('{{ url('cards/fonts/rnsphysis-medium-webfont.woff2') }}') format('woff');
        font-weight: normal;
        font-style: normal;
    }


    .rnssanz-bold {
        font-family: 'rnssanz-bold';
    }

    @font-face {
        font-family: 'rnssanz-bold';
        src: url('{{ url('cards/fonts/rnssanz-bold-webfont.woff') }}') format('woff'),
        url('{{ url('cards/fonts/rnssanz-bold-webfont.woff2') }}') format('woff2');
        font-weight: normal;
        font-style: normal;
    }

    .bwglennsans-black {
        font-family: 'bwglennsans-black';
    }

    @font-face {
        font-family: 'bwglennsans-black';
        src: url('{{ url('cards/fonts/bwglennsans-black-webfont.woff') }}') format('woff'),
        url('{{ url('cards/fonts/bwglennsans-black-webfont.woff2') }}') format('woff2');
        font-weight: normal;
        font-style: normal;
    }



    .textoapp {
        color: @if ($midias_config->cor_app) {{ $midias_config->cor_app }} @else #000 @endif;
    }

    .textopromo {
        color: {{ $corpromo ?? '' }};
    }

    .card {
        width: 920px;
        height: 1660px;
        float: left;
        display: block;
        background: #e9f0f3;
        padding: 10px;
        margin: 20px 10px;

    }

    .canvas {
        width: 900px;
        height: 1600px;
        display: block;
        padding: 0;
        background-size: 900px;
    }

    .card-imagem {
        width: 800px;
        height: 700px;
        float: left;
        display: block;
        margin: 350px 0 0  50px;
    }

    .card-conteudo{
        width: 800px;
        height: 250px;
        float: left;
        margin: 50px 0 10px 50px;
    }
</style>
</body>

</html>
