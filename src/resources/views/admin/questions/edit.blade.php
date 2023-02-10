<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                  <section>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Update question and choices.") }}
                    </p>
                    
                  <form method="post" action="{{ route('question.update', ['id'=>$items->big_question_id, 'question_id'=>$items->id]) }}" class="mt-6 space-y-6">
                    @csrf
                    <header>
                      <div>
                            <x-text-input name="question_name" type="text" class="mt-1 block w-full" required :value="old('name', $items->name)"/>
                        </div>

                    </header>

                      @foreach ($items->choices as $choice)
                      <div class="flex">
                        <div>
                            <x-input-label for='choice{{$loop->index + 1}}' :value="__('choice')" />
                            <x-text-input id="choice{{$loop->index + 1}}" name="choice{{$loop->index + 1}}" type="text" class="mt-1 block w-full" required :value="old('name', $choice->name)"/>
                        </div>
                        <div>
                            <x-input-label for="" :value="__('valid')" />
                            <x-text-input id="valid{{$loop->index + 1}}" name="valid{{$loop->index + 1}}" type="text" class="mt-1 block w-full" required :value="old('name', $choice->valid)"/>
                        </div>
                      </div>
                      @endforeach

                      <div class="flex items-center gap-4">
                      <a class="mt-1 text-sm text-gray-600" href="{{route('big_question.show', ['id'=>$items->big_question_id])}}">
                          {{ __("戻る") }}
                      </a>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                      </div>
                  </form>
              </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
