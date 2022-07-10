<div x-data="{
    type:'',
    submit(action){
        this.$refs.form.action = action
        this.$refs.form.submit()
    }
}">

    <form x-ref="form" class="card p-3" action="{{ route('admin.cartaz.imprimir') }}" target="_blank"
        method="POST">
        @csrf
        <div class="card-header">
            <h5 class="card-title">{{ __('GERAR CARTAZ INDIVIDUAL') }}</h5>
        </div>

        @if ($groups = data_get($form_data, 'grupos.modal-cartaz-01'))
            @foreach ($groups as $group)
                <input type="hidden" name="groups-modal-cartaz-01[{{ $group }}]" value="{{ $group }}">
            @endforeach
        @endif
        @if ($groups = data_get($form_data, 'grupos.modal-cartaz-02'))
            @foreach ($groups as $group)
                <input type="hidden" name="groups-modal-cartaz-02[{{ $group }}]" value="{{ $group }}">
            @endforeach
        @endif
        @if ($groups = data_get($form_data, 'grupos.modal-cartaz-03'))
            @foreach ($groups as $group)
                <input type="hidden" name="groups-modal-cartaz-03[{{ $group }}]" value="{{ $group }}">
            @endforeach
        @endif
        @if ($groups = data_get($form_data, 'grupos.modal-cartaz-04'))
            @foreach ($groups as $group)
                <input type="hidden" name="groups-modal-cartaz-04[{{ $group }}]" value="{{ $group }}">
            @endforeach
        @endif
        @if ($groups = data_get($form_data, 'grupos.modal-cartaz-05'))
            @foreach ($groups as $group)
                <input type="hidden" name="groups-modal-cartaz-05[{{ $group }}]" value="{{ $group }}">
            @endforeach
        @endif
        <x-loader />
        <div class="table-responsive">
            <table class="table table-bordered table-sm" style="font-size: 12px; min-width: 1300px">
                <thead>
                    <tr class="p-0">
                        <th style="width: 100px;" class="align-middle p-0 text-center" cope="col">Click em + para
                            selecionar o Produto
                        </th>
                        <th class="align-middle" scope="col">Cód. barras</th>
                        <th style="width: 150px;" class="align-middle" scope="col">
                            Desc. Encarte/Cartaz
                        </th>
                        <th style="width: 150px;" class="align-middle p-0 text-center" scope="col">
                            Obs.
                        </th>
                        <th class="align-middle p-0 text-center" scope="col">Qtd por caixa</th>
                        <th class="align-middle p-0 text-center" scope="col">Parcelas (Mínimo 1)</th>
                        <th class="align-middle p-0 text-center" scope="col">Formato de Venda</th>
                        <th class="align-middle p-0 text-center" scope="col">Preço Normal</th>
                        <th class="align-middle p-0 text-center" scope="col">Preço Promo.</th>
                        <th class="align-middle p-0 text-center" scope="col">É App?</th>
                        <th class="align-middle p-0 text-center" scope="col">Preço App</th>
                        <th class="align-middle p-0 text-center" scope="col">Parceiros</th>
{{--                        <th class="align-middle p-0 text-center" scope="col">Validar</th>--}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @livewire("admin.cartaz.item-component",['modal'=>'modal-cartaz-01'],key('1-cartaz-item'))
{{--                    @if(\Arr::has($generate, 'modal-cartaz-01'))--}}
                       @livewire("admin.cartaz.item-component",['modal'=>'modal-cartaz-02'],key('2-cartaz-item'))
{{--                    @endif--}}
{{--                    @if(\Arr::has($generate, 'modal-cartaz-01')&& \Arr::has($generate, 'modal-cartaz-02'))--}}
                      @livewire("admin.cartaz.item-component",['modal'=>'modal-cartaz-03'],key('3-cartaz-item'))
{{--                    @endif--}}
{{--                    @if(\Arr::has($generate, 'modal-cartaz-01')&& \Arr::has($generate, 'modal-cartaz-02')&& \Arr::get($exibirapp, 'modal-cartaz-03'))--}}
                    @livewire("admin.cartaz.item-component",['modal'=>'modal-cartaz-04'],key('4-cartaz-item'))
{{--                    @endif--}}
{{--                    @if(\Arr::has($generate, 'modal-cartaz-01')&& \Arr::has($generate, 'modal-cartaz-02')&& \Arr::has($generate, 'modal-cartaz-03') && \Arr::has($generate, 'modal-cartaz-04'))--}}
                    @livewire("admin.cartaz.item-component",['modal'=>'modal-cartaz-05'],key('5-cartaz-item'))

{{--                    @endif--}}
{{--                    @dd($exibirapp)--}}
                    <tr>
                        <td colspan="13">
                            <div class="row pb-5">
                                <div class="col">
                                    <button class="btn btn-primary" wire:click="saveAndGoBack" type="button"
                                        wire:loading.attr="disabled">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">{{ __('Validar Dados') }}</span>
                                    </button>

                                </div>
                            </div>
                            @if ($generate)
{{--                                @dd($generate)--}}
                                <div class="row pb-5">
                                    <div class="col-md-12 mb-2 px-4">
                                        <h4>Gerar Cartaz</h4>
                                    </div>
                                    <div class="col-md-12 px-4">


                                 {{--CARTAZ PROMOÇÃO--}}


                                    @if(\Arr::has($generate, 'modal-cartaz-01') && !\Arr::get($exibirapp, 'modal-cartaz-01.app'))
                                        <a @click.prevent="submit('{{ route('admin.cartaz.imprimir') }}?promocao=1&vertical=1&fundobranco=1')"
                                           class="" target="_blank" href="javascript;">
                                            <img width="150" src="{{ url('cartazes/7.png') }}">
                                        </a>

                                    @endif

                                        @if(\Arr::has($generate, 'modal-cartaz-01') && \Arr::has($generate, 'modal-cartaz-02') && !\Arr::get($exibirapp, 'modal-cartaz-01.app'))
{{--                                            @dd($exibirapp)--}}
                                            <a @click.prevent="submit('{{ route('admin.cartaz.imprimir') }}?promocao=1&horizontal=1&fundobranco=1')"
                                               class="" target="_blank" href="javascript;">
                                                <img width="150" src="{{ url('cartazes/8.png') }}">
                                            </a>

                                        @endif


                                        {{--CARTAZ APP--}}

                                            @if(\Arr::get($exibirapp, 'modal-cartaz-01.app'))
                                                <a @click.prevent="submit('{{ route('admin.cartaz.imprimir') }}?app=1&vertical=1&fundobranco=1')"
                                                   class="" target="_blank" href="javascript;">
                                                    <img width="150" src="{{ url('cartazes/5.png') }}">
                                                </a>

                                            @endif


                                            @if(\Arr::get($exibirapp, 'modal-cartaz-01.app')&& \Arr::get($exibirapp, 'modal-cartaz-02.app'))
                                                <a @click.prevent="submit('{{ route('admin.cartaz.imprimir') }}?app=1&horizontal=1&fundobranco=1')"
                                                   class="" target="_blank" href="javascript;">
                                                    <img width="150" src="{{ url('cartazes/6.png') }}">
                                                </a>
                                            @endif
                                            @if (\Arr::has($generate, 'modal-cartaz-01')&&\Arr::has($generate, 'modal-cartaz-02')&& \Arr::has($generate, 'modal-cartaz-03')&&\Arr::has($generate, 'modal-cartaz-04')&&
                                              (!\Arr::get($exibirapp, 'modal-cartaz-01.app')) &&
                                                 (!\Arr::get($exibirapp, 'modal-cartaz-02.app')) &&
                                                 (!\Arr::get($exibirapp, 'modal-cartaz-03.app')) &&
                                                 (!\Arr::get($exibirapp, 'modal-cartaz-04.app'))
                                             )

                                                <a @click.prevent="submit('{{ route('admin.campanhas.reguapromoindividual') }}?promocao=1')" class="btn btn-warning btn-sm" target="_blank">
                                                    Régua Promo
                                                </a>

                                            @endif
                                            @if (
                                                 (\Arr::get($exibirapp, 'modal-cartaz-01.app') == true) &&
                                                 (\Arr::get($exibirapp, 'modal-cartaz-02.app') == true) &&
                                                 (\Arr::get($exibirapp, 'modal-cartaz-03.app') == true) &&
                                                 (\Arr::get($exibirapp, 'modal-cartaz-04.app') == true) &&
                                                 (\Arr::get($exibirapp, 'modal-cartaz-05.app') == true)
                                             )
                                                <a @click.prevent="submit('{{ route('admin.campanhas.reguaappindividual') }}?app=1')" class="btn btn-success btn-sm" target="_blank">
                                                Régua APP
                                                </a>
                                            @endif

                                </div>
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </form>
{{--@dd($exibirapp)--}}
</div>
