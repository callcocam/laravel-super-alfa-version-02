<x-guest-layout>
    <h1 class="auth-title">{{ __('Inscrever-se') }}.</h1>
    <p class="auth-subtitle mb-5">{{ __("Obrigado por inscrever-se! Antes de começar, você poderia verificar seu endereço de e-mail clicando no link que acabamos de enviar para você? Se você não recebeu o e-mail, teremos o prazer de enviar outro.") }}</p>
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Um novo link de verificação foi enviado para o endereço de e-mail fornecido durante o registro.') }}
        </div>
    @endif
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">  {{ __('Reenviar email de verificação') }}</button>
    </form>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">  {{ __('Sair do sistema') }}</button>
    </form>
</x-guest-layout>
