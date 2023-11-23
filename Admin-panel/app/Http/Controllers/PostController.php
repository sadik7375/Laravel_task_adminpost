<?php

namespace App\Http\Controllers;
use App\Models\PostModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
  
    public function poststore(Request $request)
    {
        // Validate the incoming request data
       $request->validate([
            'title' => 'required|string',
            'username' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'status' => 'string'
            
        ]);

        // Create a new instance of your model and fill it with the request data
        $post = new PostModel([
            'title' => $request->input('title'),
            'username'=> $request->input('username'),
            'date'  => $request->input('date'),
            'description'  => $request->input('description'), 
            'status'  => $request->input('status'),   
        ]);

        // Save the model to the database
        $post->save();

        // Redirect back or to a specific route with a success message
        return redirect()->route('superamdin')->with('success', 'post created successfully!');
    

}





public function allpost()
{
 
    $posts=PostModel::all();
    // dd($admins->toArray());  // Check the retrieved data

    return view('superAdmin.allpost',['posts'=>$posts]);


}


public function showpost()
{
 
    $posts=PostModel::all();
    // dd($admins->toArray());  // Check the retrieved data

    return view('welcome',['posts'=>$posts]);


}



}
