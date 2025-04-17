<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function SendPassword(): void
    {
        $toEmail = 'programingfiels.com@gmail.com';
        $message = 'Welcom to Coding ToolBox';
        $subject = 'Coding ToolBox';

        $response = Mail::to($toEmail)->send(new SendPassword($message, $subject));

        dd($response);


}
}
