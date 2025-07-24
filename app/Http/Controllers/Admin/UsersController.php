<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    //
    public function index()
    {
        // Fetch all users
        // $users = User::paginate(5);


        // Fetch all users except the currently logged-in admin
        $users = User::where('id', '!=', auth()->id())->paginate(5);
        return view('admin.users.index', compact('users'));
    }


    function create()
    {
        return view('admin.users.create');
    }

    function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user,service_provider', // Adjust roles as needed
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
            'role' => $request->role,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
        // $request->user()->create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => $request->role,
        //     'phone' => $request->phone,
        //     'address' => $request->address

        // ]);
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }







    function edit($id)
    {
        // return view('admin.users.edit', compact('id'));
        // Find the user by ID
        $user = User::findOrFail($id);
        // Return the edit view with the user data
        return view('admin.users.edit', compact('user'));
    }

    function show($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
        // Return the show view with the user data
        return view('admin.users.show', compact('user'));
    }



    function update(Request $request, User $user)
    {
        // Find the user by ID
        // $user = User::findOrFail($user->id);
        // Check if the authenticated user is authorized to update this user
        // if (auth()->user()->cannot('update', $user)) {
        //     abort(403, 'Unauthorized action.');
        // }
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:admin,user,service_provider', // Adjust roles as needed
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Prepare update data
        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'address' => $request->address,
            'phone' => $request->phone,
        ];

        // Only update password if provided
        if ($request->filled('password')) {
            $updateData['password'] = bcrypt($request->password);
        }

        // Update the user
        $user->update($updateData);
        // $request->user()->create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => $request->role,
        //     'phone' => $request->phone,
        //     'address' => $request->address

        // ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);



        // Check if trying to delete the authenticated user
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'You cannot delete your own account.');
        }

        // Delete the user
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }







    //! service providers
//     public function serviceProvidersIndex()
//     {
//         // Fetch all service providers
//         $serviceProviders = User::where('role', 'service_provider')->paginate(5);
//         return view('admin.service_provider.index', compact('serviceProviders'));
//     }
//     public function createServiceProvider()
//     {
//         return view('admin.service_provider.create');
//     }
//     public function storeServiceProvider(Request $request)
//     {
//         // Validate the request data
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|string|email|max:255|unique:service_providers,email',
//             'phone' => 'nullable|string|max:20',
//             'specialization' => 'required|string|max:255',
//             'bio' => 'nullable|string',
//         ]);

//         // Create the service provider
//         $serviceProvider = new ServiceProvider($request->all());
//         $serviceProvider->user_id = auth()->id(); // Assuming the admin is creating the service provider
//         $serviceProvider->save();

//         return redirect()->route('admin.service_providers.index')->with('success', 'Service Provider created successfully.');
//     }
//     public function editServiceProvider($id)
//     {
//         // Find the service provider by ID
//         $serviceProvider = User::findOrFail($id);
//         return view('admin.service_provider.edit', compact('serviceProvider'));
//     }
//     public function updateServiceProvider(Request $request, $id)
//     {
//         // Find the service provider by ID
//         $serviceProvider = User::findOrFail($id);
//         // Validate the request data
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|string|email|max:255|unique:service_providers
// ,email,' . $serviceProvider->id,
//             'phone' => 'nullable|string|max:20',
//             'specialization' => 'required|string|max:255',
//             'bio' => 'nullable|string',
//         ]);
//         // Update the service provider
//         $serviceProvider->update($request->all());
//         return redirect()->route('admin.service_providers.index')->with('success', 'Service Provider updated successfully.');
//     }

}
