<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Clients') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-5">
          <a href="{{ route('clients.create') }}" class="bg-blue-600 dark:bg-blue-600 hover:bg-blue-500 dark:hover:bg-blue-500 text-white font-bold py-2 px-4 rounded inline-flex items-center gap-2 transition-colors">
            <div class="text-white">Create New Client</div>
          </a>

          <div class="relative overflow-x-auto">
            <table class="table-auto w-full mt-4 mb-3">
              <thead>
                <tr>
                  <th class="px-5 py-3 bg-blue-800 dark:bg-gray-900 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                    First Name
                  </th>
                  <th class="px-5 py-3 bg-blue-800 dark:bg-gray-900 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                    Last Name
                  </th>
                  <th class="px-5 py-3 bg-blue-800 dark:bg-gray-900 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                    Email
                  </th>
                  <th class="px-5 py-3 bg-blue-800 dark:bg-gray-900 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">Avatar</th>
                  <th class="px-5 py-3 bg-blue-800 dark:bg-gray-900 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clients as $key => $client)

                @if($key % 2 == 0)
                <tr>
                  @else
                <tr class=" bg-gray-100">
                  @endif
                  <td class="px-5 py-5 text-sm">{{ $client->first_name }}</td>
                  <td class="px-5 py-5 text-sm">{{ $client->last_name }}</td>
                  <td class="px-5 py-5 text-sm">{{ $client->email }}</td>
                  <td class="px-5 py-5 text-sm"><img src="{{ asset('storage/'. $client->avatar) }}" width="50" height="50"></td>
                  <td class="px-5 py-5 text-sm flex gap-2 items-center">
                    <a href="{{ route('clients.edit', $client) }}" class="hover:bg-gray-100 dark:bg-gray-100 dark:hover:bg-gray-100 text-white font-bold py-2 px-2 rounded inline-flex items-center transition-colors">
                      <img class="size-6" src="{{ asset('images/edit.svg') }}" alt="">
                    </a>

                    <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-red-200 dark:bg-red-600 hover:bg-red-700 dark:hover:bg-red-500 text-white font-bold py-2 px-2 rounded inline-flex items-center transition-colors" onclick="confirm('Are you sure?')">
                        <img class="size-6" src="{{ asset('images/delete.svg') }}" alt="">
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="pagination" mb-5 sm:mb-0>
              {{ $clients->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>