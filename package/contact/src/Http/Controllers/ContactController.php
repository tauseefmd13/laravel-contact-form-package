<?php

namespace Bbis\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Bbis\Contact\Mail\ContactMailable;
use Bbis\Contact\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
	public function index()
	{
		return view('contact::contact');
	}

	public function sendMail(Request $request)
	{
		Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->name,$request->email,$request->message));

		Contact::create($request->all());
		
		return redirect('/contact')->with('status', 'Thank you, your mail has been sent successfully.');
	}
}
