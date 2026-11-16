<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHED Visitor Log</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-800 text-white shadow-lg p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('visitors.index') }}" class="font-bold text-xl">CHED Visitor Log</a>
            <div class="space-x-4">
                <a href="{{ route('visitors.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">All Visitors</a>
                <a href="{{ route('visitors.create') }}" class="bg-green-500 hover:bg-green-600 px-3 py-2 rounded">+ Add Visitor</a>
            </div>
        </div>
    </nav>
    <main class="max-w-7xl mx-auto py-6 px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>