<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $query = Visitor::query();
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
        }
        $visitors = $query->latest()->paginate(10);
        return view('visitors.index', compact('visitors'));
    }

    public function create() { return view('visitors.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:255',
            'purpose' => 'required|string|max:255',
            'host_name' => 'required|string|max:255',
            'host_department' => 'nullable|string|max:100',
            'notes' => 'nullable|string',
        ]);
        $validated['status'] = 'expected';
        $validated['check_in'] = now();
        Visitor::create($validated);
        return redirect()->route('visitors.index')->with('success', 'Visitor added successfully!');
    }

    public function show(Visitor $visitor) { return view('visitors.show', compact('visitor')); }
    public function edit(Visitor $visitor) { return view('visitors.edit', compact('visitor')); }

    public function update(Request $request, Visitor $visitor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:255',
            'purpose' => 'required|string|max:255',
            'host_name' => 'required|string|max:255',
            'host_department' => 'nullable|string|max:100',
            'status' => 'required|in:expected,checked_in,checked_out,cancelled',
            'notes' => 'nullable|string',
        ]);
        $visitor->update($validated);
        return redirect()->route('visitors.index')->with('success', 'Visitor updated successfully!');
    }

    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->route('visitors.index')->with('success', 'Visitor deleted successfully!');
    }
}