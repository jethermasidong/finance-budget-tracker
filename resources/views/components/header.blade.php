<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

<header class="sticky top-4 z-50 mt-4 mx-4 bg-slate-800 text-slate-300 border border-slate-700 px-8 py-4 flex justify-between items-center shadow-lg rounded-xl">
    <h1 class="text-xl font-bold tracking-widest uppercase">
        Budget<span class="text-white font-black">Tracker</span>
    </h1>
    <nav class="space-x-6 text-sm font-medium">
        <a href="index.php" class="hover:text-white transition-all duration-200">Dashboard</a>
        <a href="expenses.php" class="hover:text-white transition-all duration-200">Expenses</a>
        <a href="reports.php" class="hover:text-white transition-all duration-200">Reports</a>
        <a href="logout.php" class="bg-slate-700/50 px-3 py-1.5 rounded-lg opacity-70 hover:opacity-100 hover:bg-slate-700 transition-all">Logout</a>
    </nav>
</header>

<main class="container mx-auto p-8 flex-grow">