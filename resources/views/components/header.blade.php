<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

<header class="bg-slate-800 text-slate-300 border-b-4 border-slate-700 px-8 py-4 flex justify-between items-center shadow-md">
    <h1 class="text-xl font-bold tracking-widest uppercase">
        Budget<span class="text-white">Tracker</span>
    </h1>
    <nav class="space-x-6 text-sm font-medium">
        <a href="index.php" class="hover:text-white transition-colors">Dashboard</a>
        <a href="expenses.php" class="hover:text-white transition-colors">Expenses</a>
        <a href="reports.php" class="hover:text-white transition-colors">Reports</a>
        <a href="logout.php" class="opacity-60 hover:opacity-100 transition-opacity">Logout</a>
    </nav>
</header>

<main class="container mx-auto p-6 flex-grow">