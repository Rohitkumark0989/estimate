<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <!-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> -->
        </x-slot>

        <!-- Session Status -->
        
        <!-- Validation Errors -->
        
        <div class="container mx-auto h-full flex flex-1 justify-center items-center user-login">
                <div class="w-full max-w-lg">
                    <div class="col-lg-12">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        @if(count($errors)!=0)            
                        <div class="alert alert-danger">
                            <h2><x-auth-validation-errors class="mb-4" :errors="$errors" /></h2>
                        </div>
                       @endif 
                        <div class="w-full max-w-lg">
                            <div class="leading-loose">
                                
                                <h1 class="text-center text-muted">Welcome to {{(Request::path() == 'login') ?'User':'Admin'}} login panel</h1>
                                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div>
                                        <x-label for="email" :value="__('Email')" />

                                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-label	 for="password" :value="__('Password')" />

                                        <x-input id="password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="current-password" />
                                    </div>

                                    <!-- Remember Me -->
                                    <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        @if (Request::path() == 'login')  
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                                {{ __('Register') }}
                                            </a>
                                        @else
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                                {{ __('User Login') }}
                                            </a>
                                        @endif    
                                        <!-- @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif -->

                                        <x-button class="ml-3">
                                            {{ __('Log in') }}
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
