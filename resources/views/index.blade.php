<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Y.</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>
<style>
html {
  scrollbar-gutter: auto !important;
}
</style>
<body>
    <div class="min-h-screen w-screen bg-black text-white flex ">
        <div class="w-1/2 flex justify-center items-center font-twitterChirpExtendedHeavy text-[20rem] text-white">
            Y
        </div>
        
        <div class="w-1/2 flex flex-col justify-evenly items-center p-4">
            <div class="font-twitterChirpExtendedHeavy w-full text-[64px] p-4">Stay in the Loop</div>
            <div class="font-twitterChirpExtendedHeavy w-full text-3xl p-4">Join today.</div>
            <dialog id="my_modal_4" class="modal bg-transparent backdrop-grayscale-0">
                <div class="modal-box w-5/12 max-w-5xl bg-black">
                  <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute left-2 top-2">✕</button>
                  </form>
                  <div class="w-full flex flex-col justify-center items-center gap-4 px-20 py-8">
                      <p class="text-4xl font-twitterChirpExtendedHeavy">Y</p>
                      <div class="w-full text-3xl font-twitterChirp font-bold">
                        Create your account
                      </div>
                      <form action="{{ route('register') }}" method="POST" id="registrationForm" class="w-full flex flex-col gap-y-6">
                        @csrf
                        {{-- Start of Registration Page 1 --}} 
                        <div id="page-1" class="w-full flex flex-col justify-start items-center gap-y-6">
                            <input type="text" placeholder="Name" name="name" class="input bg-inherit input-bordered w-full focus:outline-0 focus:border-[#1D9BF0] focus:border-2" />
                            <input type="email" placeholder="Email" name="email" class="input bg-inherit input-bordered w-full focus:outline-0 focus:border-[#1D9BF0] focus:border-2" />
                            <div>
                                <p class="text-[15px] font-bold">Date of birth</p>
                                <p class="text-[#71767B] text-[14px]">This will not be shown publicly. Confirm your own age, even if this account is for a business, a pet, or something else.</p>
                            </div>
                            <div class="w-full flex gap-x-4 ">
                                <select id="monthSelect" name="birthMonth" class="select select-bordered w-full bg-inherit focus:outline-0 focus:border-[#1D9BF0] focus:border-2">
                                    <option disabled selected class="text-white bg-black text-lg">Month</option>
                                    <option value="1" class="text-white bg-black text-lg">January</option>
                                    <option value="2" class="text-white bg-black text-lg">February</option>
                                    <option value="3" class="text-white bg-black text-lg">March</option>
                                    <option value="4" class="text-white bg-black text-lg">April</option>
                                    <option value="5" class="text-white bg-black text-lg">May</option>
                                    <option value="6" class="text-white bg-black text-lg">June</option>
                                    <option value="7" class="text-white bg-black text-lg">July</option>
                                    <option value="8" class="text-white bg-black text-lg">August</option>
                                    <option value="9" class="text-white bg-black text-lg">September</option>
                                    <option value="10" class="text-white bg-black text-lg">October</option>
                                    <option value="11" class="text-white bg-black text-lg">November</option>
                                    <option value="12" class="text-white bg-black text-lg">December</option>
                                </select>
                                <select id="daySelect" name="birthDate" class="select select-bordered w-full bg-inherit focus:outline-0 focus:border-[#1D9BF0] focus:border-2">
                                    <option disabled selected class="text-white bg-black text-lg">Day</option>
                                </select>
                                <select id="year-select" name="birthYear" class="select select-bordered w-full bg-inherit focus:outline-0 focus:border-[#1D9BF0] focus:border-2">
                                    <option disabled selected class="text-white bg-black text-lg">Year</option>
                                </select>
                            </div>
                        </div>
                        {{-- End of Registration Page 1 --}} 
                        {{-- Start of Registration Page 2 --}} 
                        <div id="page-2" class="w-full flex-col justify-start items-center gap-y-6 absolute hidden">
                            <input type="text" placeholder="Username" name="username" class="input bg-inherit input-bordered w-full focus:outline-0 focus:border-[#1D9BF0] focus:border-2" />                          
                            <input type="password" placeholder="Password" name="password" class="input bg-inherit input-bordered w-full focus:outline-0 focus:border-[#1D9BF0] focus:border-2" />
                            <input type="password" placeholder="Confirm Password" name="password_confirmation" class="input bg-inherit input-bordered w-full focus:outline-0 focus:border-[#1D9BF0] focus:border-2" />
                        </div>
                        {{-- End of Registration Page 2 --}} 
                        <div class="w-full flex gap-x-4">
                            <button id="nextBtn" type="button" onclick="goToPage2()" class="grow h-14 bg-white hover:bg-[#D7DBDC] transition-colors duration-200 text-black rounded-full font-twitterChirp font-bold flex justify-center items-center text-lg">Next</button>
                            <button id="backBtn" type="button" onclick="goToPage1()" class="grow h-14 bg-white hover:bg-[#D7DBDC] transition-colors duration-200 text-black rounded-full font-twitterChirp font-bold justify-center items-center text-lg hidden absolute">Back</button>
                            <button id="submitBtn" type="submit" class="grow h-14 bg-[#1D9BF0] hover:bg-[#1A8CD8] hover:cursor-pointer transition-colors duration-200 text-white rounded-full font-twitterChirp font-bold justify-center items-center text-lg hidden absolute">Create Account</button>
                        </div>
                      </form>
                  </div>
                </div>
              </dialog>
            <div class="w-full p-4 flex flex-col justify-center items-start gap-y-3">
                <a href="{{ route('register') }}" class="w-72 h-10 rounded-full flex justify-center items-center text-white font-twitterChirp font-bold bg-[#1D9BF0] hover:bg-[#1A8CD8] hover:cursor-pointer transition-colors duration-200 text-md">
                    Create account
                </a>
                <div>
                    <p class="w-72 text-xs text-[#71767B]">By signing up, you agree to the <a class="text-[#1D9BF0] hover:underline hover:cursor-pointer">Terms of Service</a> and <a class="text-[#1D9BF0] hover:underline hover:cursor-pointer">Privacy Policy</a>, including <a class="text-[#1D9BF0] hover:underline hover:cursor-pointer">Cookie Use.</a></p>
                </div>
            </div>

            <dialog id="my_modal_3" class="modal">
              <div class="modal-box bg-black">
                <form method="dialog">
                  <button class="btn btn-sm btn-circle btn-ghost absolute left-2 top-2">✕</button>
                </form>
                <div class="w-full flex justify-center items-center pt-4">
                    Hello World
                </div>
              </div>
            </dialog>

            <div class="w-full text-xl p-4 font-twitterChirp flex flex-col justify-between items-start gap-y-4">
                Already have an account?
                <a href="{{ route('login') }}" class="w-72 h-10 rounded-full font-twitterChirp font-bold flex justify-center items-center outline outline-[0.5px] outline-slate-50 text-[#1D9BF0] hover:bg-[#031019] hover:cursor-pointer transition-colors duration-200 text-[15px]">
                    Sign in
                </a>
            </div>
        </div>
    </div>
</body>
</html>