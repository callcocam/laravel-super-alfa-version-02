<script>
    var imagemproduto{{ $idcard }} = new fabric.Canvas("imagemproduto{{ $idcard }}");
    @if ($produto['storie_image_proprietes'])

    var json = {!! $produto['storie_image_proprietes'] !!};
    // console.log(json)
    imagemproduto{{ $idcard }}.loadFromJSON(json,
        imagemproduto{{ $idcard }}.renderAll.bind(imagemproduto{{ $idcard }}), function(o, object) {
            // fabric.log(o, object);
        });
    @else

    //  Pega imagens dos parceiros

    @if ($grupos = $produto->grupos_produtos()->limit(2)->get())
    @foreach ($grupos->sortBy('order') as $grupo)
    <?php $codbarras =  rand(0, 9999); ?>
    @if ($grupos->count() == 1)
    @if($grupo->produto->image)
    @if($produtoimagem = $grupo->produto->image->archive)
    fabric.Image.fromURL("https://web.superalfa.coop.br/storage/{{ $produtoimagem }}",
        function (img{{ $codbarras }}) {
            if(img{{ $codbarras }}.width > 400){
                img{{ $codbarras }}.scaleToWidth(400);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 400){
                img{{ $codbarras }}.scaleToHeight(400);
            }
            img{{ $codbarras }}.set({
                left: 350,
                top:400,
                originY: 'center',
                originX: 'center',
                borderColor: 'red',
            });
            imagemproduto{{ $idcard }}.add(img{{ $codbarras }});
        });
    @endif
    @endif
    @endif
    @if ($grupos->count() == 2)
    @if ($loop->first)
    @if($grupo->produto->image)
    @if($produtoimagem = $grupo->produto->image->archive)
    fabric.Image.fromURL("https://web.superalfa.coop.br/storage/{{ $produtoimagem }}",
        function (img{{ $codbarras }}) {
            if(img{{ $codbarras }}.width > 400){
                img{{ $codbarras }}.scaleToWidth(400);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 400){
                img{{ $codbarras }}.scaleToHeight(400);
            }
            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3
            img{{ $codbarras }}.set({
                left: 350-metadelarguraproduto,
                top:400,
                originY: 'center',
                originX: 'center',
                borderColor: 'blue',
            });
            imagemproduto{{ $idcard }}.add(img{{ $codbarras }});
        });
    @endif
    @endif
    @endif
    @if ($loop->last)
    @if($grupo->produto->image)
    @if($produtoimagem = $grupo->produto->image->archive)
    fabric.Image.fromURL("https://web.superalfa.coop.br/storage/{{ $produtoimagem }}",
        function (img{{ $codbarras }}) {
            if(img{{ $codbarras }}.getScaledWidth() > 400){
                img{{ $codbarras }}.scaleToWidth(400);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 400){
                img{{ $codbarras }}.scaleToHeight(400);
            }
            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3
            img{{ $codbarras }}.set({
                left: 350+metadelarguraproduto,
                top:400,
                originY: 'center',
                originX: 'center',
                borderColor: 'blue',
            });
            imagemproduto{{ $idcard }}.add(img{{ $codbarras }});
        });
    @endif
    @endif
    @endif
    @endif
    @endforeach
    @endif
    //  Pega imagens das familias

    @if ($grupos = $produto->grupos_produtos_familia()->limit(3)->get())
    @foreach ($grupos->sortBy('order')  as $grupo)
    <?php $codbarras =  rand(0, 9999); ?>
{{--    @if ($grupos->count() == 1)--}}
    @if($grupo->produto->image)
    @if($produtoimagem = $grupo->produto->image->archive)
    fabric.Image.fromURL("https://web.superalfa.coop.br/storage/{{ $produtoimagem }}",
        function (img{{ $codbarras }}) {
            if(img{{ $codbarras }}.getScaledWidth() > 400){
                img{{ $codbarras }}.scaleToWidth(400);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 400){
                img{{ $codbarras }}.scaleToHeight(400);
            }
            img{{ $codbarras }}.set({
                left: 350,
                top:400,
                originY: 'center',
                originX: 'center',
                borderColor: 'blue',
            });
            imagemproduto{{ $idcard }}.add(img{{ $codbarras }});
        });
    @endif
    @endif
{{--    @endif--}}

{{--    @if ($grupos->count() == 2)--}}
{{--    @if ($loop->first)--}}
{{--    @if($grupo->produto->image)--}}
{{--    @if($produtoimagem = $grupo->produto->image->archive)--}}
{{--    fabric.Image.fromURL("https://web.superalfa.coop.br/storage/{{ $produtoimagem }}",--}}
{{--        function (img{{ $codbarras }}) {--}}
{{--            if(img{{ $codbarras }}.getScaledWidth() > 400){--}}
{{--                img{{ $codbarras }}.scaleToWidth(400);--}}
{{--            }--}}
{{--            if(img{{ $codbarras }}.getScaledHeight() > 400){--}}
{{--                img{{ $codbarras }}.scaleToHeight(400);--}}
{{--            }--}}
{{--            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3--}}
{{--            img{{ $codbarras }}.set({--}}
{{--                left: 350-metadelarguraproduto,--}}
{{--                top:400,--}}
{{--                originY: 'center',--}}
{{--                originX: 'center',--}}
{{--                borderColor: 'blue',--}}
{{--            });--}}
{{--            imagemproduto{{ $idcard }}.add(img{{ $codbarras }});--}}
{{--        });--}}
{{--    @endif--}}
{{--    @endif--}}
{{--    @endif--}}
{{--    @if ($loop->last)--}}
{{--    @if($grupo->produto->image)--}}
{{--    @if($produtoimagem = $grupo->produto->image->archive)--}}
{{--    fabric.Image.fromURL("https://web.superalfa.coop.br/storage/{{ $produtoimagem }}",--}}
{{--        function (img{{ $codbarras }}) {--}}
{{--            if(img{{ $codbarras }}.width > 400){--}}
{{--                img{{ $codbarras }}.scaleToWidth(400);--}}
{{--            }--}}
{{--            if(img{{ $codbarras }}.getScaledHeight() > 400){--}}
{{--                img{{ $codbarras }}.scaleToHeight(400);--}}
{{--            }--}}
{{--            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3--}}
{{--            img{{ $codbarras }}.set({--}}
{{--                left: 350+metadelarguraproduto,--}}
{{--                top:400,--}}
{{--                originY: 'center',--}}
{{--                originX: 'center',--}}
{{--                borderColor: 'blue',--}}
{{--            });--}}
{{--            imagemproduto{{ $idcard }}.add(img{{ $codbarras }});--}}
{{--        });--}}
{{--    @endif--}}
{{--    @endif--}}
{{--    @endif--}}
{{--    @endif--}}
    @endforeach
    @endif


    @if(!count($produto->grupos_produtos_familia()->get())&& !count($produto->grupos_produtos()->get()))
    fabric.Image.fromURL("{{ $urlimage }}", function (img{{ $idcard }}) {

        if(img{{ $idcard }}.width > 400){
            img{{ $idcard }}.scaleToWidth(400);
        }
        if(img{{ $idcard }}.getScaledHeight() > 400){
            img{{ $idcard }}.scaleToHeight(400);
        }

        metadelarguraproduto = (parseInt(img{{ $idcard }}.getScaledWidth()))/3
        img{{ $idcard }}.set({
            left: 350-metadelarguraproduto,
            top:400,
            originY: 'center',
            originX: 'center',
            borderColor: 'blue',
        });
        imagemproduto{{ $idcard }}.add(img{{ $idcard }});
    });
    @endif
    fabric.Image.fromURL("{{ $urlimage }}", function (img{{ $idcard }}) {

        if(img{{ $idcard }}.width > 400){
            img{{ $idcard }}.scaleToWidth(400);
        }
        if(img{{ $idcard }}.getScaledHeight() > 400){
            img{{ $idcard }}.scaleToHeight(400);
        }        img{{ $idcard }}.set({
            left: 350,
            top:400,
            originY: 'center',
            originX: 'center',
            borderColor: 'red',
        });
        imagemproduto{{ $idcard }}.add(img{{ $idcard }});
    });
    @if($selomaisdeconto != null)
    fabric.Image.fromURL("{{$selomaisdeconto}}", function (selomaisdesconto{{ $idcard }}) {
        selomaisdesconto{{ $idcard }}.scaleToHeight(140);
        selomaisdesconto{{ $idcard }}.set({
            top: 10,
            left: 285,
            borderColor: 'red',
        });
        imagemproduto{{ $idcard }}.add(selomaisdesconto{{ $idcard }});
    });
    @endif
    @if($selo == 1)
    @forelse($produto->selos as $selo)
    fabric.Image.fromURL("{{ \Illuminate\Support\Facades\Storage::url($selo->cover) }}",
        function (selo{{ $idcard }}) {
            selo{{ $idcard }}.scaleToHeight(140);
            selo{{ $idcard }}.set({
                top: 10,
                left: 285,
            });
            imagemproduto{{ $idcard }}.add(selo{{ $idcard }});
        });
    @empty
    @endforelse
    @endif

    @if ($produto->fracionado == 1)
    @if ($precofracionado)
    fabric.Image.fromURL("{{$bgselo}}", function (selo{{ $idcard }}) {
        selo{{ $idcard }}.scaleToHeight(140);
        selo{{ $idcard }}.set({
            top: 10,
            left: 285,
        });
        imagemproduto{{ $idcard }}.add(selo{{ $idcard }});
    });
    const tituloselo = new fabric.IText('{{$precofracionado}}', {
        top: 40,
        left: 295,
        fontFamily: 'bwglennsans-black',
        fontSize: 25,
        fontWeight: 'bold',
        shadow: 'rgba(0,0,0,0.7) 1px 1px 2px',
        fill: '#fff',
        lineHeight: 0.9,

    })
    imagemproduto{{ $idcard }}.add(tituloselo)
    const subtituloselo = new fabric.IText('CADA 100g', {
        top: 90,
        left: 295,
        fontFamily: 'bwglennsans-black',
        fontSize: 25,
        fontWeight: 'bold',
        fill: '{{$corselo}}',
        lineHeight: 0.9,

    })
    imagemproduto{{ $idcard }}.add(subtituloselo)
    @endif
    @endif
    @endif


</script>
