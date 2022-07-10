<x-guest-layout>
    <h1 class="auth-title">{{ __('Redefinir senha') }}.</h1>
    <p class="auth-subtitle mb-5">{{ __('Insira sua nova senha para redefinir seu acesso em nosso site.') }}</p>
    <x-jet-validation-errors class="mb-4"/>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="form-group position-relative has-icon-left mb-4">
            <x-input class=" form-control-xl" id="email" type="email" name="email"  :value="old('email', $request->email)"
                         placeholder="{{ __('Email') }}"/>
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <x-input class=" form-control-xl" id="password" type="password" name="password"
                         placeholder="{{ __('Senha') }}"/>
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <x-input class=" form-control-xl" id="password_confirmation" type="password" name="password_confirmation"
                         placeholder="{{ __('Confirme a Senha') }}"/>
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">  {{ __('Redefinir senha') }}</button>
    </form>
</x-guest-layout>
