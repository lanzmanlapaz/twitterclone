<section>
    <header>
        <h2 class="text-lg font-bold font-twitterChirp text-white">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-white font-twitterChirp">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-white font-twitterChirp font-bold" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full bg-inherit border-[#4D5154] font-twitterChirp" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-white font-twitterChirp font-bold" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full bg-inherit border-[#4D5154]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-white font-twitterChirp font-bold" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full bg-inherit border-[#4D5154]" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-[#1D9BF0] w-32 h-10 rounded-full font-twitterChirp font-bold text-white hover:bg-[#1A8CD8] transition-colors duration-300">Save</button>
            {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-white"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
