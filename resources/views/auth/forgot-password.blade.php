<x-layout>

<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Forgot Password
        </h2>
        <p class="mb-4">Enter your email to receive a password reset link</p>
    </header>

    @if (session('status'))
        <p class="text-green-500 text-sm mb-4 text-center">
            {{ session('status') }}
        </p>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Email</label>
            <input type="email" name="email" class="border border-gray-200 rounded p-2 w-full" value="{{ old('email') }}" required autofocus />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Send Password Reset Link
            </button>
        </div>

        <div class="mt-8 text-center">
            <a href="/login" class="text-laravel">Back to Login</a>
        </div>
    </form>
</div>

</x-layout>
