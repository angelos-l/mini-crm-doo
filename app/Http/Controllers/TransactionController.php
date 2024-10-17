<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Client;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $transactions = Transaction::paginate(10);
    return view('transactions.index', compact('transactions'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $clients = Client::all();
    return view('transactions.create', compact('clients'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //Use laravel validation
    $validatedData = $request->validate([
      'client_id' => 'required|exists:clients,id',
      'transaction_date' => 'required|date',
      'amount' => 'required|numeric|min:0',
    ]);

    Transaction::create($validatedData);

    return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Transaction $transaction)
  {
    return view('transactions.show', compact('transaction'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Transaction $transaction)
  {
    $clients = Client::all();
    return view('transactions.edit', compact('transaction', 'clients'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Transaction $transaction)
  {
    //use laravel validation
    $validatedData = $request->validate([
      'client_id' => 'required|exists:clients,id',
      'transaction_date' => 'required|date',
      'amount' => 'required|numeric|min:0',
    ]);

    $transaction->update($validatedData);

    return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
  }

  public function destroy(Transaction $transaction)
  {
    $transaction->delete();

    return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
  }
}
