<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.user.create', compact('categories'));
    }
    public function store(Request  $request)
    {
        // dd($request);
        // $validatedData = $request->validate([]);

        // $user = new User;
        // $user->name = $validatedData['name'];
        // $user->email = $validatedData['email'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/user/', $filename);
        }
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role_as' => $request->input('role_as'),
            'image' => $filename,
        ]);
        // $user->password = $validatedData['password'];
        // $user->role_as = $validatedData['role_as'];
        $user->save();
        return redirect('admin/user')->with('message', 'User Added Successfully');
    }
    public function edit(User $user)
    {
        $categories = Category::latest()->get();
        return view('admin.user.edit', compact('user'), compact('categories'));
    }

    public function update(Request  $request)
    {
        // echo "hello";
        // dd($request);
        //$validatedData = $request->validated();
        $user = User::findOrFail($request->id);

        // echo "<pre>";
        // print_r($Product);
        // die();

        if ($request->hasFile('image')) {
            $path = 'uploads/user/' . $user->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/user/', $filename);
            $user->image = $filename;

            echo $filename;
        } else {
            $user->image = $user->image;
        }
        // $Product->image = $filename;
        $status = $request->status = true ? '1' : '0';
        /*$updateCat = User::where('id', $user_id)->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                    'role_as' => $request->role_as,
                    // 'meta_description' => $request->meta_description,
                    // // 'status' => $status,
                    // 'category_id' => $request->category_id,
                    'image' => $filename,
                ]
            );*/
        // return redirect('admin/user')->with('message', 'Product Updated Successfully');


        // $updateCat = User::where('id', $user_id)->update(
        //     [
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => $request->password,
        //         'role_as' => $request->role_as,
        //         // 'meta_description' => $request->meta_description,
        //         // 'status' => $request->status,
        //     ]
        // );
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->role_as = $request->role_as;

        $user->save();

        return redirect('admin/user')->with('message', 'User Updated Successfully');
    }

    public function destroy(Request $request)
    {
        # code...
        $check = User::destroy($request->id);
        if ($check) {
            return redirect('admin/user')->with('message', 'User Deleted Successfully');
        } else {
            return redirect('admin/user')->with('message', 'Fail to Delete User');
        }
    }
}
