<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Tracker</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #2c3e50;
            color: #bdc3c7;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #34495e;
        }

        header h1 {
            margin: 0;
            font-size: 1.2rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        nav a {
            color: #bdc3c7;
            text-decoration: none;
            margin-left: 15px;
            font-size: 0.9rem;
        }

        nav a:hover {
            color: #ecf0f1;
        }

        .container {
            padding: 20px;
            flex: 1;
        }
    </style>
</head>
<body>

<header>
    <h1>Budget<span>Tracker</span></h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="expenses.php">Expenses</a>
        <a href="reports.php">Reports</a>
        <a href="logout.php" style="opacity: 0.7;">Logout</a>
    </nav>
</header>

<div class="container">