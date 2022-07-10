<x-guest-layout>
    <h1 class="auth-title">{{ __('Esqueceu a senha') }}.</h1>
    <p class="auth-subtitle mb-5">{{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e nós enviaremos um link de redefinição de senha que permitirá que você escolha uma nova.') }}</p>
    <x-jet-validation-errors class="mb-4"/>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <x-input class=" form-control-xl" id="email" type="email" name="email" :value="old('email')"
                         placeholder="{{ __('Email') }}"/>
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>
        <button  class="btn btn-primary btn-block btn-lg shadow-lg mt-5">  {{ __('Link de redefinição de senha de e-mail') }}</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        @if (Route::has('login'))
            <p class="text-gray-600">{{ __("já tem uma conta?") }}
                <a href="{{ route('login') }}" class="font-bold">{{ __('Conecte-se') }}</a>.</p>
        @endif
    </div>
</x-guest-layout>
