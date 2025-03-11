@extends('layout.index')

@section('main')
<div class=" py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl">REGISTER</h2>

        <div class="max-w-lg mx-auto rounded-lg shadow-lg border bg-white p-6 md:p-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Name</label>
                    <input id="name" type="text" name="name" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" value="{{ old('name') }}" required autofocus autocomplete="name" />
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Email Address</label>
                    <input id="email" type="email" name="email" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" value="{{ old('email') }}" required autocomplete="email" />
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Password</label>
                    <input id="password" type="password" name="password" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" required autocomplete="new-password" />
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password-confirm" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Confirm Password</label>
                    <input id="password-confirm" type="password" name="password_confirmation" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" required autocomplete="new-password" />
                </div>
                
                <!-- Register Button -->
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="block w-full rounded-lg bg-gray-800 px-8 py-3 text-center text-sm font-semibold text-white transition duration-100 hover:bg-gray-700">Register</button>
                </div>
            </form>

            <!-- Already have an account? -->
            <div class="flex items-center justify-between bg-gray-100 p-4 mt-4 rounded-lg">
                <p class="text-sm text-gray-500">Already have an account? <a href="{{ route('login') }}" class="text-indigo-500 hover:text-indigo-600">Login</a></p>
            </div>
        </div>
    </div>
</div>
@endsection