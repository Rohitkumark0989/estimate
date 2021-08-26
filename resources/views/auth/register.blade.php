<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <!-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> -->
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="container mx-auto h-full flex flex-1 justify-center items-center user-login">
                <div class="w-full max-w-lg">
                    <div class="col-lg-12">
                    @if(Session::has('success'))
                        <div class="alert alert-primary">
                            <h2>{{ Session::get('success') }}</h2>
                        </div>
                    @endif
                        <div class="w-full max-w-lg">
                            <div class="leading-loose">
                                <h1 class="text-center text-muted">User Regisetration</h1>
                                
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Name -->
                                    <div>
                                        <x-label for="name" :value="__('Name')" />

                                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-label for="email" :value="__('Email')" />

                                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-label for="phone" :value="__('Phone')" />

                                        <x-input id="phone" class="block mt-1 w-full"
                                                        type="text"
                                                        name="phone"
                                                        required autocomplete="new-password" />
                                    </div>
                                    <x-input id="password" class="block mt-1 w-full"
                                                        type="hidden"
                                                        name="password"
                                                        required autocomplete="new-password" value="123456789" />
                                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                                        type="hidden"
                                                        name="password_confirmation"
                                                        required autocomplete="new-password" value="123456789" />                         
                                    <!-- Password -->
                                    <!-- <div class="mt-4">
                                        <x-label for="password" :value="__('Password')" />

                                        <x-input id="password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="new-password" />
                                    </div> -->

                                    <!-- Confirm Password -->
                                    <!-- <div class="mt-4">
                                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password_confirmation" required />
                                    </div> -->

                                    <div class="flex items-center justify-end mt-4">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                            {{ __('Already registered?') }}
                                        </a>

                                        <x-button class="ml-4">
                                            {{ __('Register') }}
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
        </div>                        
    </x-auth-card>
</x-guest-layout>
