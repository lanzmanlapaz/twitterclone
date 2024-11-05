<section>
    <header>
        <h2 class="text-lg font-bold font-twitterChirp text-white">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm font-twitterChirp text-white">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-white font-twitterChirp font-bold" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-inherit border-[#4D5154] font-twitterChirp" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white font-twitterChirp font-bold" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-inherit border-[#4D5154] font-twitterChirp" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-[#1D9BF0] w-32 h-10 rounded-full font-twitterChirp font-bold text-white hover:bg-[#1A8CD8] transition-colors duration-300">Save</button>
            {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}

            @if (session('status') === 'profile-updated')
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
