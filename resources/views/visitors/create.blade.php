@extends('layouts.app')
@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Visitor</h2>
    <form action="{{ route('visitors.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div><label class="block text-sm font-medium text-gray-700">Name *</label><input type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('name') border-red-500 @enderror"></div>
            <div><label class="block text-sm font-medium text-gray-700">Email</label><input type="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div><label class="block text-sm font-medium text-gray-700">Phone</label><input type="text" name="phone" value="{{ old('phone') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div><label class="block text-sm font-medium text-gray-700">Company</label><input type="text" name="company" value="{{ old('company') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div><label class="block text-sm font-medium text-gray-700">Position</label><input type="text" name="position" value="{{ old('position') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div><label class="block text-sm font-medium text-gray-700">Purpose *</label><input type="text" name="purpose" value="{{ old('purpose') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('purpose') border-red-500 @enderror"></div>
            <div><label class="block text-sm font-medium text-gray-700">Host Name *</label><input type="text" name="host_name" value="{{ old('host_name') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('host_name') border-red-500 @enderror"></div>
            <div><label class="block text-sm font-medium text-gray-700">Host Department</label><input type="text" name="host_department" value="{{ old('host_department') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700">Address</label><input type="text" name="address" value="{{ old('address') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></div>
            <div class="md:col-span-2"><label class="block text-sm font-medium text-gray-700">Notes</label><textarea name="notes" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md p-2">{{ old('notes') }}</textarea></div>
        </div>
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('visitors.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Save Visitor</button>
        </div>
    </form>
</div>
@endsection