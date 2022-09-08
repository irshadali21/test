<?php

namespace App\Core;


use PDF;
use Mail;
use Closure;
use Exception;
use App\Models\File;
use App\Models\ApiData;
use App\Models\Summary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;


class HelperFunction
{

    public static function _uid()
    {
        return md5(date('Y-m-d') . microtime() . rand());
    }


    public static function GetResponse($url, $pramas){

        $api = ApiData::firstorfail();
        $response = Http::withToken($api->token)->get($url, $pramas);

        if($response->successful()){
            return $response;
        }else if($response->failed()){
            // genrate new token and save it
            $response = Http::acceptJson()->post('https://connect.creditsafe.com/v1/authenticate',  [
                'Username' => $api->user_name,
                'Password' => $api->password,
            ]);
            $token = $api['token'] = $response['token'];
            $api->save();
            
            // retry on api request
            $response = Http::withToken($api->token)->get($url, $pramas);

                if($response->successful()){
                    return $response;
                }else if($response->failed()){
                    //its an error with data sent please check the following error
                    dd($response['details'], $response['message']);
                }else if($response->serverError()){
                    dd($response['details'], $response['message']);
                }else{
                    dd('unkown error');
                }
        }else if($response->serverError()){
            dd($response['details'], $response['message']);
        }else{
            dd('unkown error');
        }
    }


    public static function getClientAssignment($file){
        $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
        
        $date = Date('d/m/Y');
// dd($file->advisor);
        $img = url('/').'/image/signature/sigh.png';
        $fileData = [
            'company_name' => $file->company->company_name,
            'vat_number' => $file->company->vat_number,
            'company_address' => $file->company->company_address,
            'benefits_name' => $benefits->column1,
            'benefits_year' => $file->year,
            'auditor' => $file->advisor->name,
            'auditor_address' => $file->advisor->ofc_address,
            'auditor_pec_email' => $file->advisor->email_pec,
            'date' => $date,
            'signature' => $img,
        ];
        

        return ($fileData);



        // $data["email"] = $file->customer_email;
        // $data["name"] = $file->company_name;
        // $data["title"] = "From revman.com";
        // $data["body"] = "You'll find the attachment below";
        // $data["auditor"] = $file->auditor->name;

        // $pdf = PDF::loadView('assignment.index', $fileData);

        // Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
        //     $message->to($data["email"], $data["email"])
        //             ->subject($data["title"])
        //             ->attachData($pdf->output(), "text.pdf");
        // });
    }

    public static function getAuditAssignment($file){

        $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
        $auditor = $file->advisor;
        $code_date = Date('dmy');
        $date = Date('d/m/Y');
        $logo = url('/').'/image/signature/Solida_logo.png';
        $signature = url('/').'/image/signature/sigh.png';
        $square = url('/').'/image/signature/test.jpg';
        $square2 = url('/').'/image/signature/test2.jpg';
        $stamp = url('/').$auditor->advoiser_stamp;
        $fileData = [
            'company_name' => $file->company->company_name,
            'vat_number' => $file->company->vat_number,
            'company_address' => $file->company->company_address,
            'benefits_name' => $benefits->column1,
            'benefits_year' => $file->year,

            'auditor' => $auditor->name,
            'auditor_address' => $auditor->ofc_address,
            'auditor_pec_email' => $auditor->email_pec,
            'auditor_city' => $auditor->acc_city,
            'accountant_reg_no' => $auditor->accountant_reg_no,
            'auditor_reg_no' => $auditor->auditor_reg_no,
            'auditor_office_no' => $auditor->ofc_name,
            'auditor_signature' => $stamp,
            'date' => $date,
            'solida_logo' => $logo,
            'square' => $square,
            'square2' => $square2,
            'code_date' => $code_date,
            'signature' => $signature,
        ];
        
        return ($fileData);

        $data["email"] = $auditor->email_pec;
        $data["title"] = "From revman.com";
        $data["body"] = "You'll find the attachment below";
        $data["name"] = $auditor->name;
        // dd($data["auditor"]);

        $pdf = PDF::loadView('assignment.pdf2', $fileData);
        
        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });

        // dd('Mail sent successfully');

        // return $pdf->download('test.pdf');
    }


}