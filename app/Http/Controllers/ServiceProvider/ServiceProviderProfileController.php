<?php
// controller is used to check the database data and provide that available data to the reciever
namespace App\Http\Controllers\ServiceProvider;
use App\Models\ServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceProviderProfileController extends Controller
{
    public function show($id){

        $provider = ServiceProvider::findOrFail($id);
        return view('service_provider.profile.profile', compact('provider'));
    }

    public function edit($id){

        $provider = ServiceProvider::findOrFail($id);
        return view('service_provider.profile.edit', compact('provider'));
    }

    public function update(Request $request, $id){

        $provider = ServiceProvider::findOrFail($id);

        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:service_providers,email,'.$id,
            'phone' => 'nullable',
            'specialization' => 'required',
            'bio' => 'nullable',
        ]);
        $provider->update($request->all());

        return redirect()->route('provider.profile', $id)->with('success', 'Profile updated successfully');
    }
    
}
