<div style="width: 100%;">

    @if ($this->print)
        <div class="btn-campanha">
            <a class=" Inside" target="_blank" href="{{ route('admin.campanha.vertical', $model) }}?app=1">
                <img width="130" src="{{ url('cartazes/icones/a4app.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class=" Inside" target="_blank" href="{{ route('admin.campanha.horizontal', $model) }}?app=1">
                <img width="130" src="{{ url('cartazes/icones/a5app.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class="Inside" target="_blank" href="{{ route('admin.campanha.vertical', $model) }}?promocao=1">
                <img width="130" src="{{ url('cartazes/icones/a4promo.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class=" Inside" target="_blank"
                href="{{ route('admin.campanha.horizontal', $model) }}?promocao=1">
                <img width="130" src="{{ url('cartazes/icones/a5promo.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class=" Inside" target="_blank"
                href="{{ route('admin.campanha.vertical', $model) }}?app=1&fundobranco=1">
                <img width="130" src="{{ url('cartazes/icones/a4appsf.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class="Inside" target="_blank"
                href="{{ route('admin.campanha.horizontal', $model) }}?app=1&fundobranco=1">
                <img width="130" src="{{ url('cartazes/icones/a5appsf.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class="Inside" target="_blank"
                href="{{ route('admin.campanha.vertical', $model) }}?promocao=1&fundobranco=1">
                <img width="130" src="{{ url('cartazes/icones/a4promosf.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class="Inside" target="_blank"
                href="{{ route('admin.campanha.horizontal', $model) }}?promocao=1&fundobranco=1">
                <img width="130" src="{{ url('cartazes/icones/a5promosf.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class="Inside" target="_blank" href="{{ route('admin.campanha.regua', $model) }}?promocao=1">
                <img width="130" src="{{ url('cartazes/icones/reguapromo.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class=" Inside" target="_blank" href="{{ route('admin.campanha.regua', $model) }}?app=1">
                <img width="130" src="{{ url('cartazes/icones/reguaapp.png') }}">
            </a>
        </div>

        <div class="btn-campanha">
            <a class="Inside" target="_blank" href="{{ route('admin.campanha.cards', compact('model')) }}">
                <img width="130" src="{{ url('cartazes/icones/card.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class="Inside" target="_blank" href="{{ route('admin.campanha.stories', compact('model')) }}">
                <img width="130" src="{{ url('cartazes/icones/stories.png') }}">
            </a>
        </div>

        <div class="btn-campanha">
            <a class="Inside" target="_blank"
                href="{{ route('campanhas.laminas.produtos', compact('model')) }}">
                <img width="130" src="{{ url('cartazes/icones/lamina2.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class="Inside" target="_blank"
                href="{{ route('campanhas.encartes.produtos', compact('model')) }}">
                <img width="130" src="{{ url('cartazes/icones/encarte.png') }}">
            </a>
        </div>
        <div class="btn-campanha">
            <a class="Inside" target="_blank" href="{{ route('admin.campanha.banners', compact('model')) }}">
                                <img width="130" src="{{ url('cartazes/icones/banners.png') }}">
            </a>
        </div>
    @endif

    @if ($this->has_lojas)
        <div class="btn-campanha">
            <a href="javascript:void(0)" class="col-1 Inside" wire:click="exportar('xlsx')">
                <img width="130" src="{{ url('cartazes/icones/excel.png') }}">
            </a>
        </div>
    @endif
    <script src="{{ asset('js/autosize.min.js') }}"></script>
    <script type="text/javascript">
        autosize(document.querySelectorAll('textarea'));
        document.addEventListener('autosize', function(e) {
            autosize(document.querySelectorAll('textarea'));
        })
    </script>
    <style>
        .btn-campanha {
            width: 150px;
            padding: 0 10px;
            float: left;
            margin-bottom: 10px;
            display: block;
        }

    </style>
</div>
