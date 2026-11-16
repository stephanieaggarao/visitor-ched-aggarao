@extends('layouts.app')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Visitor List</h2>
        <form action="{{ route('visitors.index') }}" method="GET" class="flex space-x-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or company..." class="border border-gray-300 rounded-md px-4 py-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Search</button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Company / Position</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Purpose</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Host</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($visitors as $visitor)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $visitor->name }}</div>
                        <div class="text-sm text-gray-500">{{ $visitor->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $visitor->company ?? 'N/A' }}</div>
                        <div class="text-sm text-gray-500">{{ $visitor->position ?? 'N/A' }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $visitor->purpose ?? 'N/A' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $visitor->host_name ?? 'N/A' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $visitor->status === 'checked_in' ? 'bg-green-100 text-green-800' : 
                               ($visitor->status === 'checked_out' ? 'bg-gray-100 text-gray-800' : 
                               ($visitor->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800')) }}">
                            {{ ucfirst(str_replace('_', ' ', $visitor->status)) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <a href="{{ route('visitors.show', $visitor) }}" class="text-blue-600 hover:text-blue-900">View</a>
                        <a href="{{ route('visitors.edit', $visitor) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('visitors.destroy', $visitor) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">No visitors found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $visitors->links() }}</div>
</div>
@endsection