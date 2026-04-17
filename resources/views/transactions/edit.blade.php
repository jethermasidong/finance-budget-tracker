@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-4">Edit Transaction</h2>

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $transaction->title }}" class="w-full border p-2 mb-3 rounded">

        <input type="text" name="category" value="{{ $transaction->category }}" class="w-full border p-2 mb-3 rounded">

        <select name="type" class="w-full border p-2 mb-3 rounded">
            <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
            <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
            <option value="budget" {{ $transaction->type == 'budget' ? 'selected' : '' }}>Budget</option>
        </select>

        <input type="number" name="amount" value="{{ $transaction->amount }}" class="w-full border p-2 mb-3 rounded">

        <input type="date" name="date" value="{{ $transaction->date->format('Y-m-d') }}" class="w-full border p-2 mb-3 rounded">

        <textarea name="description" class="w-full border p-2 mb-3 rounded">{{ $transaction->description }}</textarea>

        <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection