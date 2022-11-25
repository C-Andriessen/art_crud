<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-3 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kunst') }}
            </h2>
        <div>
            <form action="{{ route('admin.art.search') }}">
            <div class="mt-1 flex rounded-md shadow-sm">
                    <input type="text" name="q" id="query" class="block w-full rounded-none rounded-l-md border-gray-300 focus:border-gray-700 focus:ring-gray-700 sm:text-sm" placeholder="Zoek in kunst" value="{{ request()->q }}">
                  <button type="button" class="relative -ml-px inline-flex items-center space-x-2 rounded-r-md border border-black bg-black px-4 py-2 text-sm font-medium text-white hover:bg-gray-800 focus:border-gray-800 focus:outline-none focus:ring-1 focus:ring-indigo-500">
                      <!-- Heroicon name: mini/bars-arrow-up -->
                      <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
          </div>
          <div class="ml-auto">
              <a href="{{ route('admin.art.create') }}" class="inline-flex items-center rounded-md border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2">Voeg kunst toe</a>
          </div>
          
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('status'))
            <div class="bg-green-500 bg-opacity-50 text-green-800 px-10 py-5 rounded-md">{{ session('status') }}</div>
            @endif
                <div class="mt-8 flex flex-col">
                  <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                      <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Titel</th>
                              <th scope="col" class="py-3.5 pr-3 pl-2 text-left text-sm font-semibold text-gray-900">Toegevoegd</th>
                              <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Bewerken</span>
                              </th>
                              <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Verwijderen</span>
                              </th>
                            </tr>
                          </thead>
                          <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($arts as $art)
                            <tr>
                              <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                <div class="flex items-center">
                                  <div class="h-10 w-10 flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('images/' . $art->image) }}" alt="">
                                  </div>
                                  <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{ $art->title }}</div>
                                  </div>
                                </div>
                              </td>
                              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <div class="text-gray-900">{{ date('d-m-Y', strtotime($art->created_at)) }}</div>
                              </td>
                              <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <a href="{{ route('admin.art.edit', $art) }}">Bewerken</a>
                            </td>
                              <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <form action="{{ route('admin.art.destroy', $art) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Weet je zeker dat je {{ $art->title }} wilt verwijderen')">Verwijder</button>
                                </form>
                            </td>
                        </tr>
                            @endforeach
              
                            <!-- More people... -->
                          </tbody>
                        </table>
                        {{ $arts->links() }}
                      </div>
                    </div>
                </div>
              </div>
              
        </div>
    </div>
</x-app-layout>
