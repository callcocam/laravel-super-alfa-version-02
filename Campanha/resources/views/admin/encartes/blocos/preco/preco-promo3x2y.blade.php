
    <div  style="width: 460px;height: 140px; padding-left:10px ; color: {{ $corpromo ?? '' }}">
        @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")
            {{--        INICIA PARCELAMENTO--}}

            <div class="bwglennsans-black" style=" width: 420px; float: left;">
                <div class="bwglennsans-black w-100" style="width: 50px;font-size: 30px; text-align: left;">
                    {{$produto->quantidade_parcelas}}X
                </div>
                <div class="d-flex justify-content-start w-100">
                    <div class=" bwglennsans-black" style="font-size: 85px; padding-top: 5px; height: 60px;   line-height: 60px; letter-spacing: -2px;">
                        {{ $preco_promo_reais }}
                    </div>
                    <div style=" font-size: 40px;  line-height: 30px; padding-top: 5px;">
                        ,{{ $preco_promo_centavos }}<br />
                        <div class="rnphysis-lightitalic"  style="text-transform: lowercase !important;  float: right; font-size: 15px;">
                            {{ $produto['tipo_embalagem'] }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="rnphysis-medium" style=" background: {{ $corpromo }}; color: #fff; width: 180px; float: left; border-radius: 4px;  padding: 5px; text-align: center;
                font-size: 16px; margin: 15px 0 10px;">
                No cartão de crédito
            </div>

            @if($produto->preco_promocional_total)
                <div class="d-flex justify-content-start  bwglennsans-black" style="width: 420px;height: 60px; float: left; ">
                    <div style=" font-size: 17px;padding-top: 5px;">R$</div>
                    <div style=" font-size: 60px; line-height: 60px;">
                        {{ $preco_total_reais }}
                    </div>
                    <div style=" font-size: 25px; line-height: 20px;padding-top: 5px;">
                        ,{{ $preco_total_centavos }}<br />
                        <div class="rnphysis-lightitalic"  style="text-transform: lowercase !important;  font-size: 13px;  text-align: right;">
                            {{ $produto['tipo_embalagem'] }}
                        </div>
                    </div>
                </div>
            @endif

        @else
            @if($tipo_campanha == 'lamina_ofertas_arrasadoras')
                <div class="produto-lamina-preco-ofertas_arrasadoras ms-2">
                    <div class="preco_normal bwglennsans-black text-white px-3">DE R$ {{$produto->preco_normal}}</div>
                    <span class="preco_normal_riscado"></span>
                </div>
            @endif
            <div class="d-flex justify-content-start" style=" width: 500px; height: 130px; float: left; margin-top: 10px;"> <div class="bwglennsans-black" style="  font-size: 190px; font-weight: bold; padding: 0; line-height: 140px;">
                    {{ $preco_promo_reais }}
                </div>
                <div class="bwglennsans-black" style=" font-size: 70px; font-weight: bold; line-height: 46px; padding: 0;">
                    ,{{ $preco_promo_centavos }}<br />
                    <div class="produto-lamina-preco-promo-embalagem rnphysis-lightitalic" style="font-size: 25px;text-align: right;text-transform: lowercase;">
                        {{ $produto['tipo_embalagem'] }}
                    </div>
                </div>
            </div>
        @endif
    </div>

