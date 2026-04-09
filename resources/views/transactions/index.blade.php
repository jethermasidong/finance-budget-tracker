@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto mt-8 px-4">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Financial Overview</h2>
            <p class="text-sm text-gray-500 mt-1">Real-time tracking of your recent transactions</p>
        </div>
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition-all shadow-sm active:scale-95">
            + Add Transaction
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">ID</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Description</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-center">Classification</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Amount</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($transactions as $t)
                    <tr class="hover:bg-gray-50/50 transition-colors cursor-default">
                        <td class="px-6 py-5 text-sm font-mono text-gray-400">
                            #{{ str_pad($t->id, 4, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="px-6 py-5">
                            <div class="text-sm font-semibold text-gray-800">{{ $t->title }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">{{ $t->category }}</div>
                        </td>
                        <td class="px-6 py-5 text-center">
                            @php
                                $statusStyles = match($t->type) {
                                    'income' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
                                    'expense' => 'bg-rose-50 text-rose-700 ring-rose-600/10',
                                    default => 'bg-slate-50 text-slate-600 ring-slate-500/10'
                                };
                            @endphp
                            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-bold ring-1 ring-inset {{ $statusStyles }}">
                                {{ strtoupper($t->type) }}
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right text-sm font-bold {{ $t->type == 'income' ? 'text-emerald-600' : 'text-gray-900' }}">
                            {{ $t->type == 'income' ? '+' : '-' }} ₱{{ number_format($t->amount, 2) }}
                        </td>
                        <td class="px-6 py-5 text-right text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($t->date)->format('M d, Y') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($transactions->isEmpty())
        <div class="py-20 text-center">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400 mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            </div>
            <p class="text-gray-500 font-medium">No transaction records found.</p>
        </div>
        @endif
    </div>
</div>

@endsection