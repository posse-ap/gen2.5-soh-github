<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('編集') }}
        </h2>
    </x-slot>
<body>
  <div class="wrapper text-center">
    @foreach ($items as $item)
    <div class="text-xl py-6">
      <a href="{{ route('quizy',['id' => $item->id]) }}">{{__($item->pref_name)}}の難読地名クイズ</a>
    </div>
    @endforeach
    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/admin') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Admin</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
  </div>
</body>
</x-guest-layout>