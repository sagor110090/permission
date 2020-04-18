<?php

namespace Sagor110090\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Sagor110090\Permission\Role;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

     public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $user = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('permission', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $user = User::latest()->paginate($perPage);
        }

        return view('permission::user.index', compact('user'));
    }


    public function create()
    {
        return view('permission::user.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'email' => 'required|unique:users',
			'password' => 'required'
		]);
        $requestData = $request->all();
        $requestData['password'] = Hash::make($request->password);
        $permission = Role::find($request->permission);
        $requestData['role'] = $permission->name;
        $requestData['permission'] = $permission->permission;
        User::create($requestData);
        Session::flash('success','Successfully Saved!');
        return redirect('admin/user');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('permission::user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('permission::user.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			// 'email' => 'required',
			// 'password' => 'required'
		]);
        $requestData = $request->all();
        
        $user = User::findOrFail($id);
        $requestData['password'] = Hash::make($request->password);
        $permission = Role::find($request->permission);
        $requestData['role'] = $permission->name;
        $requestData['permission'] = $permission->permission;
        $user->update($requestData);
        Session::flash('success','Successfully Updated!');
        return redirect('admin/user');
    }


    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('success','Successfully Deleted!');
        return redirect('admin/user');
    }
}
