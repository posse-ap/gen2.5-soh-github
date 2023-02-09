<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="p-6 text-gray-900 text-xl">
              {{ __("Big Questions") }}
          </div>
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @foreach ($items as $item)
            <div class="p-6 text-gray-900 flex justify-between">
              <!-- <a href="/admin/questions/{{$item->id}}"> -->
              <a href="{{route('big_question.show',['id'=>$item->id])}}">
                {{ __($item->pref_name) }}
              </a>
              <div class="flex gap-4">
                <div><a href="{{ route('big_question.edit',['id'=>$item->id]) }}">編集</a></div>
                <!-- <div><a href="{{ route('big_question.destroy',['id'=>$item->id]) }}">削除</a></div> -->
                <div>
                  <form method="POST" action="{{ route('big_question.destroy',['id'=>$item->id]) }}">
                    @csrf
                    <button type="submit">削除</button>
                  </form>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="p-6"><a href="{{ route('big_question.create') }}">新規追加</a></div>
        </div>
    </div>
</x-app-layout>
