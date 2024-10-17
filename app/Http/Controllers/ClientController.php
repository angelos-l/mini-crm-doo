<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $clients = Client::paginate(10);
    return view('clients.index', compact('clients'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('clients.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //Use laravel validation
    $validatedData = $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|email|unique:clients,email',
      'avatar' => 'nullable|image|dimensions:min_width=100,min_height=100',
    ]);

    //Check avatar
    if ($request->hasFile('avatar')) {
      $path = $request->file('avatar')->store('avatars', 'public');
      $validatedData['avatar'] = $path; // Ensure this is being saved correctly
    }

    Client::create($validatedData);

    return redirect()->route('clients.index')->with('success', 'Client created successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    return view('clients.edit', compact('client'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Client $client)
  {
    return view('clients.edit', compact('client'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Client $client)
  {
    //Use laravel validation
    $validatedData = $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|email|unique:clients,email,' . $client->id,
      'avatar' => 'nullable|image|dimensions:min_width=100,min_height=100',
    ]);

    //Check avatar
    if ($request->hasFile('avatar')) {
      if ($client->avatar) {
        Storage::disk('public')->delete($client->avatar);
      }

      $path = $request->file('avatar')->store('avatars', 'public');
      $validatedData['avatar'] = $path;
    }

    $client->update($validatedData);

    return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Client $client)
  {
    if ($client->avatar) {
      Storage::disk('public')->delete($client->avatar);
    }

    $client->delete();

    return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
  }
}
