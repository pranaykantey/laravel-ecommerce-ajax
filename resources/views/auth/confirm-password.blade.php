<x-guest-layout>

        <main class="pt-90">
            <div class="mb-4 pb-4"></div>
            <section class="login-register container">
                <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab"
                            href="#tab-item-login" role="tab" aria-controls="tab-item-login"
                            aria-selected="true">Login</a>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="login_register_tab_content">
                    <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                        <div class="login-form">

                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                            </div>

                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf

                                <!-- Password -->
                                <div>
                                    {{-- <x-input-label for="password" :value="__('Password')" /> --}}

                                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" label="Password" placeholder="Password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="flex justify-end mt-4">
                                    <x-primary-button>
                                        {{ __('Confirm') }}
                                    </x-primary-button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </section>
        </main>
</x-guest-layout>
