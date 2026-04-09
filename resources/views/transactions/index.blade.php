@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-12 p-6 animate-in fade-in duration-700">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-4xl font-black text-slate-900 tracking-tight">Financial Overview</h1>
            <p class="text-slate-500 mt-2 font-medium">Real-time tracking of your recent transactions</p>
        </div>
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-2xl font-bold transition-all hover:scale-105 active:scale-95 shadow-xl shadow-indigo-200 flex items-center gap-2 cursor-pointer">
            <span class="text-2xl leading-none">+</span> New Transaction
        </button>
    </div>

    <div class="bg-white/70 backdrop-blur-xl rounded-[2.5rem] shadow-2xl shadow-slate-200/60 border border-white overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-800 text-white">
                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em]">Reference</th>
                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em]">Details</th>
                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em]">Type</th>
                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-right">Amount</th>
                    <th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-right">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($transactions as $transaction)
                    <tr class="hover:bg-indigo-50/30 transition-all group">
                        <td class="px-8 py-6 font-mono text-xs text-slate-400">#{{ str_pad($transaction->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-8 py-6">
                            <div class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">{{ $transaction->title }}</div>
                            <div class="text-xs text-slate-400 font-medium">{{ $transaction->category }}</div>
                        </td>
                        <td class="px-8 py-6">
                            @if(strtolower($transaction->type) == 'income')
                                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase bg-emerald-100 text-emerald-700 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-2"></span> Income
                                </span>
                            @else
                                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase bg-rose-100 text-rose-700 border border-rose-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500 mr-2"></span> Expense
                                </span>
                            @endif
                        </td>
                        <td class="px-8 py-6 text-right font-black {{ strtolower($transaction->type) == 'income' ? 'text-emerald-600' : 'text-slate-900' }}">
                            {{ strtolower($transaction->type) == 'income' ? '+' : '-' }} ${{ number_format($transaction->amount, 2) }}
                        </td>
                        <td class="px-8 py-6 text-right text-sm text-slate-500 italic">
                            {{ $transaction->date->format('M d, Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-24 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-6 text-4xl shadow-inner">empty</div>
                                <p class="text-slate-500 font-bold text-lg">No transactions yet</p>
                                <p class="text-slate-400">Start tracking your budget by adding a record.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection