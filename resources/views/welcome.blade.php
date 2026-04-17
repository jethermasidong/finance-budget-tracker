<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Budget Tracker</title>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Geist:wght@300;400;500&family=Geist+Mono:wght@400&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F9F8F5] text-[#111110] font-light min-h-screen flex flex-col">

    <x-header-public />

    <main class="flex-1 grid md:grid-cols-2 max-w-5xl mx-auto w-full px-12 py-20 gap-60 items-center">

        <div>
            <div class="inline-flex items-center gap-2 text-[11px] tracking-widest uppercase text-black bg-blue-100 px-3 py-1.5 rounded-lg mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-800 inline-block"></span>
                Personal finance
            </div>

            <h1 class="text-[clamp(40px,5.5vw,64px)] font-normal leading-[1.07] tracking-tight text-[#111110]">
                Know where<br>your money<br><em class="italic text-blue-500">actually goes</em>
            </h1>

            <p class="mt-5 text-[15px] leading-relaxed text-[#6B6A66] max-w-sm">
                Track income and expenses without the noise. A clean ledger for people who want clarity, not complexity.
            </p>

            <div class="flex items-center gap-4 mt-9">
                <a href="{{ route('register') }}"
                   class="text-sm text-black bg-blue-100 px-6 py-3 rounded-md hover:opacity-75 transition-opacity no-underline">
                    Start for free &rarr;
                </a>
                <a href="{{ route('login') }}"
                   class="text-sm text-black hover:text-[#111110] hover:border-b hover:border-[#111110] transition-colors no-underline">
                    Sign in &rarr;
                </a>
            </div>
        </div>

        <div class="bg-white border border-[#E5E3DC] rounded-xl overflow-hidden">
            <div class="flex justify-between items-center px-7 py-5 border-b border-[#E5E3DC]">
                <span class="text-[10px] tracking-widest uppercase text-black">
                    April 2025
                </span>
                <span class="text-sm text-blue-500 bg-blue-100 px-2.5 py-1 rounded">
                    +₱2,140.00
                </span>
            </div>

            <div class="px-7 py-5 border-b border-[#E5E3DC]">
                <span class="text-sm text-[#B0AFA9] mr-1">PHP</span>
                <span class="text-3xl font-light tracking-tight">6,340.00</span>
            </div>

            <div>
                @foreach ([
                    ['Income',    'Salary',         '+5,200.00', true],
                    ['Housing',   'Rent',            '−1,400.00', false],
                    ['Food',      'Groceries',         '−320.00', false],
                    ['Transport', 'Fuel & transit',    '−180.00', false],
                    ['Freelance', 'Design project',  '+840.00',  true],
                ] as [$cat, $name, $amount, $positive])
                <div class="grid grid-cols-[1fr_auto] items-center px-7 py-3.5 border-b border-[#E5E3DC] last:border-b-0">
                    <div class="flex flex-col gap-0.5">
                        <span class="text-[11px] text-[#B0AFA9]">{{ $cat }}</span>
                        <span class="text-sm text-[#111110]">{{ $name }}</span>
                    </div>
                    <span class="text-sm {{ $positive ? 'text-blue-500' : 'text-[#C0422A]' }}">
                        {{ $amount }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>

    </main>

    <x-footer />

</body>
</html>