<div class="banner-content d-flex w-100 h-100 justify-content-around" style="max-width: 1700px; margin-left: 110px">
    <div style="padding: 15px;">
        <img style="max-height: 340px" src="{{ url('banners/appclube.fw.png')}}">
    </div>
    <div class="card-imagem d-flex justify-content-center ">
        <canvas  id="imagemproduto{{$idcard}}" width="500px" height="350px"></canvas>
    </div>
    <div style="padding: 15px; width: 400px;display: flex;  flex-direction: column; justify-content: center">
        <div style="font-size: 25px;text-transform: capitalize; font-weight: bold; line-height: 25px" id="discartSelection{{$idcard}}" >
            {{$produto['descricao_comercial']}}
        </div>
         <div class="card-app-preco-normal rnssanz-bold py-2 mt-3">
            <span style="background: #69C10C; padding: 3px 10px; border-radius: 5px; color: #fff; font-size: 30px"> De: R$ {{$preco_normal_reais}},{{$preco_normal_centavos}}</span>
         </div>
         <div class="textoapp d-flex mt-3">
           <div class="bwglennsans-black " style="font-size: 150px; line-height: 110px;  margin-left: -5px; letter-spacing: -5px;">
              {{$preco_app_reais}}
           </div>
           <div class="bwglennsans-black "style="font-size: 80px; line-height: 60px; letter-spacing: 0;text-align: right;padding-left: 10px;">
              ,{{$preco_app_centavos}}<br/>
              <div class="rnphysis-lightitalic" style="font-size: 16px; line-height: 20px">
              {{$produto['tipo_embalagem']}}
            </div>
           </div>
         </div>
    </div>
</div>
@include('campanha::admin.banners.imagens')

