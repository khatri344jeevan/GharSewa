<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Property;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPropertyController extends Controller
{

    // Property controller starts here
    public function p_index(){
        $properties = Property::paginate(10);
        $user=Auth::user();

            $properties = $user->properties()->latest()->get();

        return view('user.Properties.index', [
            'properties' => $properties
        ]);
    }

    public function p_create(){

    //     if ($property->user_id !== Auth::id()){
    //     abort(403, 'Unauthorized action.');
    //  }
        return view('user.Properties.create');
    }

    public function p_edit(Property $property){

        if ($property->user_id !== Auth::id()){
        abort(403, 'Unauthorized action.');
     }
        return view('user.Properties.edit', compact('property'));

    }

    public function update(Request $request, Property $property)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string',
            'type' => 'required|string',
            'maplocation' => 'nullable|string',
        ]);

        // Update the existing properties (corrected method)
        $property->update([
            'title' => $request->title,
            'address' => $request->address,
            'type' => $request->type,
            'maplocation' => $request->maplocation,
        ]);

        // Redirect to the property listing with a success message
        return redirect()->route('user.Properties.p_index')->with('success', 'Property updated successfully!');
    }

    public function destroy(Property $property){


         $property->delete();

         return redirect()->route('user.Properties.p_index')->with('sucess','Deleted Successfully!');

    }

    public function p_store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string',
            'type' => 'required|string',
            'maplocation' => 'nullable|string',
        ]);

        // Create a new property linked to the currently authenticated user
        $request->user()->properties()->create([
            'title' => $request->title,
            'address' => $request->address,
            'type' => $request->type,
            'maplocation' => $request->maplocation,
        ]);

        // Redirect to the property listing with a success message
        return redirect()->route('user.Properties.p_index')->with('success', 'Property registered successfully!');
    }
}
