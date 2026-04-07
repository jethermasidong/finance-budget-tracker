<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'title' => 'Salary',
                'description' => 'Monthly salary',
                'amount' => 25000,
                'type' => 'income',
                'category' => 'Salary',
                'date' => '2026-04-01',
            ],
            [
                'title' => 'Groceries',
                'description' => 'Supermarket shopping',
                'amount' => 1500,
                'type' => 'expense',
                'category' => 'Food',
                'date' => '2026-04-02',
            ],
            [
                'title' => 'Electric Bill',
                'description' => 'Monthly electricity payment',
                'amount' => 2200,
                'type' => 'expense',
                'category' => 'Bills',
                'date' => '2026-04-03',
            ],
            [
                'title' => 'Internet',
                'description' => 'WiFi subscription',
                'amount' => 1500,
                'type' => 'expense',
                'category' => 'Bills',
                'date' => '2026-04-03',
            ],
            [
                'title' => 'Freelance Work',
                'description' => 'Payment from side project',
                'amount' => 5000,
                'type' => 'income',
                'category' => 'Salary',
                'date' => '2026-04-04',
            ],
            [
                'title' => 'Transportation',
                'description' => 'Gas and commute',
                'amount' => 800,
                'type' => 'expense',
                'category' => 'Transport',
                'date' => '2026-04-05',
            ],
            [
                'title' => 'Dining Out',
                'description' => 'Restaurant dinner',
                'amount' => 1200,
                'type' => 'expense',
                'category' => 'Food',
                'date' => '2026-04-05',
            ],
            [
                'title' => 'Shopping',
                'description' => 'Clothes and accessories',
                'amount' => 2000,
                'type' => 'expense',
                'category' => 'Shopping',
                'date' => '2026-04-06',
            ],
            [
                'title' => 'Monthly Budget',
                'description' => 'Budget allocation for Food',
                'amount' => 5000,
                'type' => 'budget',
                'category' => 'Food',
                'date' => '2026-04-01',
            ],
            [
                'title' => 'Bonus',
                'description' => 'Company bonus',
                'amount' => 10000,
                'type' => 'income',
                'category' => 'Salary',
                'date' => '2026-04-06',
            ],
        ];

        foreach ($records as $record) {
            Transaction::create($record);
        }
    }
}