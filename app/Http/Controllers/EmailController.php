<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Mail\EmailCommunication;
use App\Models\Communication;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendMail(SendMailRequest $request)
    {
        $validated = $request->validated();

        $file = isset($validated['file']) ? $request->file('file') : null;

        if ($file) {
            $communication = new Communication();
            $communication->name = $validated['name'];
            $communication->email = $validated['email'];
            $communication->telephone = $validated['tel'];
            $communication->subject = $validated['subject'];
            $communication->details = $validated['details'];
            $communication->file = $file;
            $communication->fileName = $communication->file->getClientOriginalName();
            $communication->fileExtension = $communication->file->getMimeType();

            Mail::to('raulparri71@gmail.com')->send(new EmailCommunication($communication));
            return redirect()->back()->with('status', 'Bien! La solicitud se ha procesado correctamente. Revisa tu email para más información.');
        }
        return back()->with('error', 'Ops! :( Ha ocurrido un error durante el proceso de la solicitud. Inténtalo más tarde o ponte en contacto conmigo en raulparri71@gmail.com.');
    }
}
