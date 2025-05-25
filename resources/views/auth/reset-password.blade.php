<x-layout>
<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Reset Password
        </h2>
        <p class="mb-4">Enter a new password below</p>
    </header>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Email</label>
            <input type="email" name="email" class="border border-gray-200 rounded p-2 w-full" value="{{ old('email') }}" required autofocus />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="inline-block text-lg mb-2">New Password</label>
            <input type="password" name="password" class="border border-gray-200 rounded p-2 w-full" required />
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm Password</label>
            <input type="password" name="password_confirmation" class="border border-gray-200 rounded p-2 w-full" required />
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Reset Password
            </button>
        </div>

        <div class="mt-8 text-center">
            <a href="/login" class="text-laravel">Back to Login</a>
        </div>
    </form>
</div>
</x-layout>
