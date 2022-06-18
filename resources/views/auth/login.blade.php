<x-guest-layout>



    <div class="flex flex-wrap flex-row justify-center justify-items-center content-center items-center p-6 login" >
        <div class="flex flex-wrap flex-row justify-center justify-items-center content-center items-center p-6 glass">
                    <div class="p-6" style="width: 500px;height:500px;">
            <div class="logo-image-login">
              <div>
                  <img src="{{ asset('image/svg/pup.svg') }}">
              </div>
            </div>
        </div>
        <div class="flex flex-wrap flex-row justify-center justify-items-center content-center items-center p-6" style="width: 500px;height:500px;">
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <x-jet-label class="login-label" for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="login-input block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                <div class="mt-4">
                    <x-jet-label class="login-label" for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="login-input block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>
                <div class="block mt-4">
                    <label class="login-label" for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <x-jet-button class="ml-4">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </form>
        </div>  
        </div>
    </div>





</x-guest-layout>
