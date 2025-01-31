<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="flex flex-col items-center justify-center pb-6 md:flex-row pt-28 shadow-amber-500 login-section">
        <div class="flex w-full max-w-4xl overflow-hidden bg-white rounded-lg shadow-lg">
            <!-- Left Section (Logo and Branding) - Hidden on Mobile -->
            <div class="hidden w-full md:flex md:w-1/2 bg-[#b1975b] items-center justify-center p-4 font-serif">
                <div class="bg-white rounded-md">
                    <div class="px-16 py-20 text-center">
                        <h1 class="pb-4 mb-4 text-3xl font-light text-black">SIERRA<br>FASHION</h1>
                        <p class="text-lg text-black">Clothing & Fashion Store</p>
                    </div>
                </div>
            </div>

            <!-- Right Section (Login Form) -->
            <div class="w-full p-12 bg-gray-200 md:w-1/2 banner">
                <h2 class="mb-6 font-serif text-3xl font-semibold text-center text-gray-800">ADMIN LOGIN</h2>
                <?php if (!empty($data['error_message'])): ?>
                    <div class="error-message" style="color: red;">
                        <?= $data['error_message']; ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="mb-4">
                        <input id="email" type="email" placeholder="Admin Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#b1975b] text-base font-normal" required>
                    </div>
                    <div class="mb-4">
                        <input id="password" type="password" placeholder="Admin Password"  type="password" name="password" required autocomplete="current-password"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#b1975b] text-base font-normal" required>
                    </div>
                    <div class="flex items-center justify-between mb-6">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox" class="h-4 w-4 text-[#b1975b] focus:ring-[#b1975b] border-gray-300 rounded" name="remember">
                            <span class="block ml-2 text-sm text-gray-800">{{ __('Remember me') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                    <button type="submit" name='submit' class="w-full py-3 font-semibold text-white bg-black rounded-lg hover:bg-gray-800"> {{ __('Log In') }}</button>
                </form>
            </div>
        </div>
    </section>

</x-app-layout>
