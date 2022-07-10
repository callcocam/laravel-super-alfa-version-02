
<script>
    var imagemproduto{{ $idcard }} = new fabric.Canvas("imagemproduto{{ $idcard }}");
    @if ($produto['lamina_images_propriates'])

    var json = {!! $produto['lamina_images_propriates'] !!};
    // console.log(json)
    imagemproduto{{ $idcard }}.loadFromJSON(json,
        imagemproduto{{ $idcard }}.renderAll.bind(imagemproduto{{ $idcard }}), function(o, object) {
            // fabric.log(o, object);
        });
    @else

    //  Pega imagens dos parceiros

    @if ($grupos = $produto->grupos_produtos()->limit(2)->get())
    @foreach ($grupos as $grupo)
    <?php $codbarras =  rand(0, 9999); ?>
    @if ($grupos->count() == 1)
    @if($grupo->produto->image)
    @if($produtoimagem = $grupo->produto->image->archive)
    fabric.Image.fromURL("https://web.superalfa.coop.br/storage/{{ $produtoimagem }}",
        function (img{{ $codbarras }}) {
            if(img{{ $codbarras }}.width > 200){
                img{{ $codbarras }}.scaleToWidth(200);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 250){
                img{{ $codbarras }}.scaleToHeight(250);
            }
            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3

            img{{ $codbarras }}.set({
                left: 233,
                top:158,
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
            if(img{{ $codbarras }}.width > 200){
                img{{ $codbarras }}.scaleToWidth(200);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 250){
                img{{ $codbarras }}.scaleToHeight(250);
            }
            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3

            img{{ $codbarras }}.set({
                left: 233-metadelarguraproduto,
                top:158,
                originY: 'center',
                originX: 'center',
                borderColor: 'red',
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
            if(img{{ $codbarras }}.width > 200){
                img{{ $codbarras }}.scaleToWidth(200);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 250){
                img{{ $codbarras }}.scaleToHeight(250);
            }
            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3

            img{{ $codbarras }}.set({
                left: 233+metadelarguraproduto,
                top:158,
                originY: 'center',
                originX: 'center',
                borderColor: 'red',
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
            if(img{{ $codbarras }}.width > 200){
                img{{ $codbarras }}.scaleToWidth(200);
            }
            if(img{{ $codbarras }}.getScaledHeight() > 250){
                img{{ $codbarras }}.scaleToHeight(250);
            }
            metadelarguraproduto = (parseInt(img{{ $codbarras }}.getScaledWidth()))/3

            img{{ $codbarras }}.set({
                left: 233+metadelarguraproduto,
                top:158,
                originY: 'center',
                originX: 'center',
                borderColor: 'red',
            });
            imagemproduto{{ $idcard }}.add(img{{ $codbarras }});
        });
    @endif
    @endif

    @endforeach
    @endif
    @if(!count($produto->grupos_produtos_familia()->limit(2)->get())&& !count($produto->grupos_produtos()->limit(2)->get()))
    fabric.Image.fromURL("{{ $urlimage }}", function (img{{ $idcard }}) {

        if(img{{ $idcard }}.width > 200){
            img{{ $idcard }}.scaleToWidth(200);
        }
        if(img{{ $idcard }}.getScaledHeight() > 250){
            img{{ $idcard }}.scaleToHeight(250);
        }
        metadelarguraproduto = (parseInt(img{{ $idcard }}.getScaledWidth()))/3

        img{{ $idcard }}.set({
            left: 233-metadelarguraproduto,
            top:158,
            originY: 'center',
            originX: 'center',
            borderColor: 'red',
        });
        imagemproduto{{ $idcard }}.add(img{{ $idcard }});
    });
    @endif
    fabric.Image.fromURL("{{ $urlimage }}", function (img{{ $idcard }}) {
        if(img{{ $idcard }}.width > 200){
            img{{ $idcard }}.scaleToWidth(200);
        }
        if(img{{ $idcard }}.getScaledHeight() > 250){
            img{{ $idcard }}.scaleToHeight(250);
        }
        img{{ $idcard }}.set({
            left: 233,
            top:158,
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





    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.defaults.withCredentials = true;

    document.querySelectorAll('.resetar{{ $idcard }}').forEach((btn) => {
        btn.addEventListener('click', function(e) {
            {{-- alert('{{$idcard}}') --}}
            var json = null;
            // console.log(json);
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('{{ route('api.campanhas.lamina.save', $produto) }}', json).then(
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
            axios.post('{{ route('api.campanhas.lamina.save', $produto) }}', json).then(
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
</script>
