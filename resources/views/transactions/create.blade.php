<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Create Transaction') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
          <form action="{{ isset($transaction) ? route('transactions.update', $transaction) : route('transactions.store') }}" method="POST">
            @csrf
            @if(isset($transaction))
            @method('PUT')
            @endif

            <div class="mb-4">
              <label for="client_id" class="block text-sm font-bold mb-2">Client:</label>
              <select name="client_id" id="client_id" class="bg-gray-100 dark:bg-gray-800 shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ isset($transaction) && $transaction->client_id == $client->id ? 'selected' : '' }}>
                  {{ $client->first_name }} {{ $client->last_name }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="mb-4">
              <label for="transaction_date" class="block text-sm font-bold mb-2">Transaction Date:</label>
              <input type="date" name="transaction_date" id="transaction_date" class="bg-gray-100 dark:bg-gray-800 shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('transaction_date', $transaction->transaction_date ?? '') }}" required>
            </div>

            <div class="mb-4">
              <label for="amount" class="block text-sm font-bold mb-2">Amount:</label>
              <input type="number" name="amount" id="amount" step="0.01" class="bg-gray-100 dark:bg-gray-800 shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('amount', $transaction->amount ?? '') }}" required>
            </div>

            <div class="mb-4">
              <button type="submit" class="bg-green-500 dark:bg-green-600 hover:bg-green-600 dark:hover:bg-green-500 text-white font-bold py-2 px-4 rounded inline-flex items-center gap-2 transition-colors">
                {{ isset($transaction) ? 'Update' : 'Create' }} Transaction
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>