<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kunst bewerken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <form action="{{ route('admin.art.update', $art) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="title" class="block text-sm font-medium text-gray-700">Titel</label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" name="title" id="title" class="block w-full rounded-md @error('title') border-red-300 pr-10 text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500 @enderror sm:text-sm" placeholder="Vul hier de titel van je kunstwerk in" value="{{ old('title', $art->title) }}" aria-invalid="true" aria-describedby="title-error">
                                @error('title')
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <!-- Heroicon name: mini/exclamation-circle -->
                                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                @enderror
                                </div>
                                @error('title')
                                <p class="mt-2 text-sm text-red-600" id="title-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="block text-sm font-medium text-gray-700">Foto</label>
                                <input class="block w-full text-sm text-gray-900 rounded-lg cursor-pointer py-2 focus:outline-none" id="image" type="file" name="image">
                                @error('image')
                                <p class="mt-2 text-sm text-red-600" id="image-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <img src="{{ asset('images/' . $art->image) }}" alt="" class="mb-3">
                                <div class="flex justify-end">
                                  <a class="py-2 px-4 text-sm font-medium text-gray-700  focus:outline-none focus:ring-2 focus:ring-offset-2" href="{{ route('admin.art.index') }}">Annuleren</a>
                                  <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-gray-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2">Opslaan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
