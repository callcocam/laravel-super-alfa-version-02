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
    <div class="tiposcampanhas row p-3">
        <div class="d-flex">
            <div><a class="btn btn-primary me-3" href="?tipo=app"> Banner App</a>  </div>
            <div><a class="btn btn-primary me-3" href="?tipo=site"> Banner Site</a>  </div>
        </div>

    </div>
    @php
           $tipo_banner = request()->query('tipo', 'app');

    @endphp
    <div class="row">
        @forelse($model->produtos->where('status','published')->where('app','sim')->sortBy('order') as $produto)
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

                   $idcard = rand(0, 99999);
                    $urlimage = null;
                    if ($produto->produto->image) {
                               $urlimage = \Storage::url('') . $produto->produto->image->archive;
                    }

                   $preco_normal_reais = Str::before($produto->preco_normal, ',');
                   $preco_normal_centavos = Str::after($produto->preco_normal, ',');
                   $lencountnormal = strlen($preco_normal_reais);

                   $preco_app_reais = Str::before($produto->preco_app, ',');
                   $preco_app_centavos = Str::after($produto->preco_app, ',');
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



            @endphp

            <div class="card" style="">
                <div class="canvas" id="canvas{{ $idcard }}" style="
                @if($produto['preco_desconto'])
                    background-image: url('{{ url('banners') . '/bg-desconto.fw.png'}}');
                background-repeat: no-repeat;
                background-position: right center;
                @endif
">
                    <div class="card-content">
                        @if ($tipo_banner == 'site')
                            @include('campanha::admin.banners.site')
                        @elseif($tipo_banner == 'app')
                            @include('campanha::admin.banners.app')
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
                                axios.post('{{ route('api.campanhas.banners.save', $produto) }}', json).then(
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
                            axios.post('{{ route('api.campanhas.banners.save', $produto) }}', json).then(
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

    .card {
        @if ($tipo_banner == 'site')
         width: 1950px;
         height: 390px;
        @endif
        @if ($tipo_banner == 'app')
        width: 1044px;
         height: 360px;
         @endif
        float: left;
        display: block;
        background: #e9f0f3;
        padding: 10px;
        margin: 30px 10px 80px;

    }

    .canvas {
        @if ($tipo_banner == 'site')
        width: 1920px;
        height: 370px;
        @endif
        @if ($tipo_banner == 'app')
        width: 1024px;
        height: 340px;
        @endif
        display: block;
        padding: 0;
        background: #F6F6F6

}

</style>
</body>

</html>
