<x-action-section>
    <x-slot name="title">
        {{ __('Sessões do navegador') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Gerencie e saia de suas sessões ativas em outros navegadores e dispositivos.') }}
    </x-slot>
    <x-slot name="content">
        <div class="w-100 text-sm text-gray-600">
            {{ __('Se necessário, você pode sair de todas as outras sessões do navegador em todos os seus dispositivos. Algumas de suas sessões recentes estão listadas abaixo; no entanto, esta lista pode não ser exaustiva. Se você acha que sua conta foi comprometida, você também deve atualizar sua senha.') }}
        </div>
        @if (count($this->sessions) > 0)
            <div class="mt-5 d-flex justify-content-start">
                <!-- Other Browser Sessions -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-25 h-25 text-gray-500">
                                    <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-25 h-25 text-gray-500">
                                    <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                </svg>
                            @endif
                        </div>

                        <div class="ml-3">
                            <div class="text-sm text-gray-600">
                                {{ $session->agent->platform() }} - {{ $session->agent->browser() }}
                            </div>

                            <div>
                                <div class="text-xs text-gray-500">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">{{ __('Este aparelho') }}</span>
                                    @else
                                        {{ __('Ativo pela última vez') }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="flex items-center mt-5">
            <x-button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('Sair de outras sessões do navegador') }}
            </x-button>

            <x-action-message class="ml-3" on="loggedOut">
                {{ __('Done.') }}
            </x-action-message>
        </div>

        <!-- Log Out Other Devices Confirmation Modal -->
        <x-dialog-modal wire:model="confirmingLogout">
            <x-slot name="title">
                {{ __('Sair de outras sessões do navegador') }}
            </x-slot>
            <x-slot name="content">
                {{ __('Por favor, digite sua senha para confirmar que você gostaria de sair de suas outras sessões de navegador em todos os seus dispositivos.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                placeholder="{{ __('Senha') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-button class="ml-2"
                            wire:click="logoutOtherBrowserSessions"
                            wire:loading.attr="disabled">
                    {{ __('Sair de outras sessões do navegador') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
