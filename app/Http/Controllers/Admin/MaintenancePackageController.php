<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaintenancePackageController extends Controller
{
    public function index()
    {

        $packages = Package::paginate(5);
        return view('admin.packages.index', compact('packages'));
    }

    //! create a new package
    public function create()
    {
        return view('admin.packages.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'service_limit' => 'required|integer|min:1',
            'description' => 'nullable|string|max:1000',
        ]);


       Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration_days' => $request->duration_days,
            'service_limit' => $request->service_limit,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
    }

    //! edit an existing package
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'service_limit' => 'required|integer|min:1',
            'description' => 'nullable|string|max:1000',
        ]);


        $package = Package::findOrFail($id);
        $package->update([
            'name' => $request->name,
            'price' => $request->price,
            'duration_days' => $request->duration_days,
            'service_limit' => $request->service_limit,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }
}
