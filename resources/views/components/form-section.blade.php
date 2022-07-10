<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="card-subtitle">{{ $description }}</p>
                </div>
                <div class="card-content">
                    <form {{ $attributes->merge(['class' => 'form form-vertical']) }}>
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    {{ $form }}

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            @isset($actions)
                               <div class="row">
                                   <div class="col-12 d-inline-block text-center">
                                       {{ $actions }}
                                   </div>
                               </div>
                            @endisset
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
