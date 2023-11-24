<?php

namespace App\Http\Controllers;
use App\Models\PostModel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
  

    //post store by admin
    public function poststore(Request $request)
    {
        // Validate the incoming request data
       $request->validate([
            'title' => 'required|string',
            'username' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
          
            
            
        ]);

        // Create a new instance of your model and fill it with the request data
        $post = new PostModel([
            'title' => $request->input('title'),
            'username'=> $request->input('username'),
            'date'  => $request->input('date'),
            'description'  => $request->input('description'), 
            'status'  => 0
           
          
        ]);

        // Save the model to the database
        $post->save();
        // if ($request->hasErrors()) {
        //     dd($request->errors());
        // }
        // // Redirect back or to a specific route with a success message
        return redirect()->route('admin')->with('success', 'post created successfully!');
    

}




//show all post for super admin
public function allpost()
{
 
    $posts=PostModel::all();
    // dd($admins->toArray());  // Check the retrieved data

    return view('superAdmin.allpost',['posts'=>$posts]);


}



//super admin aprrove  the post
public function approvePost($id)
{
    $post = PostModel::find($id);

    if ($post) {
        $post->status = 1;
        $post->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}


//superadmin cancel approval
public function cancelPost($id)
{
    $post = PostModel::find($id);

    if ($post) {
        $post->status = 0;
        $post->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}




//show post for user which is approved by superadmin
public function showpost()
{
 
    $posts = PostModel::where('status', 1)->get();

    return view('welcome', ['posts' => $posts]);


}


//show all post for superadmin
public function showpostall()
{
  
    $user_name = session('username');
    
   
    $posts = PostModel::where('username', $user_name)->get();




    

    return view('admin.post',['posts'=>$posts]);

}


//get Data for update
public function edit($id)
{
    $post = PostModel::find($id);

    if (!$post) {
        return redirect()->back()->with('error', 'Post not found.');
    }

    return view('admin.editPost', ['post' => $post]);
}




    // Update the post data
public function postEdit(Request $request,$id)
{

    $request->validate([
        'title' => 'required|string',
        'username' => 'required|string',
        'date' => 'required|string',
        'description' => 'required|string',
    ]);

    $post = PostModel::find($id);

    if (!$post) {
        return redirect()->back()->with('error', 'Post not found.');
    }



    $post->update([
        'title' => $request->input('title'),
        'username' => $request->input('username'),
        'date' => $request->input('date'),
        'description' => $request->input('description'),
    ]);

    return redirect()->route('admin')->with('success', 'Post updated successfully!');


}



//post Delete
public function postDelete($id)
{

$admin=PostModel::findOrFail($id);

$admin->delete();

return redirect()->route('admin')->with('success', 'Admin deleted successfully!');



}




}