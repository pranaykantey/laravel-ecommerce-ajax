<x-guest-layout>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
            <div class="tab-content pt-2" id="login_register_tab_content">
                <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                    <div class="login-form">

                        <section class="login-register container">
                            <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                              <li class="nav-item" role="presentation">
                                <a class="nav-link nav-link_underscore active" id="register-tab" data-bs-toggle="tab"
                                  href="#tab-item-register" role="tab" aria-controls="tab-item-register" aria-selected="true">Register</a>
                              </li>
                            </ul>
                            <div class="tab-content pt-2" id="login_register_tab_content">
                              <div class="tab-pane fade show active" id="tab-item-register" role="tabpanel" aria-labelledby="register-tab">
                                <div class="register-form">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <!-- Name -->
                                        <div>
                                            <x-text-input placeholder="Enter Name" id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name')}}" required autofocus autocomplete="name" label="Name" />

                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        <!-- Username -->
                                        <div class="mt-4">
                                            <x-text-input placeholder="Enter Username" id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" label="UserName" />
                                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="mt-4">
                                            <x-text-input placeholder="Enter Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" label="Email" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Phone -->
                                        <div class="mt-4">
                                            <x-text-input placeholder="Enter Phone" id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" autocomplete="phone" label="Phone" />
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                        </div>

                                        <!-- Address -->
                                        <div class="mt-4">
                                            <x-text-input placeholder="Enter Address" id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" autocomplete="username" label="Address" />
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-text-input placeholder="Enter Password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" label="Password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-text-input placeholder="Enter Password" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" label="Confirm Password" />

                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                                {{ __('Already registered?') }}
                                            </a>
                                            <x-primary-button class="ms-4 register-button-submit">
                                                {{ __('Register') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </section>
                        <br>

                    </div>
                </div>
            </div>
    </main>
</x-guest-layout>
