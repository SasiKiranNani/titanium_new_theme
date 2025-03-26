<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Svg\Tag\Rect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserManagementController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:View Permissions', only: ['permission']),
            new Middleware('permission:Create Permissions', only: ['permissionStore']),
            new Middleware('permission:Edit Permissions', only: ['permissionUpdate']),
            new Middleware('permission:Delete Permissions', only: ['permissionDestroy']),

            new Middleware('permission:View Roles', only: ['role']),
            new Middleware('permission:Create Roles', only: ['roleStore']),
            new Middleware('permission:Edit Roles', only: ['roleUpdate']),
            new Middleware('permission:Delete Roles', only: ['roleDestroy']),

            new Middleware('permission:View Users', only: ['user']),
            new Middleware('permission:Create Users', only: ['userStore']),
            new Middleware('permission:Edit Users', only: ['userUpdate']),
            new Middleware('permission:Delete Users', only: ['userDestroy']),
        ];
    }


    public function permission(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 items per page if not provided
        $search = $request->input('search', '');
        $sortBy = $request->query('sort_by', 'id');
        $sortOrder = $request->query('sort_order', 'asc');

        // Filter permissions based on search input
        $permissions = Permission::with('roles') // Eager load roles
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                        ->orWhere('guard_name', 'like', "%$search%");
                });
            })
            ->orderBy($sortBy, $sortOrder)
            ->paginate($perPage === 'all' ? Permission::count() : (int) $perPage);

        return view('backend.user-management.permission', compact('permissions', 'perPage', 'sortBy', 'sortOrder'));
    }

    public function permissionStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
        ]);

        if ($validator->passes()) {
            Permission::create([
                'name' => $request->name
            ]);
            return redirect()->back()->with('success', 'Permission created successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function permissionUpdate(Request $request, string $id)
    {
        $permission = Permission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
        ]);

        if ($validator->passes()) {
            $permission->name = $request->name;
            $permission->save();

            return redirect()->back()->with('success', 'Permission updated successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function permissionDestroy(string $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permissions')->with('success', 'Permission deleted successfully');
    }

    // public function role(Request $request)
    // {
    //     $perPage = $request->input('per_page', 10); // Default pagination
    //     $search = $request->input('search', ''); // Get search term

    //     // Filter roles based on search input
    //     $roles = Role::when($search, function ($query) use ($search) {
    //         $query->where(function ($q) use ($search) {
    //             $q->where('name', 'like', "%$search%");
    //         });
    //     })
    //     ->orderBy('created_at', 'asc')
    //     ->paginate($perPage === 'all' ? Role::count() : (int) $perPage);

    //     $permissions = Permission::all();

    //     return view('backend.user-management.role', compact('roles', 'permissions', 'perPage'));
    // }


    public function role(Request $request)
    {
        // Fetch roles with their associated users
        $roles = Role::with('users')->orderBy('created_at', 'asc')->get();

        // Fetch all permissions (if needed)
        $permissions = Permission::all();

        return view('backend.user-management.role', compact('roles', 'permissions'));
    }

    public function roleStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->passes()) {

            $role = Role::create([
                'name' => $request->name,
            ]);

            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
            }
            return redirect()->route('roles')->with('success', 'Role created successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function roleUpdate(Request $request, string $id)
    {
        $role = Role::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $id . ',id',
        ]);

        if ($validator->passes()) {
            $role->name = $request->name;
            $role->save();

            if (!empty($request->permission)) {
                $role->syncPermissions($request->permission);
            } else {
                $role->syncPermissions([]);
            }
            return redirect()->route('roles')->with('success', 'Role updated successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function roleDestroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles')->with('success', 'Role deleted successfully');
    }

    public function user(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->query('search');
        $sortBy = $request->query('sort_by', 'id');
        $sortOrder = $request->query('sort_order', 'asc');
        $roleFilter = $request->query('role');

        $roles = Role::all();

        $users = User::query();

        // Role filter
        if (!empty($roleFilter)) {
            $users->whereHas('roles', function ($query) use ($roleFilter) {
                $query->where('id', $roleFilter);
            });
        }

        // Apply search filter if specified (only within the role-filtered results)
        if (!empty($search)) {
            $users->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Sorting
        $users = $users->orderBy($sortBy, $sortOrder);

        // Pagination
        if ($perPage === 'all') {
            $users = $users->get();
        } else {
            $users = $users->paginate((int) $perPage);
        }

        // Attach roles to each user
        foreach ($users as $user) {
            $user->hasRoles = $user->roles()->pluck('name');
        }

        return view('backend.user-management.user', compact('users', 'roles', 'search', 'sortBy', 'sortOrder', 'perPage', 'roleFilter'));
    }


    public function userStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'role' => 'required|exists:roles,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Find role by ID and assign it
        $role = Role::findById($request->role, 'web');
        if ($role) {
            $user->assignRole($role->name);
        } else {
            return redirect()->back()->withErrors(['role' => 'Invalid role selected.']);
        }

        return redirect()->back()->with('success', 'User created successfully.');
    }

    public function userUpdate(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id . ',id',
            'role' => 'required|exists:roles,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Fetch role by ID and assign its name
        $role = Role::findById($request->role, 'web');
        if ($role) {
            $user->syncRoles([$role->name]); // Assign role name, not ID
        } else {
            return redirect()->back()->withErrors(['role' => 'Invalid role selected.']);
        }

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        $user->delete(); // Delete the user
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
