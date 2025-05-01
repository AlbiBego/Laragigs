@if(session()->has('message'))
  <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/4 transform-translate-x-1/2 bg-laravel test-white px-48 py-3"> {{-- why does 3/8 not work --}}
    {{session('message')}}
  </div>
@endif