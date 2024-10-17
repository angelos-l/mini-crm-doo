<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('users')->truncate();
    DB::table('transactions')->truncate();
    DB::table('clients')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    // Add the admin user
    $this->call(AdminSeeder::class);

    // Add the clients and transactions
    Client::factory()->count(10)->create()->each(function ($client) {
      Transaction::factory()->count(5)->create(['client_id' => $client->id]);
    });
  }
}
