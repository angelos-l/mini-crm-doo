<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
  protected $model = Transaction::class;

  //Prepare fakerPHP

  public function definition()
  {
    return [
      'client_id' => Client::factory(),
      'transaction_date' => $this->faker->date(),
      'amount' => $this->faker->randomFloat(2, 10, 1000),
    ];
  }
}
