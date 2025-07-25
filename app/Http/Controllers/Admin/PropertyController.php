<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('user')->paginate(10);
        return view('admin.properties.index', compact('properties'));
    }


    public function edit(Property $property)
    {
        $users = User::where('role', 'user')->get();
        return view('admin.properties.edit', compact('property', 'users'));
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'address' => 'required|string',
            'type' => 'required|in:Residential,Commercial',
            'maplocation' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($property->image && file_exists(public_path('uploads/properties/' . $property->image))) {
                unlink(public_path('uploads/properties/' . $property->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/properties'), $imageName);
            $data['image'] = $imageName;
        }

        $property->update($data);

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property updated successfully.');
    }
    public function destroy(Property $property)
    {
        // Delete image if exists
        if ($property->image && file_exists(public_path('uploads/properties/' . $property->image))) {
            unlink(public_path('uploads/properties/' . $property->image));
        }

        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted successfully.');
    }
}
