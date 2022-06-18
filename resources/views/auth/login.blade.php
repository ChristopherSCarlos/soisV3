<style>
    /*start of login page*/
.login-main-container{
    display: flex;
    justify-content: center;
    justify-items: center;
    align-items: center;
    align-content: center;


    background: linear-gradient(to bottom, transparent, #0a0000), url('/image/pup-newspage.jpg');

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  
  /* Needed to position the navbar */
    position: relative;
    transition: all 1s ease;
    -webkit-filter: brightness(80%);
}
.login-main-container:hover{
    -webkit-filter: brightness(100%);
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
    transition: all 1s ease;
}
.login-inner-container{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap ;
    justify-content: center;
    align-items: center;
    align-content: center;
}
.login-inner-elements-container{
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center; 
    /*max-width: 50vw;*/
    /*height: 100%;*/
    padding: 5%;
}
@media(max-width: 789px){
    .login-inner-elements-container{
        padding: 5% 5% 0% 5%;
    }    
}

.login-image{
    height: 50vh;
    object-fit: contain;
}

.glass{
    background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  /*border: 3px solid #f1f1f1;*/
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
.login-label{
    color: rgba(255, 255, 255, 1.0);
}
.login-input{
    color: black;
}
/*End of login page*/





</style>
<x-guest-layout>


<div class="login-main-container" style="width: 100vw; height: 100vh;">
    <div class="login-inner-container glass" style="">
        <div class="login-inner-elements-container" style="">
            <a href="/">
                <img class="login-image" style="" src="{{ asset('image/svg/pup.svg') }}">
            </a>
        </div>
        <div class="login-inner-elements-container" style="">
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
