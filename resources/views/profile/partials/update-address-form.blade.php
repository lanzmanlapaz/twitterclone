<section>
    <header>
        <h2 class="text-lg font-bold font-twitterChirp text-white">
            {{ __('Profile Address') }}
        </h2>

        <p class="mt-1 text-sm font-twitterChirp text-white">
            {{ __("Update your account's address.") }}
        </p>
    </header>

    <form method="post" action="">
        @csrf
    </form>

    <form name="address-form" id="address-form" method="post" action="{{ route('profile.update.address') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="province" :value="__('Province')" class="text-white font-twitterChirp font-bold" />
            <select onchange="getCities()" :value="old('province', $user->province)" name="province" id="province" class="w-full bg-black border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm rounded-md"></select>
        </div>

        <div>
            <x-input-label for="city" :value="__('City')" class="text-white font-twitterChirp font-bold" />
            <select onchange="getBarangays()" :value="old('city', $user->city)"  name="city" id="city" class="w-full bg-black border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm rounded-md"></select>
        </div>

        <div>
            <x-input-label for="barangay" :value="__('Barangay')" class="text-white font-twitterChirp font-bold" />
            <select name="barangay" id="barangay" :value="old('barangay', $user->barangay)" class="w-full bg-black border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm rounded-md"></select>
        </div>

        <div class="flex items-center gap-4">
            <button form="address-form" type="submit" class="bg-[#1D9BF0] w-32 h-10 rounded-full font-twitterChirp font-bold text-white hover:bg-[#1A8CD8] transition-colors duration-300">Save</button>
            {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}

            @if (session('status') === 'address-updated')
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

<script>
    var config = {
        cUrl: 'https://psgc.cloud/api/provinces'
    };

    var provinceSelect = document.getElementById('province'),
        citySelect = document.getElementById('city'),
        barangaySelect = document.getElementById('barangay');

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    // Load provinces and preselect based on stored user data
    function getProvinces() {
        fetch(config.cUrl, requestOptions)
        .then(response => response.json())
        .then(result => {
            result.sort((a, b) => a.name.localeCompare(b.name));

            provinceSelect.innerHTML = ''; // Clear existing options

            result.forEach(province => {
                const option = document.createElement('option');
                option.value = province.name;
                option.textContent = province.name;
                option.dataset.code = province.code;

                // Pre-select the province based on user data
                if (province.name === "{{ $user->province }}") {
                    option.selected = true;
                    getCities(province.code); // Load cities for preselected province
                }
                provinceSelect.appendChild(option);
            });
        })
        .catch(error => console.log('error', error));
    }

    // Load cities based on selected province code
    function getCities(provinceCode) {
        fetch(`${config.cUrl}/${provinceCode}/cities-municipalities`, requestOptions)
        .then(response => response.json())
        .then(result => {
            result.sort((a, b) => a.name.localeCompare(b.name));
            citySelect.innerHTML = ''; // Clear existing options
            barangaySelect.innerHTML = ''; // Clear barangays as we need new data

            result.forEach(city => {
                const option = document.createElement('option');
                option.value = city.name;
                option.textContent = city.name;
                option.dataset.code = city.code;

                // Pre-select the city based on user data
                if (city.name === "{{ $user->city }}") {
                    option.selected = true;
                    getBarangays(city.code); // Load barangays for preselected city
                }
                citySelect.appendChild(option);
            });
        })
        .catch(error => console.log('error', error));
    }

    // Load barangays based on selected city code
    function getBarangays(cityCode) {
        fetch(`https://psgc.cloud/api/cities-municipalities/${cityCode}/barangays`, requestOptions)
        .then(response => response.json())
        .then(result => {
            result.sort((a, b) => a.name.localeCompare(b.name));
            barangaySelect.innerHTML = ''; // Clear existing options

            result.forEach(barangay => {
                const option = document.createElement('option');
                option.value = barangay.name;
                option.textContent = barangay.name;

                // Pre-select the barangay based on user data
                if (barangay.name === "{{ $user->barangay }}") {
                    option.selected = true;
                }
                barangaySelect.appendChild(option);
            });
        })
        .catch(error => console.log('error', error));
    }

    // Event listeners to load dependent options
    provinceSelect.addEventListener('change', () => {
        const selectedProvinceOption = provinceSelect.querySelector('option:checked');
        if (selectedProvinceOption) {
            getCities(selectedProvinceOption.dataset.code);
            barangaySelect.innerHTML = ''; // Clear barangays when province changes
        }
    });

    citySelect.addEventListener('change', () => {
        const selectedCityOption = citySelect.querySelector('option:checked');
        if (selectedCityOption) {
            getBarangays(selectedCityOption.dataset.code);
        }
    });

    // Initial population on page load
    window.onload = function () {
        getProvinces(); // Starts the chain for cities and barangays
    };
</script>


