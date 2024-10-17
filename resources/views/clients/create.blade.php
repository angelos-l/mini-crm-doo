<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Create Client') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
          <form action="{{ isset($client) ? route('clients.update', $client) : route('clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($client))
            @method('PUT')
            @endif

            <div class="mb-4">
              <label for="first_name" class="block text-sm font-bold mb-2">First Name:</label>
              <input type="text" name="first_name" id="first_name" class="bg-gray-100 dark:bg-gray-800 shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('first_name', $client->first_name ?? '') }}" required>
            </div>

            <div class="mb-4">
              <label for="last_name" class="block text-sm font-bold mb-2">Last Name:</label>
              <input type="text" name="last_name" id="last_name" class="bg-gray-100 dark:bg-gray-800 shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('last_name', $client->last_name ?? '') }}" required>
            </div>

            <div class="mb-4">
              <label for="email" class="block text-sm font-bold mb-2">Email:</label>
              <input type="email" name="email" id="email" class="bg-gray-100 dark:bg-gray-800 shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('email', $client->email ?? '') }}" required>
            </div>

            <div class="mb-4">
              <label for="avatar" class="block text-sm font-bold mb-2">Avatar:</label>
              <input type="file" name="avatar" id="avatar" class="bg-gray-100 dark:bg-gray-800 shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" {{ isset($client) ? '' : 'required' }}>
              @if(isset($client))
              <img src="{{ asset('storage/'.$client->avatar) }}" class="mt-4" width="100">
              @endif
            </div>

            <div class="mb-4">
              <button type="submit" class="bg-green-500 dark:bg-green-600 hover:bg-green-600 dark:hover:bg-green-500 text-white font-bold py-2 px-4 rounded inline-flex items-center gap-2 transition-colors">
                {{ isset($client) ? 'Update' : 'Create' }} Client
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>