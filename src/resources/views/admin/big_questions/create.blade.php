<x-guest-layout>
    <form method="POST" action="{{ route('big_question.store') }}">
        @csrf
        <div>
            <x-input-label for="pref_name" :value="__('都道府県名')" />
            <x-text-input id="pref_name" class="block mt-1 w-full" type="text" name="pref_name" :value="old('pref_name')" required autofocus />
            <x-input-error :messages="$errors->get('pref_name')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admin') }}">
                {{ __('戻る') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('追加') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
