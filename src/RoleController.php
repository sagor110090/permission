<?php

namespace Sagor110090\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Sagor110090\Permission\Role;
use App\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;


class RoleController extends Controller
{

     public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $role = Role::where('name', 'LIKE', "%$keyword%")
                ->orWhere('permission', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $role = Role::latest()->paginate($perPage);
        }

        return view('permission::role.index', compact('role'));
    }


    public function create()
    {
        return view('permission::role.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required|unique:roles'
        ]);
        if ($request->name != 'Super Admin') {
            $role = new Role; 
            $role->name = $request->name;
            $role->slug = Str::slug($request->name);
            $role->permission = json_encode($request->permission); 
            $role->save();
            Session::flash('success','Successfully Saved!');
            return redirect('admin/role');
        }
        Session::flash('error','Super Admin cannot role name!');
        return redirect('admin/role');
        
    }


    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('permission::role.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('permission::role.edit', compact('role'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required'
		]);
        $requestData = $request->all();
        if ($request->name == 'Super Admin') {
            $role = Role::findOrFail($id);
            // $role->name = $request->name;
            $role->slug = Str::slug($request->name);
            $role->permission = json_encode($request->permission); 
            $role->save();
            $user = User::where('role',$request->name)->get();
            foreach ($user as $key => $value) {
                    $value->update(['permission' => json_encode($request->permission)]);
            }

        }else{
            $role = Role::findOrFail($id);
            $role->name = $request->name;
            $role->slug = Str::slug($request->name);
            $role->permission = json_encode($request->permission); 
            $role->save();
            $user = User::where('role',$request->name)->get();
            foreach ($user as $key => $value) {
                    $value->update(['permission' => json_encode($request->permission)]);
            }
        }
        Session::flash('success','Successfully Updated!');
        return redirect('admin/role');
      
    }


    public function destroy($id,Request $request)
    {
        // dd();
        if (Role::find($id)->name != 'Super Admin') {
            Role::destroy($id);
            Session::flash('success','Successfully Deleted!');
            return redirect('admin/role');
        }
        Session::flash('error','Super Admin cannot Delete!');
        return redirect('admin/role');
    }
}
