@extends('layouts.app')
@section('content')
<div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Add New Visitor</h2>
    <form action="{{ route('visitors.store') }}" method="POST">
        @csrf
        <div class="mb-4"><label class="block text-sm font-medium">Name *</label><input type="text" name="name" required class="mt-1 block w-full border rounded p-2"></div>
        <div class="mb-4"><label class="block text-sm font-medium">Purpose *</label><input type="text" name="purpose" required class="mt-1 block w-full border rounded p-2"></div>
        <div class="mb-4"><label class="block text-sm font-medium">Host Name *</label><input type="text" name="host_name" required class="mt-1 block w-full border rounded p-2"></div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Visitor</button>
        <a href="{{ route('visitors.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </form>
</div>
@endsection