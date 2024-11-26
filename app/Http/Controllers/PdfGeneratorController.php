<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfGeneratorController extends Controller
{
    public function index($id)
    {
        set_time_limit(300);

        $user = User::find($id);

        if (!$user) {
            return abort(404, 'Пользователь не найден');
        }

        $data = [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
        ];        

        $pdf = PDF::loadView('resume', ['data' => $data]);

        return $pdf->stream('resume.pdf');
    }
}
