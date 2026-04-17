@extends('layouts.app')

@section('content')
<x-header />
<div class="max-w-6xl mx-auto mt-12 p-6 animate-in fade-in duration-700">

    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-4xl font-black text-slate-900 tracking-tight">Financial Overview</h1>
            <p class="text-slate-500 mt-2 font-medium">Real-time tracking of your recent transactions</p>
        </div>

        <a href="{{ route('transactions.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-2xl font-bold">
            + New Transaction
        </a>
    </div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white/70 backdrop-blur-md p-4 rounded-3xl shadow-lg border border-slate-100 flex items-center gap-3">
            <div class="bg-green-500/10 p-2 rounded-xl">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight">Income</p>
                <p class="text-lg font-black text-slate-800">₱{{ number_format($totalIncome, 2) }}</p>
            </div>
        </div>

        <div class="bg-white/70 backdrop-blur-md p-4 rounded-3xl shadow-lg border border-slate-100 flex items-center gap-3">
            <div class="bg-red-500/10 p-2 rounded-xl">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight">Expense</p>
                <p class="text-lg font-black text-slate-800">₱{{ number_format($totalExpense, 2) }}</p>
            </div>
        </div>

        <div class="bg-slate-900 p-4 rounded-3xl shadow-lg flex items-center gap-3">
            <div class="bg-white/10 p-2 rounded-xl">
                <svg class="w-5 h-5 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight">Balance</p>
                <p class="text-lg font-black text-white">₱{{ number_format($balance, 2) }}</p>
            </div>
        </div>
    </div>  

    <div class="bg-white/70 backdrop-blur-xl rounded-[2.5rem] shadow-2xl border overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-800 text-white">
                    <th class="px-8 py-5 text-xs font-bold uppercase">Reference</th>
                    <th class="px-8 py-5 text-xs font-bold uppercase">Details</th>
                    <th class="px-8 py-5 text-xs font-bold uppercase">Type</th>
                    <th class="px-8 py-5 text-xs font-bold uppercase text-right">Amount</th>
                    <th class="px-8 py-5 text-xs font-bold uppercase text-right">Date</th>
                    <th class="px-8 py-5 text-xs font-bold uppercase text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">

                @forelse($transactions as $transaction)
                <tr class="hover:bg-indigo-50 transition">

                    <td class="px-8 py-6 text-xs text-slate-400 font-mono">
                        #{{ str_pad($transaction->id, 5, '0', STR_PAD_LEFT) }}
                    </td>

                    <td class="px-8 py-6">
                        <div class="font-bold text-slate-800">
                            {{ $transaction->title }}
                        </div>
                        <div class="text-xs text-slate-400">
                            {{ $transaction->category }}
                        </div>
                    </td>

                    <td class="px-8 py-6">
                        @if($transaction->type === 'income')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                                Income
                            </span>
                        @elseif($transaction->type === 'expense')
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">
                                Expense
                            </span>
                        @else
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">
                                Budget
                            </span>
                        @endif
                    </td>

                    <td class="px-8 py-6 text-right font-bold">
                        {{ $transaction->type === 'income' ? '+' : '-' }}
                        ₱{{ number_format($transaction->amount, 2) }}
                    </td>

                    <td class="px-8 py-6 text-right text-sm text-slate-500">
                        {{ $transaction->date->format('M d, Y') }}
                    </td>
                    <td class="px-8 py-6 text-right">
                        <div class="flex gap-3 justify-end">

                            <a href="{{ route('transactions.edit', $transaction->id) }}"
                               class="text-blue-500 hover:underline">
                                Edit
                            </a>

                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center py-10 text-gray-400">
                        No transactions found.
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</div>
@endsection