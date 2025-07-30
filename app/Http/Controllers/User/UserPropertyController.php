<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPropertyController extends Controller
{

    public function p_index()
    {
        $user = Auth::user();
        $properties = $user->properties()->latest()->get();

        return view('user.Properties.index', [
            'properties' => $properties
        ]);
    }


    public function p_create()
    {
        return view('user.Properties.create');
    }


    public function p_store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string',
            'type' => 'required|string',
            'maplocation' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/properties'), $imageName);
        }

        $request->user()->properties()->create([
            'title' => $request->title,
            'address' => $request->address,
            'type' => $request->type,
            'maplocation' => $request->maplocation,
            'image' => $imageName,
        ]);

        return redirect()->route('user.Properties.p_index')->with('success', 'Property registered successfully!');
    }


    public function p_edit(Property $property)
    {
        if ($property->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('user.Properties.edit', compact('property'));
    }


    public function update(Request $request, Property $property)
    {
        if ($property->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string',
            'type' => 'required|string',
            'maplocation' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = $property->image;

        if ($request->hasFile('image')) {

            if ($property->image && file_exists(public_path('uploads/properties/' . $property->image))) {
                unlink(public_path('uploads/properties/' . $property->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/properties'), $imageName);
        }

        $property->update([
            'title' => $request->title,
            'address' => $request->address,
            'type' => $request->type,
            'maplocation' => $request->maplocation,
            'image' => $imageName,
        ]);

        return redirect()->route('user.Properties.p_index')->with('success', 'Property updated successfully!');
    }


    public function destroy(Property $property)
    {
        if ($property->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($property->image && file_exists(public_path('uploads/properties/' . $property->image))) {
            unlink(public_path('uploads/properties/' . $property->image));
        }

        $property->delete();

        return redirect()->route('user.Properties.p_index')->with('success', 'Property deleted successfully!');
    }
}
