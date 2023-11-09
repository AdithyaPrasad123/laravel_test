<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function register()
    {
        return view('register');
    }
    public function doregister(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'email',
            'dob'=>'date',
            'place'=>'required',
            'image'=>'mimes:png,jpg,jpeg,gif|max:2048',
        ]);
        
            $data=$request->all();
        $path='asset/storage/images'.$data['image'];
        $fileName=time().$request->file('image')->getClientoriginalName();
        $path=$request->file('image')->storeAs('image',$fileName,'public');
        $datas["image"]='/storage/'.$path;
        $data['image']=$fileName;
        Register::create($data);
        
        
        return redirect()->route('register')->with('success',"Registered Successfully");

        
    }
    public function view()
    {
        $data=Register::all();
        return view('view',compact('data'));
    }
    public function edit($id)
    {
        $row=Register::find($id);
        return view('edit',compact('row'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'image'=>'mimes:png,jpg,jpeg,gif|max:2048',
        ]);
        $data=Register::find($id);

        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $data->dob=$request->input('dob');
        $data->place=$request->input('place');

        $path='asset/storage/images'.$data->image;
        if($request->hasFile($path))
        {
            $fileName=time().$request->file('image')->getClientoriginalName();
            if(File::exists('path'))
            {
                File::delete($path);
            }
            $path=$request->file('image')->storeAs('image',$fileName,'public');
            $datas["image"]='/storage/'.$path;
            $data->image=$fileName;
            $data->update();
        }

        $data->update();
        return redirect()->route('view')->with('success',"Updated Successfully");
    }
    public function delete($id)
    {
        $row=Register::find($id);
        if(!$row)
        {
            return redirect()->route('view')->with('success',"something Went Wrong");
        }
        $row->delete();
        return redirect()->route('view')->with('success',"Deleted Successfully");
    }
}
