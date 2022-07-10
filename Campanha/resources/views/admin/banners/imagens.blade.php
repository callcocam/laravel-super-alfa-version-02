<script>
    var imagemproduto{{ $idcard }} = new fabric.Canvas("imagemproduto{{ $idcard }}");
    @if ($produto['banners_image_proprietes'])

    var json = {!! $produto['banners_image_proprietes'] !!};
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
            if(img{{ $codbarras }}.width > 200){
                img{{ $codbarras }}.scaleToWidth(200);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 200){
                img{{ $codbarras }}.scaleToHeight(200);
            }
            img{{ $codbarras }}.set({
                left: 30,
                top:40,
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
                left: 30-metadelarguraproduto,
                top:30,
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
                left: 30+metadelarguraproduto,
                top:30,
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
                left: 30,
                top:30,
                originY: 'center',
                originX: 'center',
                borderColor: 'blue',
            });
            imagemproduto{{ $idcard }}.add(img{{ $codbarras }});
        });
    @endif
    @endif

    @endforeach
    @endif

    @if(!count($produto->grupos_produtos_familia()->get())&& !count($produto->grupos_produtos()->get()))
    fabric.Image.fromURL("{{ $urlimage }}", function (img{{ $idcard }}) {

        if(img{{ $idcard }}.width > 200){
            img{{ $idcard }}.scaleToWidth(200);
        }
        if(img{{ $idcard }}.getScaledHeight() > 200){
            img{{ $idcard }}.scaleToHeight(200);
        }

        metadelarguraproduto = (parseInt(img{{ $idcard }}.getScaledWidth()))/3
        img{{ $idcard }}.set({
            left: 30,
            top:30,
            originY: 'center',
            originX: 'center',
            borderColor: 'blue',
        });
        imagemproduto{{ $idcard }}.add(img{{ $idcard }});
    });
    @endif
    fabric.Image.fromURL("{{ $urlimage }}", function (img{{ $idcard }}) {

        if(img{{ $idcard }}.width > 200){
            img{{ $idcard }}.scaleToWidth(200);
        }
        if(img{{ $idcard }}.getScaledHeight() > 200){
            img{{ $idcard }}.scaleToHeight(200);
        }        img{{ $idcard }}.set({
            left: 30,
            top:30,
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
            left: 25,
            borderColor: 'red',
        });
        imagemproduto{{ $idcard }}.add(selomaisdesconto{{ $idcard }});
    });
    @endif
    @if($selo == 1)
    @forelse($produto->selos as $selo)
    fabric.Image.fromURL("{{ \Illuminate\Support\Facades\Storage::url($selo->cover) }}",
        function (selo{{ $idcard }}) {
            selo{{ $idcard }}.scaleToHeight(100);
            selo{{ $idcard }}.set({
                top: 10,
                left: 25,
            });
            imagemproduto{{ $idcard }}.add(selo{{ $idcard }});
        });
    @empty
    @endforelse
    @endif


    @endif


</script>
