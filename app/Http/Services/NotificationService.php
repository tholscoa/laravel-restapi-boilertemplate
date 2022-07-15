<?php

namespace App\Http\Services;

use App\Http\Controllers\PHPMailerController;
use App\Mail\NotificationMail;
use App\Models\EmailTemplate;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    public static function Sms($recipient_no, $text){
        try{
            $full_url = "";
            // APICallsService::makeAPICall($full_url, [], "GET");
            Log::error("Send to ". $recipient_no. " Content ".$text);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public static function Email($recipient_email, $body){
        $user = User::whereEmail($recipient_email)->first();
        // $htmlbody = view('emails.generic', [
        //     'receiverName' => $user->name,
        //     'siteInfo' => "Kiekky",
        //     'title' => "Email Verification Code",
        //     'emailContent' => $body,
        //     'signature' => "Thank you."
        // ]);
        // return $body;
        $details = [
            'title' => "Kiekky Registration OTP",
            'body' =>$body
        ];
        try{
            Mail::to($user->email)->send(new NotificationMail($details));
            // self::send($user, 'Registration Code', $htmlbody);
        }catch(\Exception $e){
            Log::error($e);
            return false;
        }
        return true;
    }

}
