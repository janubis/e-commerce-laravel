<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function about()
    {
        return view('about');
    }
    public function terms()
    {
        return view('terms');
    }
    public function privacy()
    {
        return view('privacy');
    }
    public function contact()
    {
        return view('contact');
    }
    public function add_contact(Request $request)
    {
        if (!empty($request->input('my_email'))) {
            return back()
                ->withErrors(['error' => 'Spam detected.'])
                ->withInput();
        }
        $request->validate([
            'name'              => 'required|string|max:100',
            'phone'             => 'required|numeric|digits:8',
            'email'             => 'required|email|max:100',
            'message'           => 'required|string|max:2000',
            //'g-recaptcha-response' => 'required|captcha',
        ]);
       

        // 3. Store to DB
        Contact::create([
            'name'      => $request->input('name'),
            'phone'     => $request->input('phone'),
            'email'     => $request->input('email'),
            'message'   => $request->input('message'),
            //'ip_address'=> $request->ip(),
        ]);

        // 4. Redirect or show success message
        return redirect()->route('home.contact')
             ->with('success', 'Your message has been submitted. Thank you!');
    }
}
