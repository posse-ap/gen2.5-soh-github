<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規追加') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                  <section>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Create question and choices.") }}
                    </p>
                    
                  <form method="post" action="{{ route('question.store',['id'=>$item->id]) }}" class="mt-6 space-y-6">
                    @csrf
                    <header>
                      <div>
                          <x-input-label :value="__('地名')" />
                          <x-text-input name="question_name" type="text" class="mt-1 block w-full" required />
                      </div>

                    </header>

                      @for ($i = 0; $i < 3; $i++)
                      <div class="flex">
                        <div>
                            <x-input-label for='choice{{$i}}' :value="__('選択肢')" />
                            <x-text-input id="choice{{$i}}" name="choice{{$i}}" type="text" class="mt-1 block w-full" required/>
                        </div>
                        <div>
                            <x-input-label for="" :value="__('valid 0/1')" />
                            <x-text-input id="valid{{$i}}" name="valid{{$i}}" type="text" class="mt-1 block w-full" required/>
                        </div>
                      </div>
                      @endfor

                      <div class="flex items-center gap-4">
                      <a class="mt-1 text-sm text-gray-600" href="{{route('big_question.show', ['id'=>$item->id])}}">
                          {{ __("戻る") }}
                      </a>
                        <x-primary-button>{{ __('追加') }}</x-primary-button>
                      </div>
                  </form>
              </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
