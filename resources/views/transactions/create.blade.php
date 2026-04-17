@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-4">Add Transaction</h2>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <input type="text" name="title" placeholder="Title" class="w-full border p-2 mb-3 rounded" required>

        <input type="text" name="category" placeholder="Category" class="w-full border p-2 mb-3 rounded" required>

        <select name="type" class="w-full border p-2 mb-3 rounded">
            <option value="income">Income</option>
            <option value="expense">Expense</option>
            <option value="budget">Budget</option>
        </select>

        <input type="number" name="amount" placeholder="Amount" class="w-full border p-2 mb-3 rounded" required>

        <input type="date" name="date" class="w-full border p-2 mb-3 rounded" required>

        <textarea name="description" placeholder="Description" class="w-full border p-2 mb-3 rounded"></textarea>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection