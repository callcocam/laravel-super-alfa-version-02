<div class="produto-lamina">
    <div class="produto-lamina-boximagem">
{{--        <div  wire:ignore>--}}
            <canvas  id="imagemproduto{{$produtoteste['id']}}" width="265px" height="180px"></canvas>
{{--        </div>--}}

    </div>
    <div class="produto-lamina-boxdescricao">
        <div class="produto-lamina-descricao rnphysis-light @if($produtoteste['app'] == 'não') textopromo @endif @if($produtoteste['app'] == 'sim') textoapp @endif">
            {{$produtoteste['descricao_comercial']}} {{$top}}
        </div>
        @if($produtoteste['app'] == 'sim')
            <div class="produto-lamina-preco-normal-app rns_sanzblack textoverde">
                <div class="produto-lamina-preco-normal-app-moeda">
                    R$
                </div>
                <div class="produto-lamina-preco-normal-app-reais">
                    {{$produtoteste['preco_real']}}
                </div>
                <div class="produto-lamina-preco-normal-app-centavos">
                    ,{{$produtoteste['preco_centavos']}}<br/>
                    <div class="produto-lamina-preco-normal-app-embalagem">
                        {{$produtoteste['tipo_embalagem']}}
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="produto-lamina-boxpreco">
        @if($produtoteste['app'] == 'não')
            <div class="produto-lamina-preco-normal rns_sanzblack textoazul">
                <div class="produto-lamina-preco-normal-reais">
                    {{$produtoteste['preco_real']}}
                </div>
                <div class="produto-lamina-preco-normal-centavos">
                    ,{{$produtoteste['preco_centavos']}}<br/>
                    <div class="produto-lamina-preco-normal-embalagem">
                        {{$produtoteste['tipo_embalagem']}}
                    </div>
                </div>
            </div>
        @endif
        @if($produtoteste['app'] == 'sim')
            <img width="90" src="http://localhost:8000/laminas/tag-app.fw.png">
            <div class="produto-lamina-preco-app rns_sanzblack textoverde">
                <div class="produto-lamina-preco-app-reais">
                    {{$produtoteste['preco_reais_app']}}
                </div>
                <div class="produto-lamina-preco-app-centavos">
                    ,{{$produtoteste['preco_centavos_app']}}<br/>
                    <div class="produto-lamina-preco-app-embalagem">
                        {{$produtoteste['tipo_embalagem']}}
                    </div>
                </div>
            </div>
        @endif
    </div>
    <script>
        var canvas{{$produtoteste['id']}} = new fabric.Canvas("imagemproduto{{$produtoteste['id']}}");
        fabric.Image.fromURL("{{$produtoteste['imagem']}}", function (img{{$produtoteste['id']}}) {
            img{{$produtoteste['id']}}.set({
                left: 37,
            });
            img{{$produtoteste['id']}}.scaleToHeight(canvas{{$produtoteste['id']}}.height);
            canvas{{$produtoteste['id']}}.add(img{{$produtoteste['id']}});
        });
        {{--fabric.Image.fromURL("{{$produtoteste['imagem2']}}", function (img2{{$produtoteste['id']}}) {--}}
        {{--    img2{{$produtoteste['id']}}.set({--}}
        {{--        left: 37,--}}
        {{--        top: 10,--}}
        {{--        angle: -20,--}}
        {{--    });--}}
        {{--    img2{{$produtoteste['id']}}.scaleToHeight(canvas{{$produtoteste['id']}}.height);--}}
        {{--    canvas{{$produtoteste['id']}}.add(img2{{$produtoteste['id']}});--}}
        {{--});--}}
        // function objectAddedListener(ev) {
        //     let target = ev.target;
        //     window.s('top', target.top)
        //     console.log('left', target.left, 'top', target.top, 'width', target.width, 'height', target.height);
        // }

        // function objectMovedListener(ev) {
        //     let target = ev.target;
        //     console.log('left', target.left, 'top', target.top, 'width', target.width * target.scaleX, 'height', target.height * target.scaleY);
        // }

        {{--canvas{{$produtoteste['id']}}.on('object:added', objectAddedListener);--}}
        {{--canvas{{$produtoteste['id']}}.on('object:modified', objectMovedListener);--}}
    </script>
<style>
    .produto-lamina{
        width: 265px;
        height: 265px;
        float: left;
        margin: 5px;
    }
    .produto-lamina-boximagem{
        width: 100%;
        height: 180px;
    }

    .produto-lamina-boxdescricao{
        width: 131px;
        height: 70px;
        float: left;
    }
    .produto-lamina-descricao{
        text-align: right;
        font-weight: bold;
        font-style: italic;
        font-size: 12px;
        padding: 5px;
        line-height: 16px;
    }
    /*Preço normal App*/
    .produto-lamina-preco-normal-app{
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
    }
    .produto-lamina-preco-normal-app-reais{
        font-size: 50px;
        font-weight: bold;
        line-height: 30px;
        padding: 0;
    }
    .produto-lamina-preco-normal-app-centavos{
        font-size: 25px;
        font-weight: bold;
        line-height: 15px;
        padding: 0;
    }
    .produto-lamina-preco-normal-app-embalagem{
        font-size: 10px;
        text-align: right;
    }
    /*Preço app*/

    .produto-lamina-preco-app{
        width: 100%;
        height: auto;
        display: flex;
        margin-top: 5px;

    }
    .produto-lamina-preco-app-reais{
        font-size: 70px;
        font-weight: bold;
        line-height: 46px;
        padding: 0;
    }
    .produto-lamina-preco-app-centavos{
        font-size: 35px;
        font-weight: bold;
        line-height: 23px;
        padding: 0;
    }
    .produto-lamina-preco-app-embalagem{
        font-size: 10px;
        text-align: right;
    }

    /*Preço Normal*/

    .produto-lamina-preco-normal{
        width: 100%;
        height: auto;
        display: flex;
        margin-top: 5px;
    }
    .produto-lamina-preco-normal-reais{
        font-size: 70px;
        font-weight: bold;
        line-height: 46px;
        padding: 0;
        letter-spacing: -5px;
    }
    .produto-lamina-preco-normal-centavos{
        font-size: 35px;
        font-weight: bold;
        line-height: 23px;
        padding: 0 0 0 6px;
    }
    .produto-lamina-preco-normal-embalagem{
        font-size: 10px;
        text-align: right;
    }
    .produto-lamina-boxpreco{
        width: 131px;
        height: 70px;
        float: left;
    }
</style>
</div>
