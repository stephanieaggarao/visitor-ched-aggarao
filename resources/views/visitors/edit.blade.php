@extends('layouts.app')
@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Visitor: {{ $visitor->name }}</h2>
    <form action="{{ route('visitors.update', $visitor) }}" method="POST">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div><label class="block text-sm font-medium text-gray-700">Name *</label><input type="text" name="name" value="{{ old('name', $visitor->name) }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div><label class="block text-sm font-medium text-gray-700">Email</label><input type="email" name="email" value="{{ old('email', $visitor->email) }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div><label class="block text-sm font-medium text-gray-700">Phone</label><input type="text" name="phone" value="{{ old('phone', $visitor->phone) }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div><label class="block text-sm font-medium text-gray-700">Company</label><input type="text" name="company" value="{{ old('company', $visitor->company) }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div><label class="block text-sm font-medium text-gray-700">Position</label><input type="text" name="position" value="{{ old('position', $visitor->position) }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div><label class="block text-sm font-medium text-gray-700">Purpose *</label><input type="text" name="purpose" value="{{ old('purpose', $visitor->purpose) }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div><label class="block text-sm font-medium text-gray-700">Host Name *</label><input type="text" name="host_name" value="{{ old('host_name', $visitor->host_name) }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div><label class="block text-sm font-medium text-gray-700">Host Department</label><input type="text" name="host_department" value="{{ old('host_department', $visitor->host_department) }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Status *</label>
                <select name="status" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    <option value="expected" {{ $visitor->status == 'expected' ? 'selected' : '' }}>Expected</option>
                    <option value="checked_in" {{ $visitor->status == 'checked_in' ? 'selected' : '' }}>Checked In</option>
                    <option value="checked_out" {{ $visitor->status == 'checked_out' ? 'selected' : '' }}>Checked Out</option>
                    <option value="cancelled" {{ $visitor->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700">Address</label><input type="text" name="address" value="{{ old('address', $visitor->address) }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700">Notes</label><textarea name="notes" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md p-2">{{ old('notes', $visitor->notes) }}</textarea></div>
        </div>
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('visitors.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update Visitor</button>
        </div>
    </form>
</div>
@endsection