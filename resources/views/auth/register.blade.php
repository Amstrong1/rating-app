<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Company Address -->
        <div class="mt-4">
            <x-input-label for="company_email" :value="__('Email de la structure')" />
            <x-text-input id="company_email" class="block mt-1 w-full" type="email" name="company_email"
                :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('company_email')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- latitude -->
        <div class="mt-4">
            <x-input-label for="latitude" :value="__('Latitude')" />
            <x-text-input id="latitude" class="block mt-1 w-full" type="text" name="latitude" :value="old('latitude')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
        </div>

        <!-- longitude -->
        <div class="mt-4">
            <x-input-label for="longitude" :value="__('Longitude')" />
            <x-text-input id="longitude" class="block mt-1 w-full" type="text" name="longitude" :value="old('longitude')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('longitude')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
