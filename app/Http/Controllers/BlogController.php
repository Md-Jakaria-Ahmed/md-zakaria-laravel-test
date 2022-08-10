<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class BlogController extends Controller
{
    
    public function post(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ],
        ['title.required'=>'please insert title' ]);

        Blog::insert([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        return redirect()->back()->with('success','post has been uploaded successfully...!');
    }



    public function index()
    {
        $posts = Blog::latest()->get();
        return view('post',compact('posts'));
    }


    public function edit($id)
    {
        $data  = Blog::findOrFail($id);

        return view('edit',compact('data'));

    }


    /*==========================  update post ================*/

    public function update(Request $request,$id)
    {

        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ],
        ['title.required'=>'please insert title' ]);

        Blog::findOrFail($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        return redirect()->to('post')->with('success','post has been updated successfully...!');
        
    }

    /*================== delete post ====================*/

    public function delete($id)
    {
       Blog::findOrFail('$id')->delete();

        return redirect()->back()->with('delete','post has been deleted successfully...!');
    }



}
