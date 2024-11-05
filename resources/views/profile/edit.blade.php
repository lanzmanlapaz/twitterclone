<x-app-layout>
    {{-- <x-slot name="header" class="bg-black">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}
    <div class="w-max-full h-auto bg-black text-white font-twitterChirp font-bold mt-1 ml-40 pt-12 text-3xl"> 
        Profile
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-black shadow sm:rounded-lg border-2 border-[#2F3336]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-black shadow sm:rounded-lg border-2 border-[#2F3336]">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-picture-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-black shadow sm:rounded-lg border-2 border-[#2F3336]">
                <div class="max-w-xl">
                    @include('profile.partials.update-address-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-black shadow sm:rounded-lg border-2 border-[#2F3336]">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-black shadow sm:rounded-lg border-2 border-[#2F3336]">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
