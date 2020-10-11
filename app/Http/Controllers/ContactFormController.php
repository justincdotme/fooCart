<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormConfirmation;
use App\Mail\ContactFormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function index()
    {
        return view('public.templates.contact-form', [
            'title' => 'Contact Us'
        ]);
    }

    public function store(Request $request)
    {
        if (session()->has('submittedContact')) {
            abort(422);
        }

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'message' => 'required'
        ]);

        Mail::to(config('mail.accounts.admin.to'))
            ->send(new ContactFormSubmission(request()->all()));

        Mail::to(request('email'))
            ->send(new ContactFormConfirmation(request()->all()));

        session()->put('submittedContact', 1);

        return response()->json([
            'status' => 'success'
        ]);
    }
}
