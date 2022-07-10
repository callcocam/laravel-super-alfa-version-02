<x-guest-layout>

    <h1 class="auth-title">{{ __('Acesso ao sistema') }}</h1>
    <p class="auth-subtitle mb-5">{{ __('Faça login com seus dados') }}</p>
    <x-jet-validation-errors class="mb-4 text-danger"/>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <x-input class=" form-control-xl" id="email" type="email" name="email" :value="old('email')"
                         placeholder="{{ __('Email') }}"/>
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <x-input class=" form-control-xl" id="password" type="password" name="password"
                         placeholder="{{ __('Senha') }}"/>
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <div class="form-check form-check-lg d-flex align-items-end">
            <x-checkbox id="remember_me" name="remember" id="flexCheckDefault"/>
            <x-label for="flexCheckDefault">
                {{ __('Lembre-se') }}
            </x-label>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">  {{ __('Conecte-se') }}</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        @if (Route::has('register'))
            <p class="text-gray-600">{{ __("Não tem uma conta?") }}
                <a href="{{ route('register') }}" class="font-bold">{{ __('Inscrever-se') }}</a>.</p>
        @endif
        @if (Route::has('password.request'))
            <p><a class="font-bold"
                  href="{{ route('password.request') }}"> {{ __('Esqueceu sua senha?') }}</a>.</p>
        @endif
    </div>
</x-guest-layout>
