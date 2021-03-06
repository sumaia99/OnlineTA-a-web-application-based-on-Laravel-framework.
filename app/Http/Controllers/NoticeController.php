<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Notice;

class NoticeController extends Controller
{
    public function index() {
        return view('admins.postNotice');
    }
    
    public function postNotice(Request $request) {
        
        request()->validate([
            'file' => "required|mimes:pdf|max:10000",
        ]);

        
        $fileName = time().'.'.request()->file->getClientOriginalExtension();
        
        $response = request()->file->move(public_path('uploads/library'), $fileName);
        
        $data= $request->all();
        
        $data['file']= $fileName;
        
        $uploadFile= Notice::create($data);
        
    	if($uploadFile) {
            $notification=array(
                'message'=>'Notice Posted Successfully!',
                'alert-type'=>'success'
            );
               return Redirect()->back()->with($notification);

        }

    }

    public function userHome() {
        $notices= Notice::all();
        return view('users.index')->with('notices',$notices);
    }
    
    public function userViewNotice($id) {
        $viewNotice= Notice::findorFail($id);
        return view('users.singleNotice',compact('viewNotice'));
    }
    
    public function adminViewNotice() {
        $notices= Notice::all();
        return view('admins.allNotices')->with('notices',$notices);
    }

}
