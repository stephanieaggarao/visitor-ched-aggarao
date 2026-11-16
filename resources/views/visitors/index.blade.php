@extends('layouts.app')
@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Visitor List</h2>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50"><tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Purpose</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
        </tr></thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($visitors as $visitor)
            <tr>
                <td class="px-6 py-4">{{ $visitor->name }}</td>
                <td class="px-6 py-4">{{ $visitor->purpose }}</td>
                <td class="px-6 py-4"><span class="px-2 py-1 text-xs rounded-full {{ $visitor->status === 'checked_in' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">{{ ucfirst($visitor->status) }}</span></td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('visitors.show', $visitor) }}" class="text-blue-600">View</a>
                    <a href="{{ route('visitors.edit', $visitor) }}" class="text-indigo-600">Edit</a>
                    <form action="{{ route('visitors.destroy', $visitor) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-4 text-center text-gray-500">No visitors found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection