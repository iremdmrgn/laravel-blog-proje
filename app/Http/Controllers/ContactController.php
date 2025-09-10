<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
   
    public function showForm()
    {
        return view('contact');
    }

   
   public function send(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:1000',
    ]);

    $adminEmail = "admin@site.com"; // kendi mailin

    $data = [
        'name'           => $request->name,
        'email'          => $request->email,
        'subject'        => $request->subject,
        'messageContent' => $request->message, // ⚡ değiştirildi
    ];

    Mail::send('emails.contact', $data, function($m) use ($data, $adminEmail) {
        $m->to($adminEmail)
          ->subject("Yeni İletişim Mesajı: " . $data['subject']);
    });

    return back()->with('success', 'Mesajınız başarıyla gönderildi!');
}


}
