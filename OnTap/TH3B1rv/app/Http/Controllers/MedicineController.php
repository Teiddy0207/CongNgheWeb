<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    public function create()
    {
        return view('medicines.create');    
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
            'brand' => 'nullable|string|max:100',
            'dosage' => 'required|string|max:50',
            'form' => 'required|string|max:50',
            'price' => 'required|numeric|min:0', 
            'stock' => 'required|integer|min:0', 
        ]);

        Medicine :: create($request -> all());
        return redirect()->route('medicines.index')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $medicine = Medicine::find($id);
        return view('medicines.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
            'brand' => 'nullable|string|max:100',
            'dosage' => 'required|string|max:50',
            'form' => 'required|string|max:50',
            'price' => 'required|numeric|min:0', 
            'stock' => 'required|integer|min:0', 
        ]);
        $medicine = Medicine::find($id);
        $medicine->update($request->all());
        return redirect()->route('medicines.index')->with('success', 'Post update successs');
    }

    public function destroy($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();
        return redirect()->route('medicines.index')
            ->with('success', 'Post deleted successfully');
    }
}
