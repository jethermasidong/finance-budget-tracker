@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-12 p-6 animate-in fade-in slide-in-from-bottom-4 duration-700">
    <div class="mb-8">
        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Edit Transaction</h2>
        <p class="text-slate-500 mt-2 font-medium italic">Reference ID: #{{ str_pad($transaction->id, 5, '0', STR_PAD_LEFT) }}</p>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/60 border border-slate-100 p-10">
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="col-span-2">
                    <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-3 ml-1">Transaction Title</label>
                    <input type="text" name="title" value="{{ $transaction->title }}" 
                           class="w-full bg-white border-2 border-slate-200 rounded-2xl p-4 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all font-bold text-slate-800 shadow-sm outline-none">
                </div>

                <div>
                    <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-3 ml-1">Category</label>
                    <input type="text" name="category" value="{{ $transaction->category }}" 
                           class="w-full bg-white border-2 border-slate-200 rounded-2xl p-4 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all font-bold text-slate-800 shadow-sm outline-none">
                </div>

                <div>
                    <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-3 ml-1">Type</label>
                    <div class="relative">
                        <select name="type" class="w-full bg-white border-2 border-slate-200 rounded-2xl p-4 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all font-bold text-slate-800 shadow-sm outline-none appearance-none">
                            <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                            <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
                            <option value="budget" {{ $transaction->type == 'budget' ? 'selected' : '' }}>Budget</option>
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-3 ml-1">Amount ($)</label>
                    <input type="number" step="0.01" name="amount" value="{{ $transaction->amount }}" 
                           class="w-full bg-white border-2 border-slate-200 rounded-2xl p-4 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all font-black text-indigo-600 shadow-sm text-xl outline-none">
                </div>

                <div>
                    <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-3 ml-1">Transaction Date</label>
                    <input type="date" name="date" value="{{ $transaction->date->format('Y-m-d') }}" 
                           class="w-full bg-white border-2 border-slate-200 rounded-2xl p-4 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all font-bold text-slate-800 shadow-sm outline-none">
                </div>

                <div class="col-span-2">
                    <label class="block text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-3 ml-1">Optional Notes</label>
                    <textarea name="description" rows="4" 
                              class="w-full bg-white border-2 border-slate-200 rounded-2xl p-4 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 transition-all font-medium text-slate-700 shadow-sm outline-none">{{ $transaction->description }}</textarea>
                </div>
            </div>

            <div class="flex items-center justify-end gap-6 pt-6">
                <a href="{{ route('transactions.index') }}" class="text-slate-400 hover:text-slate-600 font-bold text-sm transition-colors no-underline">Discard Changes</a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-12 py-4 rounded-2xl font-black transition-all hover:scale-105 active:scale-95 shadow-xl shadow-indigo-200 cursor-pointer">
                    Save Updates
                </button>
            </div>
        </form>
    </div>
</div>
@endsection