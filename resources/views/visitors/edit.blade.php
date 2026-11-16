@extends('layouts.app')
@section('content')
<div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Visitor: {{ $visitor->name }}</h2>
    <form action="{{ route('visitors.update', $visitor) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-4"><label class="block text-sm font-medium">Name *</label><input type="text" name="name" value="{{ $visitor->name }}" required class="mt-1 block w-full border rounded p-2"></div>
        <div class="mb-4"><label class="block text-sm font-medium">Purpose *</label><input type="text" name="purpose" value="{{ $visitor->purpose }}" required class="mt-1 block w-full border rounded p-2"></div>
        <div class="mb-4">
            <label class="block text-sm font-medium">Status</label>
            <select name="status" class="mt-1 block w-full border rounded p-2">
                <option value="expected" {{ $visitor->status == 'expected' ? 'selected' : '' }}>Expected</option>
                <option value="checked_in" {{ $visitor->status == 'checked_in' ? 'selected' : '' }}>Checked In</option>
                <option value="checked_out" {{ $visitor->status == 'checked_out' ? 'selected' : '' }}>Checked Out</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Visitor</button>
        <a href="{{ route('visitors.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </form>
</div>
@endsection