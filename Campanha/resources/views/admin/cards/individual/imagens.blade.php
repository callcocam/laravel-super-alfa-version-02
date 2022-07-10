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


        fabric.Image.fromURL("{{ $urlimage }}", function (img{{ $idcard }}) {

            if(img{{ $idcard }}.width > 300){
                img{{ $idcard }}.scaleToWidth(300);
            }
            if(img{{ $idcard }}.getScaledHeight() > 350){
                img{{ $idcard }}.scaleToHeight(350);
            }        img{{ $idcard }}.set({
                left: 275,
                top:275,
                originY: 'center',
                originX: 'center',
                borderColor: 'red',
            });
            imagemproduto{{ $idcard }}.add(img{{ $idcard }});
        });

    //  Pega imagens dos parceiros

    @if ($grupos = $produto->parceiros()->limit(2)->get())
    @foreach ($grupos->sortBy('order') as $grupo)
    <?php $codbarras =  rand(0, 9999); ?>
    @if ($grupos->count() == 1)
    @if($grupo->produto->image)
    @if($produtoimagem = $grupo->produto->image->archive)
    fabric.Image.fromURL("https://web.superalfa.coop.br/storage/{{ $produtoimagem }}",
        function (img{{ $codbarras }}) {
            if(img{{ $codbarras }}.width > 350){
                img{{ $codbarras }}.scaleToWidth(350);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 350){
                img{{ $codbarras }}.scaleToHeight(350);
            }
            img{{ $codbarras }}.set({
                left: 275,
                top:275,
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
            if(img{{ $codbarras }}.width > 300){
                img{{ $codbarras }}.scaleToWidth(300);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 300){
                img{{ $codbarras }}.scaleToHeight(300);
            }
            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3
            img{{ $codbarras }}.set({
                left: 275-metadelarguraproduto,
                top:275,
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
            if(img{{ $codbarras }}.getScaledWidth() > 300){
                img{{ $codbarras }}.scaleToWidth(300);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 300){
                img{{ $codbarras }}.scaleToHeight(300);
            }
            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3
            img{{ $codbarras }}.set({
                left: 275+metadelarguraproduto,
                top:275,
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

    @if ($grupos = $produto->familia()->limit(3)->get())
    @foreach ($grupos->sortBy('order') as $grupo)
    <?php $codbarras =  rand(0, 9999); ?>
    @if ($grupos->count() == 1)
    @if($grupo->produto->image)
    @if($produtoimagem = $grupo->produto->image->archive)
    fabric.Image.fromURL("https://web.superalfa.coop.br/storage/{{ $produtoimagem }}",
        function (img{{ $codbarras }}) {
            if(img{{ $codbarras }}.getScaledWidth() > 300){
                img{{ $codbarras }}.scaleToWidth(300);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 350){
                img{{ $codbarras }}.scaleToHeight(350);
            }
            img{{ $codbarras }}.set({
                left: 275,
                top:275,
                originY: 'center',
                originX: 'center',
                borderColor: 'blue',
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
            if(img{{ $codbarras }}.getScaledWidth() > 300){
                img{{ $codbarras }}.scaleToWidth(300);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 350){
                img{{ $codbarras }}.scaleToHeight(350);
            }
            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3
            img{{ $codbarras }}.set({
                left: 275-metadelarguraproduto,
                top:275,
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
            if(img{{ $codbarras }}.width > 300){
                img{{ $codbarras }}.scaleToWidth(300);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 350){
                img{{ $codbarras }}.scaleToHeight(350);
            }
            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3
            img{{ $codbarras }}.set({
                left: 275+metadelarguraproduto,
                top:275,
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


    @if(!count($produto->familia()->get())&& !count($produto->parceiros()->get()))
    fabric.Image.fromURL("{{ $urlimage }}", function (img{{ $idcard }}) {

        if(img{{ $idcard }}.width > 300){
            img{{ $idcard }}.scaleToWidth(300);
        }
        if(img{{ $idcard }}.getScaledHeight() > 350){
            img{{ $idcard }}.scaleToHeight(350);
        }

        metadelarguraproduto = (parseInt(img{{ $idcard }}.getScaledWidth()))/3
        img{{ $idcard }}.set({
            left: 275-metadelarguraproduto,
            top:275,
            originY: 'center',
            originX: 'center',
            borderColor: 'blue',
        });
        imagemproduto{{ $idcard }}.add(img{{ $idcard }});
    });
    @endif

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

        {{--fabric.Image.fromURL("{{ \Illuminate\Support\Facades\Storage::url($produto->selolink->cover) }}",--}}
        {{--    function (selo{{ $idcard }}) {--}}
        {{--        selo{{ $idcard }}.scaleToHeight(140);--}}
        {{--        selo{{ $idcard }}.set({--}}
        {{--            top: 10,--}}
        {{--            left: 285,--}}
        {{--        });--}}
        {{--        imagemproduto{{ $idcard }}.add(selo{{ $idcard }});--}}
        {{--    });--}}

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

</script>
