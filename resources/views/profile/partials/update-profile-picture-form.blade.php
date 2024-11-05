<section>
    <header>
        <h2 class="text-lg font-bold text-white font-twitterChirp">
            {{ __('Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-white font-twitterChirp">
            {{ __("Update your account's profile picture.") }}
        </p>
    </header>

    <form id="profile_picture_form" name="profile_picture_form" method="post" action="{{ route('profile.picture.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex justify-center items-center gap-4">
            <div class="avatar">
                <div class="ring-[#1D9BF0] ring-offset-base-100 w-24 rounded-full ring ring-offset-2">
                    <!-- Add an id to the img tag for JavaScript to target -->
                    <img id="profilePicturePreview" src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile Picture" />
                </div>
            </div>
            <input type="file" class="file-input file-input-bordered w-full max-w-xs bg-inherit" accept="image/*" name="profile_picture" id="profile_picture_input" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>

        <div class="flex items-center gap-4">
            <button form="profile_picture_form" type="submit" class="bg-[#1D9BF0] w-32 h-10 rounded-full font-twitterChirp font-bold text-white hover:bg-[#1A8CD8] transition-colors duration-300">Save</button>

            @if (session('status') === 'profile-picture-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    // Get file input and image preview elements
    const profilePictureInput = document.getElementById('profile_picture_input');
    const profilePicturePreview = document.getElementById('profilePicturePreview');

    profilePictureInput.addEventListener('change', function(event) {
        const file = event.target.files[0];

        // Ensure a file is selected and it's an image
        if (file && file.type.startsWith('image/')) {
            // Create a URL for the selected file and set it as the src for preview
            profilePicturePreview.src = URL.createObjectURL(file);
        }
    });
</script>
