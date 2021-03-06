<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Classroom;

use App\Library;



class LibraryController extends Controller
{
    public function index() {
        $deptInfos= Classroom::all();
        return view('admins.library')->with('deptInfos',$deptInfos);
    }

    public function uploadBook(Request $request) {

        request()->validate([
            'file' => "required|mimes:pdf|max:10000",
        ]);

        
        $fileName = time().'.'.request()->file->getClientOriginalExtension();
        
        $response = request()->file->move(public_path('uploads/library'), $fileName);
        
        $data= $request->all();
        
        $data['file']= $fileName;
        
        $uploadFile= Library::create($data);
        
    	if($uploadFile) {
            $notification=array(
                'message'=>'Book Uploaded Successfully!',
                'alert-type'=>'success'
            );
               return Redirect()->back()->with($notification);

        }

    }

    public function viewBook() {
        $viewBooks= Library::all();
        return view('admins.viewLibrary')->with('viewBooks',$viewBooks);
    }
    
    public function viewBookToUsers() {
        $viewBooks= Library::all();
        return view('users.library')->with('viewBooks',$viewBooks);
    }


}
