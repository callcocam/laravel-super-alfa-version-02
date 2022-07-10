
<div style=" width: 100%; height: 140px; float: right; padding-left:10px ;  color: {{ $corpromo ?? '' }}; ">
    @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")
        {{--        INICIA PARCELAMENTO--}}

        <div class="bwglennsans-black">
            <div class="bwglennsans-black w-100" style="  width: 50px; float: left; height: 20px;  font-size: 20px; text-align: left;  margin-top: -20px;  margin-left: 5px; padding: 0;">
                {{$produto->quantidade_parcelas}}X
            </div>
            <div class="d-flex justify-content-start w-100">
                <div class=" bwglennsans-black" style=" font-size: 75px; padding-top: 5px; height: 60px;line-height: 60px;letter-spacing: -2px;">
                    {{ $preco_promo_reais }}
                </div>
                <div style="font-size: 35px; line-height: 30px; padding-top: 10px;">
                    ,{{ $preco_promo_centavos }}<br />
                    <div class="rnphysis-lightitalic"  style="text-transform: lowercase !important;float: right; font-size: 15px;">
                        {{ $produto['tipo_embalagem'] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="rnphysis-medium" style=" background: {{ $corpromo }};   color: #fff;  width: 130px;  float: left; border-radius: 4px; padding: 1px 5px;
            text-align: center;font-size: 12px; margin: 3px 0;">
            No cartão de crédito
        </div>

        @if($produto->preco_promocional_total)
            <div class="d-flex justify-content-start  bwglennsans-black" style="width: 200px;height: 40px; float: left;">
                <div style="font-size: 12px; padding-top: 5px;">R$</div>
                <div style=" font-size: 40px;line-height: 40px;">
                    {{ $preco_total_reais }}
                </div>
                <div style="font-size: 18px; line-height: 16px; padding-top: 5px;">
                    ,{{ $preco_total_centavos }}<br />
                    <div class=" rnphysis-lightitalic"  style="text-transform: lowercase !important; font-size: 10px;text-align: right;">
                        {{ $produto['tipo_embalagem'] }}
                    </div>
                </div>
            </div>
        @endif

    @else
        <div class="d-flex flex-column">
            @if($tipo_campanha == 'lamina_ofertas_arrasadoras')
                <div class="produto-lamina-preco-ofertas_arrasadoras ms-2" style="width: 190px">
                    <div class="preco_normal bwglennsans-black text-white px-3">DE R$ {{$produto->preco_normal}}</div>
                    <span class="preco_normal_riscado"></span>
                </div>
            @endif
            <div class="produto-lamina-preco-promo d-flex pt-2 @if($tipo_campanha == 'lamina_ofertas_arrasadoras') justify-content-start ps-2 @else justify-content-center @endif
                ">
                <div class=" bwglennsans-black" style="@if(strlen($produto->preco_normal) >6)font-size: 60px; line-height: 45px; @else font-size: 85px; line-height: 60px; @endif padding-top: 5px; height: 60px;    letter-spacing: -2px;">
                    {{ $preco_promo_reais }}
                </div>
                <div class=" bwglennsans-black"  style=" font-size: 40px;  line-height: 30px; padding-top: 5px;">
                    ,{{ $preco_promo_centavos }}<br />
                    <div class="rnphysis-lightitalic" style="text-transform: lowercase !important;  float: right; font-size: 17px;">
                        {{ $produto['tipo_embalagem'] }}
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>


