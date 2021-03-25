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

        $communication = new Communication();
        $communication->setName($validated['name']);
        $communication->setEmail($validated['email']);
        $communication->setSubject($validated['subject']);
        $communication->setDetails($validated['details']);

        if (isset($validated['tel'])) {
            $communication->setTelephone($validated['tel']);
        }

        if (isset($validated['file'])) {
            $file = $request->file('file');
            $communication->setFile($file);
            $communication->setFileName($file->getClientOriginalName());
            $communication->setFileExtension($file->getExtension());
            $communication->setMimeType($file->getMimeType());

            Mail::to($communication->getEmail())->send(new EmailCommunication($communication));
            return redirect()->back()->with('status', 'Bien! La solicitud se ha procesado correctamente. Revisa tu email para más información.');
        }
        return back()->with('error', 'Ops! :( Ha ocurrido un error durante el proceso de la solicitud. Inténtalo más tarde o ponte en contacto conmigo en raulparri71@gmail.com.');
    }
}
