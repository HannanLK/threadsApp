<x-app-layout>
    <section class="flex flex-col items-center justify-center pb-6 md:flex-row pt-28 shadow-amber-500">
        <div class="flex w-full max-w-4xl overflow-hidden bg-white rounded-lg shadow-lg">
            <!-- Left Section (Logo and Branding) - Hidden on Mobile -->
            <!-- Left Section (Logo and Branding) - Hidden on Mobile -->
            <div class="hidden w-1/2 bg-gray-200 md:flex">
                <img src="{{ asset('assets/image/banner/registerFiller.jpg') }}" alt="filler image" class="w-300px">
            </div>

            <!-- Right Section (Login Form) -->
            <div class="w-full p-12 bg-gray-200 md:w-1/2 banner">
                <h2 class="mb-6 font-serif text-3xl font-semibold text-center text-gray-800">Register</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-2">
                        <input id="name" type="text" name="name" placeholder="Name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#b1975b] text-base font-normal" required autofocus autocomplete="name" >
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mb-2">
                        <input id="email" type="email" name="email" placeholder="Email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#b1975b] text-base font-normal" :value="old('email')" required autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-2">
                        <input id="password" type="password" name="password" placeholder="Password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#b1975b] text-base font-normal" required autocomplete="new-password" >
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="mb-2">
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Re-Password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#b1975b] text-base font-normal" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="mb-2">
                        <a class="text-blue-600 hover:underline" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                    <button type="submit" name="submit" class="w-full py-3 font-semibold text-white bg-black rounded-lg hover:bg-gray-800">{{ __('Register') }}</button>
                </form>
            </div>
        </div>
    </section>
  
</x-app-layout>
