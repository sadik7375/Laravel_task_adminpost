<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
   
   

    public function create()
    {
        return view('admin.create');
    }

   
    
      //store admin create data
      
        public function store(Request $request)
        {
            // Validate the incoming request data
           $request->validate([
                'admin_name' => 'required|string',
                'user_name' => 'required|string',
                'password' => 'required|string',
            ]);
    
            // Create a new instance of your model and fill it with the request data
            $admin = new AdminModel([
                'admin_name' => $request->input('admin_name'),
                'user_name' => $request->input('user_name'),
                'password' => $request->input('password'), 
            ]);
    
            // Save the model to the database
            $admin->save();
    
            // Redirect back or to a specific route with a success message
            return redirect()->route('superadmin')->with('success', 'Admin created successfully!');
        
    

  



    }

//Get Admin Data for table 

public function getAdmin()
{
 
    $admins=AdminModel::all();


    return view('superAdmin.addAdmin',['admins'=>$admins]);


}


//Admin Delete
public function destroy($id)
{

$admin=AdminModel::findOrFail($id);

$admin->delete();

return redirect()->route('superadmin')->with('success', 'Admin deleted successfully!');



}




}
