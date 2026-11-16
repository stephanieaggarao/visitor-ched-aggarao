@extends('layouts.app')
@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    <div class="flex justify-between items-center mb-6 border-b pb-4">
        <h2 class="text-2xl font-bold text-gray-800">Visitor Details</h2>
        <div class="space-x-2">
            <a href="{{ route('visitors.edit', $visitor) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm">Edit</a>
            <form action="{{ route('visitors.destroy', $visitor) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 text-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Full Name</p><p class="text-lg font-medium text-gray-900">{{ $visitor->name }}</p></div>
        <div class="border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Email</p><p class="text-lg font-medium text-gray-900">{{ $visitor->email ?? 'N/A' }}</p></div>
        <div class="border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Phone</p><p class="text-lg font-medium text-gray-900">{{ $visitor->phone ?? 'N/A' }}</p></div>
        <div class="border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Company</p><p class="text-lg font-medium text-gray-900">{{ $visitor->company ?? 'N/A' }}</p></div>
        <div class="border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Position</p><p class="text-lg font-medium text-gray-900">{{ $visitor->position ?? 'N/A' }}</p></div>
        <div class="border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Purpose of Visit</p><p class="text-lg font-medium text-gray-900">{{ $visitor->purpose ?? 'N/A' }}</p></div>
        <div class="border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Host Name</p><p class="text-lg font-medium text-gray-900">{{ $visitor->host_name ?? 'N/A' }}</p></div>
        <div class="border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Host Department</p><p class="text-lg font-medium text-gray-900">{{ $visitor->host_department ?? 'N/A' }}</p></div>
        <div class="border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Status</p><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $visitor->status === 'checked_in' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">{{ ucfirst(str_replace('_', ' ', $visitor->status)) }}</span></div>
        <div class="border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Check In Time</p><p class="text-lg font-medium text-gray-900">{{ $visitor->check_in ? $visitor->check_in->format('M d, Y h:i A') : 'N/A' }}</p></div>
        <div class="md:col-span-2 border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Address</p><p class="text-lg font-medium text-gray-900">{{ $visitor->address ?? 'N/A' }}</p></div>
        <div class="md:col-span-2 border-b border-gray-200 pb-2"><p class="text-sm text-gray-500">Notes</p><p class="text-lg font-medium text-gray-900">{{ $visitor->notes ?? 'No notes provided.' }}</p></div>
    </div>
    <div class="mt-6"><a href="{{ route('visitors.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">← Back to List</a></div>
</div>
@endsection