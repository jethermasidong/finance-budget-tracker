@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto mt-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 tracking-tight">Financial Overview</h2>
            <p class="text-sm text-gray-500">Manage and track your recent activity</p>
        </div>
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium transition shadow-sm">
            + New Transaction
        </button>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-100">
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider">Reference</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider">Transaction Details</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">Type</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-right">Amount</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-right">Processed Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($transactions as $t)
                <tr class="hover:bg-gray-50/80 transition-colors group">
                    <td class="px-6 py-4 text-sm font-mono text-gray-400">
                        #{{ str_pad($t->id, 4, '0', STR_PAD_LEFT) }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $t->title }}</div>
                        <div class="text-xs text-gray-500">{{ $t->category }}</div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @php
                            $styles = [
                                'income' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
                                'expense' => 'bg-rose-50 text-rose-700 ring-rose-600/10',
                                'default' => 'bg-slate-50 text-slate-600 ring-slate-500/10'
                            ];
                            $currentStyle = $styles[$t->type] ?? $styles['default'];
                        @endphp
                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium ring-1 ring-inset {{ $currentStyle }}">
                            {{ ucfirst($t->type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right text-sm font-semibold {{ $t->type == 'expense' ? 'text-gray-900' : 'text-emerald-600' }}">
                        {{ $t->type == 'expense' ? '-' : '+' }} ₱{{ number_format($t->amount, 2) }}
                    </td>
                    <td class="px-6 py-4 text-right text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($t->date)->format('M d, Y') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($transactions->isEmpty())
        <div class="py-12 text-center">
            <p class="text-gray-400 text-sm">No transactions found for this period.</p>
        </div>
        @endif
    </div>
</div>

@endsection