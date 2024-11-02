<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function add_doctor(){

        $speciality = Speciality::all();

        return view('admin.add_doctor_page', compact('speciality'));

    }


    public function add_speciality(){

        $speciality = Speciality::all();

        return view('admin.add_speciality_page', compact('speciality'));

    }

    public function delete_speciality($id){

        $speciality = Speciality::find($id);

        $speciality->delete();

        return redirect()->back()->with('message', 'Speciality deleted Successfully!');

    }


    public function upload_speciality(Request $request){

        $speciality = new Speciality();

        $speciality->name = $request->name;

        $speciality->save();

        return redirect()->back()->with('message', 'Speciality added Successfully!');

    }


    public function upload_doctor(Request $request){

        $doctor = new Doctor();

        $image = $request->image;

        if($image){


            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('doctorImage', $imagename);

            $doctor->image = $imagename;


        }

        $speciality_id = $request->speciality;

        $speciality_name = Speciality::find($speciality_id)->name;

        $doctor->speciality = $speciality_name;

        $doctor->speciality_id = $speciality_id;

        $doctor->name = $request->name;

        $doctor->phone = $request->phone;

        $doctor->description = $request->description;

        $doctor->room = $request->room;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor added Successfully!');

    }

    public function view_doctor(){

        $doctor = Doctor::all();

        return view('admin.view_doctor', compact('doctor'));

    }

    public function edit_doctor($id){

        $doctor = Doctor::find($id);

        $specialities = Speciality::all();

        return view('admin.edit_doctor', compact('doctor', 'specialities'));

    }

    public function update_doctor(Request $request, $id){

        $doctor = Doctor::find($id);

        $newimage = $request->image;

        if($newimage){


            $imagename = time().'.'.$newimage->getClientOriginalExtension();

            $request->image->move('doctorImage', $imagename);

            $doctor->image = $imagename;


        }

        $doctor->name = $request->name;

        $doctor->phone = $request->phone;

        $doctor->room = $request->room;

        $doctor->description = $request->description;

        $speciality_id = $request->speciality;

        $speciality_name = Speciality::find($speciality_id)->name;

        $doctor->speciality = $speciality_name;

        $doctor->speciality_id = $speciality_id;

        $doctor->save();

        return redirect('view_doctor')->with('message', 'Doctor updated Successfully!');

    }

    public function delete_doctor($id){

        $doctor = Doctor::find($id);

        $doctor->delete();

        return redirect()->back()->with('message', 'Doctor deleted Successfully!');

    }


    public function show_appointment(){

        $data = Appointment::all();

        return view('admin.show_appointment', compact('data'));

    }

    public function approve_appoint($id){

        $data = Appointment::find($id);

        $data->status = 'Approved';

        $data->save();

        return redirect()->back();

    }

    
    public function cancel_appoint($id){

        $data = Appointment::find($id);

        $data->status = 'Cancelled';

        $data->save();

        return redirect()->back();

    }

    public function delete_appoint($id){

        $data = Appointment::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Appoint deleted Successfully!');

    }

    public function message($id){

        $data = Appointment::find($id);

        return view('admin.message', compact('data'));

    }

    public function send_mail_page($id){

        $data = Appointment::find($id);

        return view('admin.send_mail_page', compact('data'));

    }


    public function sendEmail(Request $request)
    {
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to($request->recipient_email)
                    ->subject('Message from Admin');
        });

        return back()->with('message', 'Email sent successfully!');
    }

    public function add_blog(){

        return view('admin.add_blog_page');

    }

    public function upload_blog(Request $request){

        $blog = new Blog();

        $blog->title = $request->title;

        $blog->description = $request->description;

        $blog->bloger_name = $request->bloger_name;

        $blog->blog_tym = $request->blog_tym;

        $blogimg = $request->blog_img;

        $blogerimg = $request->bloger_img;

        if($blogimg){

            $blog_img_name = time().'.'.$blogimg->getClientOriginalExtension();

            $request->blog_img->move('blogImage', $blog_img_name);

            $blog->blog_img = $blog_img_name;

        }

        
        if($blogerimg){

            $bloger_img_name = time().'.'.$blogerimg->getClientOriginalExtension();

            $request->bloger_img->move('blogerImage', $bloger_img_name);

            $blog->bloger_img = $bloger_img_name;

        }

        $blog->save();

        return redirect()->back()->with('message', 'Blog uploaded successfully!');

    }


    public function view_blog(){

        $blog = Blog::all();

        return view('admin.view_blog_page', compact('blog'));

    }


    public function edit_blog($id){

        $blog = Blog::find($id);

        return view('admin.update_blog_page', compact('blog'));

    }


    public function update_blog(Request $request , $id){

        $blog = Blog::find($id);

        $blog->title = $request->title;

        $blog->description = $request->description;

        $blog->bloger_name = $request->bloger_name;

        $blog->blog_tym = $request->blog_tym;

        $blogimg = $request->blog_img;

        $blogerimg = $request->bloger_img;

        if($blogimg){

            $blog_img_name = time().'.'.$blogimg->getClientOriginalExtension();

            $request->blog_img->move('blogImage', $blog_img_name);

            $blog->blog_img = $blog_img_name;

        }

        
        if($blogerimg){

            $bloger_img_name = time().'.'.$blogerimg->getClientOriginalExtension();

            $request->bloger_img->move('blogerImage', $bloger_img_name);

            $blog->bloger_img = $bloger_img_name;

        }

        $blog->save();

        return redirect('view_blog')->with('message', 'Blog updated successfully!');



    }

    public function delete_blog($id){

        $blog = Blog::find($id);

        $blog->delete();

        return redirect()->back()->with('message', 'Blog deleted successfully!');

    }


}
