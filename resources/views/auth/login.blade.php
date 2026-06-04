<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Login') }} - Kairos Coffee</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#FBF9F4] text-[#2C1A11] antialiased">
    <section class="relative min-h-screen flex items-center justify-center px-6 py-16 overflow-hidden">
        <div class="absolute inset-0 -z-10">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1600&auto=format&fit=crop" alt="" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A11] via-transparent to-transparent"></div>
        </div>

        <div class="w-full max-w-6xl">
            <div class="flex items-stretch justify-center gap-6">
                <div class="hidden lg:flex flex-1 rounded-3xl overflow-hidden bg-[#2C1A11]">
                    <div class="relative w-full">
                        <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=1000&auto=format&fit=crop" alt="" class="w-full h-full object-cover opacity-90">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#2C1A11]/90 via-[#2C1A11]/40 to-transparent"></div>
                        <div class="absolute inset-0 p-10 flex flex-col justify-end">
                            <h1 class="font-serif text-4xl text-white leading-tight">
                                Escape the Noise,
                                <br>
                                <span class="italic font-normal text-[#D4B996]">Welcome back.</span>
                            </h1>
                            <p class="mt-4 text-white/70 max-w-sm">
                                Coffee meets stories. Login untuk melanjutkan petualanganmu.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex-1">
                    <div class="rounded-3xl border border-[#7D6E65]/20 bg-white/80 backdrop-blur-md shadow-xl p-8 md:p-10">
                        <div class="flex items-center justify-between gap-4">
                            <a href="/" class="font-serif text-2xl font-bold tracking-wide text-[#4A3525]">Kairos Coffee</a>
                            <span class="hidden sm:inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-[#7D6E65]">
                                Secure Login
                                <span class="inline-flex h-2 w-2 rounded-full bg-[#D4B996]"></span>
                            </span>
                        </div>

                        <h2 class="mt-6 font-serif text-3xl font-bold text-[#4A3525]">{{ __('Login') }}</h2>
                        <p class="mt-2 text-[#4A3525]/70">
                            Masuk untuk mengakses dashboard dan fitur lainnya.
                        </p>

                        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                            @csrf

                            @if (session('status'))
                                <div class="rounded-xl border border-[#7D6E65]/20 bg-[#F3ECE3] px-4 py-3 text-sm text-[#4A3525]">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div>
                                <label for="email" class="block text-sm font-semibold text-[#4A3525]">{{ __('Email') }}</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                                    class="mt-2 w-full rounded-2xl border border-[#7D6E65]/20 bg-white px-4 py-3 text-[#2C1A11] placeholder:text-[#7D6E65]/60 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#D4B996]/70 focus:border-[#D4B996]">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-semibold text-[#4A3525]">{{ __('Password') }}</label>
                                <input id="password" name="password" type="password" required autocomplete="current-password"
                                    class="mt-2 w-full rounded-2xl border border-[#7D6E65]/20 bg-white px-4 py-3 text-[#2C1A11] placeholder:text-[#7D6E65]/60 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#D4B996]/70 focus:border-[#D4B996]">
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between gap-4">
                                <label class="flex items-center gap-3 cursor-pointer select-none">
                                    <input type="checkbox" name="remember" class="h-4 w-4 rounded border-[#7D6E65]/30 text-[#4A3525] focus:ring-[#D4B996]/70" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="text-sm font-medium text-[#4A3525]/80">{{ __('Remember me') }}</span>
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-[#4A3525] hover:underline">
                                        {{ __('Forgot password?') }}
                                    </a>
                                @endif
                            </div>

                            <button type="submit" class="w-full rounded-2xl bg-[#4A3525] text-white py-3.5 font-bold shadow-lg hover:bg-[#2C1A11] transition duration-300">
                                {{ __('Login') }}
                            </button>

                            <div class="text-center pt-2">
                                <span class="text-sm text-[#4A3525]/70">{{ __('Belum punya akun?') }}</span>
                                <a href="{{ route('register') }}" class="ml-2 text-sm font-bold text-[#4A3525] hover:underline">{{ __('Register') }}</a>
                            </div>
                        </form>
                    </div>

                    <p class="mt-5 text-center text-xs text-[#7D6E65]/80">
                        © {{ date('Y') }} Kairos Coffee - Crafted for peace.
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

