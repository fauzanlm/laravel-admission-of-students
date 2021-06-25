<x-guest-layout>
@section('title', 'Login - SMK Wikrama 1 Garut')
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    
    <img src="http://localhost:8000/logo/wk_logo.png" width="100px" height="100px" alt="">
    <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <x-jet-validation-errors class="mb-4" />
        
        @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>   
            @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password/NISN') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
            <a class="text-blue-600 underline text-sm hover:text-blue-900" href="{{route('register')}}">Registrasi </a>
                @if (Route::has('password.request'))
                    <a class="ml-2 underline text-sm text-blue-600 hover:text-blue-900" href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
        </div>
</div>
</x-guest-layout>
