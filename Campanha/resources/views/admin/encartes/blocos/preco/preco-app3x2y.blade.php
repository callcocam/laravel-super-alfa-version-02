<div class="produto-lamina-preco-app-tag pt-1 w-100 ps-1" style=" width: 200px; height: 45px;float: right;display: block;">
    <img src="{{url('laminas/tag-app.png')}}" style="      width: 170px;
            height: auto;">
</div>
<div class="rns_sanzblack" style="width: 100%; height: auto; display: flex;margin-top: 5px;">
    <div class="bwglennsans-black" style=" font-size: 110px;font-weight: bold;line-height: 80px; padding: 0;">
        {{$preco_app_reais}}
    </div>
    <div class="bwglennsans-black"  style="font-size: 45px; font-weight: bold; line-height: 30px; padding: 0;">
        ,{{$preco_app_centavos}}<br/>
        <div class="rnphysis-lightitalic" style="font-size: 15px;text-align: right; text-transform: lowercase;">
            {{$produto['tipo_embalagem']}}
        </div>
    </div>
</div>



