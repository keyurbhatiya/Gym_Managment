<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    // Equipment functions

    public function equipmentIndex()
    {
        return view('admin.equipments.equipment-entry-form');
    }

    public function equipmentStore(Request $request)
    {
        $validatedData = $request->validate([
            'equipment' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'dop' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'vendor' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'cost_per_item' => 'required|numeric|min:0',
        ]);

        Equipment::create($validatedData);

        return redirect()->back()->with('success', 'Equipment details submitted successfully.');
    }

    public function equipmentList()
    {
        $equipment = Equipment::all();
        return view('admin.equipments.equipment-list', compact('equipment'));
    }

    public function equipmentEdit($id)
    {
        $equipment = Equipment::findOrFail($id);
        return view('admin.equipments.equipment-edit', compact('equipment'));
    }

    public function equipmentUpdate(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);

        $request->validate([
            'equipment' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'dop' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'vendor' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'cost_per_item' => 'required|numeric|min:0',
        ]);

        $equipment->update($request->all());

        return redirect()->route('equipment.list')->with('success', 'Equipment details updated successfully.');
    }

    public function equipmentDestroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();

        return redirect()->route('equipment.list')->with('success', 'Equipment deleted successfully.');
    }



}
