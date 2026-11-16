@extends('layouts.app')
@section('content')
<div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-4 border-b pb-2">
        <h2 class="text-2xl font-bold">Visitor Details</h2>
        <div class="space-x-2">
            <a href="{{ route('visitors.edit', $visitor) }}" class="bg-indigo-600 text-white px-3 py-1 rounded text-sm">Edit</a>
            <form action="{{ route('visitors.destroy', $visitor) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm" onclick="return confirm('Delete?')">Delete</button>
            </form>
        </div>
    </div>
    <p class="mb-2"><strong>Name:</strong> {{ $visitor->name }}</p>
    <p class="mb-2"><strong>Purpose:</strong> {{ $visitor->purpose }}</p>
    <p class="mb-2"><strong>Host:</strong> {{ $visitor->host_name }}</p>
    <p class="mb-4"><strong>Status:</strong> {{ ucfirst($visitor->status) }}</p>
    <a href="{{ route('visitors.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">← Back to List</a>
</div>
@endsection