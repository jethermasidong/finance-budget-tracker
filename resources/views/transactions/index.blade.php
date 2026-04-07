@extends('layouts.app')

@section('content')

<div class="bg-white shadow-lg rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-4">Transaction List</h2>

    <table class="min-w-full border border-gray-200">
        <thead>
            <tr class="bg-gray-200 text-center">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Title</th>
                <th class="p-2 border">Category</th>
                <th class="p-2 border">Type</th>
                <th class="p-2 border">Amount</th>
                <th class="p-2 border">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
            <tr class="text-center">
                <td class="border p-2">{{ $t->id }}</td>
                <td class="border p-2">{{ $t->title }}</td>
                <td class="border p-2">{{ $t->category }}</td>
                <td class="border p-2">
                    <span class="
                        @if($t->type == 'income') text-green-600
                        @elseif($t->type == 'expense') text-red-600
                        @else text-blue-600
                        @endif
                    ">
                        {{ ucfirst($t->type) }}
                    </span>
                </td>
                <td class="border p-2">₱{{ number_format($t->amount, 2) }}</td>
                <td class="border p-2">{{ $t->date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection