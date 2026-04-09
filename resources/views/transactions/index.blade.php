@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto mt-8 px-4">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-md font-semibold text-neutral-800 tracking-widest uppercase">Financial Transaction</h2>
            <p class="text-md text-neutral-400 mt-0.5">Manage and track your financial activity</p>
        </div>
        <button class="bg-neutral-900 hover:bg-neutral-700 text-neutral-100 px-4 py-2 text-xs font-medium tracking-wide uppercase transition-colors">
            + New Transaction
        </button>
    </div>

    <div class="border border-neutral-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-neutral-200 bg-neutral-50">
                    <th class="px-6 py-3 text-md font-semibold text-neutral-400 uppercase tracking-widest">Reference</th>
                    <th class="px-6 py-3 text-md font-semibold text-neutral-400 uppercase tracking-widest">Details</th>
                    <th class="px-6 py-3 text-md font-semibold text-neutral-400 uppercase tracking-widest text-center">Type</th>
                    <th class="px-6 py-3 text-md font-semibold text-neutral-400 uppercase tracking-widest text-right">Amount</th>
                    <th class="px-6 py-3 text-md font-semibold text-neutral-400 uppercase tracking-widest text-right">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-100">
                @foreach($transactions as $t)
                <tr class="hover:bg-neutral-50 transition-colors">
                    <td class="px-6 py-4 text-md font-mono text-neutral-300">
                        #{{ str_pad($t->id, 4, '0', STR_PAD_LEFT) }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-md font-medium text-neutral-800">{{ $t->title }}</div>
                        <div class="text-md text-neutral-400">{{ $t->category }}</div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @php
                            $styles = [
                                'income' => 'text-emerald-600 bg-emerald-50',
                                'expense' => 'text-rose-500 bg-rose-50',
                                'default' => 'text-neutral-500 bg-neutral-100'
                            ];
                            $currentStyle = $styles[$t->type] ?? $styles['default'];
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 text-md font-medium {{ $currentStyle }}">
                            {{ ucfirst($t->type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right text-md font-semibold {{ $t->type == 'expense' ? 'text-neutral-800' : 'text-emerald-600' }}">
                        {{ $t->type == 'expense' ? '-' : '+' }} ₱{{ number_format($t->amount, 2) }}
                    </td>
                    <td class="px-6 py-4 text-right text-md text-neutral-400">
                        {{ \Carbon\Carbon::parse($t->date)->format('M d, Y') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($transactions->isEmpty())
        <div class="py-12 text-center">
            <p class="text-xs text-neutral-300 tracking-wide uppercase">No transactions found.</p>
        </div>
        @endif
    </div>
</div>

@endsection