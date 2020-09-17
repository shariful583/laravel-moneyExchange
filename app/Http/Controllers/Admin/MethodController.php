<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Method;
use Illuminate\Http\Request;

class MethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showAddMethod()
    {
        return view('Admin.addmethod');
    }

    public function addMethod(Request $request)
    {

        $validation = $request->validate([
           'name' => 'required|unique:methods',
            'role' => 'required'
        ]);
        try {
            $method = new Method;
            $method->name = $request->input('name');
            $method->account = $request->input('account');
            $method->role = $request->input('role');
            $method->save();
            session()->flash('message','Method Added');
            return redirect()->route('admin.showMethod');
        } catch (\Exception $err){
            return redirect()->back();
        }
    }

    public function showMethod()
    {
        $data =[];
        $data['method'] = Method::all();
        return view('Admin.method')->with($data);
    }

    public function showUpdateMethod($name)
    {
        $data = [];
        $data['method'] = Method::where('name',$name)->first();
        if (!empty($data)){
            return view('Admin.editmethod')->with($data);
        } else{
            return view('Admin.addmethod');
        }
    }

    public function updateMethod(Request $request,$id)
    {
        $request->validate([
            'role' => 'required'
        ]);

        Method::where('id',
            $id)->update([
            'account'=>$request->input('account'),
            'role'=>$request->input('role')]);
        return redirect()->route('admin.showMethod');
    }

    public function deleteMethod($id)
    {
        Method::destroy($id);
        return redirect()->route('admin.showMethod');
    }


}
