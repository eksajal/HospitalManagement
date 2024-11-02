<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {

        if (Auth::id()) {

            if (Auth::user()->usertype == '0') {

                $doctor = Doctor::all();

                $blog = Blog::paginate(3);

                return view('user.home', compact('doctor', 'blog'));

            } else {

                return view('admin.home');
            }
        } else {

            return redirect()->back();
        }
    }

    public function index()
    {

        if (Auth::id()) {

            return redirect('redirect');

        } else {

            $doctor = Doctor::all();

            $blog = Blog::paginate(3);

            return view('user.home', compact('doctor', 'blog'));
        }
    }


    public function appointment(Request $request)
    {

        $data = new Appointment();

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->number;

        $data->doctor = $request->doctor;

        $data->date = $request->date;

        $data->message = $request->message;

        $data->status = 'In progress';

        if (Auth::id()) {

            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'Appointment request successful. We will contact with you soon..');
    }


    public function myappointment()
    {

        if (Auth::id()) {

            $userid = Auth::user()->id;

            $appoint = Appointment::where('user_id', $userid)->get();

            return view('user.myappointment', compact('appoint'));
        }

        return redirect()->back();
    }

    public function cancel_appoint($id)
    {

        $data = Appointment::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Appoint request cancelled Successfully!');
    }









    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Initialize an empty collection for $doctor if no keyword is provided
        $doctor = collect();


        $blog = collect();


        if ($keyword) {
            // If a keyword is provided, search for doctors
            $doctor = Doctor::where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('speciality', 'LIKE', "%{$keyword}%")
                ->get(['name', 'speciality', 'image', 'room', 'phone']); // Fetch required fields


                $blog = Blog::where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('bloger_name', 'LIKE', "%{$keyword}%")
                ->get(['title', 'bloger_name', 'blog_img', 'description', 'blog_tym','bloger_img']); // Fetch required fields
        }

        // Always pass both $doctor and $keyword to the view
        return view('user.home', [
            'doctor' => $doctor,
            'blog' => $blog,
            'keyword' => $keyword
        ]);
    }



    public function about()
    {

        return view('user.about_page');

    }

    public function doctors_page()
    {

        $doctor = Doctor::all();

        return view('user.doctors_page', compact('doctor'));

    }


    public function blog_page()
    {
        $blog = Blog::all();

        return view('user.blog_page', compact('blog'));
        
    }


    
    public function contact_page()
    {
        $doctor = Doctor::all();

        return view('user.contact_page', compact('doctor'));
        
    }

    public function blog_details_page($id){

        $blog = Blog::find($id);

        return view('user.blog_details_page', compact('blog'));

    }






}
