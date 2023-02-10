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
                    <header>
                      <h2 class="text-lg font-medium text-gray-900">
                          {{ __($pref_name->pref_name) }}
                      </h2>

                      <p class="mt-1 text-sm text-gray-600">
                          {{ __("Update prefecture name.") }}
                      </p>
                    </header>

                  <form method="post" action="{{ route('big_question.update', ['id'=>$pref_name->id]) }}" class="mt-6 space-y-6">
                      @csrf

                      <div>
                          <x-input-label for="pref_name" :value="__('都道府県名')" />
                          <x-text-input id="pref_name" name="pref_name" type="text" class="mt-1 block w-full" required autofocus autocomplete="pref_name" :value="old('name', $pref_name->pref_name)"/>
                          <x-input-error class="mt-2" :messages="$errors->get('pref_name')" />
                      </div>

                      <div class="flex items-center gap-4">
                      <a class="mt-1 text-sm text-gray-600" href="/admin">
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
