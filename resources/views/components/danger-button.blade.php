<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center w-44 h-10 bg-red-600 border border-transparent rounded-full font-twitterChirp font-bold text-white hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>