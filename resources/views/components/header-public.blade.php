<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

<header class="sticky top-4 z-50 mt-4 w-full max-w-5xl mx-auto bg-white text-black border border-slate-500 px-8 py-4 flex justify-between items-center shadow-lg rounded-xl">
    <a href="{{ url('/') }}" class="text-xl font-bold tracking-widest uppercase no-underline">
        KWAR<span class="text-xl text-blue-400">TA</span>
    </a>
    <nav class="space-x-6 text-sm font-medium">
        <a href="{{ url('/register') }}" class="hover:text-white transition-all duration-200">Signup</a>
        <a href="{{ url('/login') }}" class="bg-blue-100 px-3 py-1.5 rounded-lg text-black hover:opacity-100 hover:bg-blue-400 transition-all">Login</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </nav>
</header>

<main class="container mx-auto p-8 flex-grow">