<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="p-6 text-gray-900">
              {{ __("You're logged in!") }}
          </div>
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @foreach ($items as $item)
            <div class="p-6 text-gray-900 flex justify-between">
              <a href="/admin/questions/{{$item->id}}">
                {{ __($item->pref_name) }}
              </a>
              <div class="flex gap-4">
                <div>編集</div>
                <div>削除</div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="p-6">登録</div>
        </div>
    </div>
</x-app-layout>