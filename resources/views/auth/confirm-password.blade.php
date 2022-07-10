<x-guest-layout>
    <div id="auth" class="container-fluid">
        <div class="row h-100 justify-content-center mt-10 m-3">
            <div class="col-lg-6 col-12">
                <div id="auth">
                    <h1 class="auth-title">{{ __('Confirme') }}.</h1>
                    <p class="auth-subtitle mb-5">{{ __('Esta é uma área segura do aplicativo. Por favor, confirme sua senha antes de continuar.') }}</p>
                    <x-jet-validation-errors class="mb-4"/>
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <x-input class=" form-control-xl" id="password" type="password" name="password"
                                         placeholder="{{ __('Senha') }}"/>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">  {{ __('Confirme') }}</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-guest-layout>
