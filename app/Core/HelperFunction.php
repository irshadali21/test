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
use App\User;
use Illuminate\Support\Facades\Auth;


class HelperFunction
{

    public static function _uid()
    {
        return md5(date('Y-m-d') . microtime() . rand());
    }


    public static function GetResponse($url, $pramas){

        $api = ApiData::firstorfail();
        $user =User::where('id', Auth::user()->id)->first();
        $response = Http::withToken($api->token)->get($url, $pramas);
        //updating user count in user profile
        $user->api_count++;
        $user->save();
        //updating overall api count
        $api->total_api_count++;
        $api->save();
        
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
        $auditor = $file->advisor;
        $date = Date('d/m/Y');
        $code_date = Date('dmy');
// dd($file->advisor);
        $img = url('/').'/image/signature/sigh.png';
        $fileData = [
            'company_name' => $file->company->company_name,
            'vat_number' => $file->company->vat_number,
            'company_address' => $file->company->company_address,
            'benefits_name' => $benefits->column1,
            'benefits_year' => $file->year,
            'date' => $date,
            'code_date' => $code_date,
            'signature' => $img,


            'auditor' => $auditor->name,
            'auditor_address' => $auditor->ofc_address,
            'auditor_pec_email' => $auditor->email_pec,
            'auditor_city' => $auditor->acc_city,
            'accountant_reg_no' => $auditor->accountant_reg_no,
            'auditor_reg_no' => $auditor->auditor_reg_no,
            'auditor_office_no' => $auditor->ofc_name,
            'auditor_fee' => $file->fee,


        ];
        

        return ($fileData);

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
            'insurance_company' => $auditor->insurance_company,
            'insurance_no' => $auditor->insurance_no,
            'auditor_signature' => $stamp,
            'date' => $date,
            'solida_logo' => $logo,
            'square' => $square,
            'square2' => $square2,
            'code_date' => $code_date,
            'signature' => $signature,
        ];
        
        return ($fileData);

    }
    
    public static function getCertificateData($certificate){

        $file = File::where('id', $certificate->file_id)->firstorfail();
// dd($file);
        $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
        $auditor = $file->advisor;
        $code_date = Date('dmy');
        $date = Date('d/m/Y');
        $logo = url('/').'/image/signature/Solida_logo.png';
        $signature = url('/').'/image/signature/sigh.png';
        $square = url('/').'/image/signature/test.jpg';
        $square2 = url('/').'/image/signature/test2.jpg';
        $stamp = url('/').$auditor->advoiser_stamp;
        $cost_ecnomics = $certificate->cost_ecnomic_report;
        $cost_ecnomics = json_decode($cost_ecnomics);
        $fileData = [
            'benefits_name' => $benefits->column1,
            'benefits_year' => $file->year,
            'benefits_requirment' => $benefits->column2,
            'company_name' => $file->company->company_name,
            'company_address' => $file->company->company_address,
            'vat_number' => $file->company->vat_number,
            'cost_ecnomics' => $cost_ecnomics,

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
            'code_date' => $code_date,
            'signature' => $signature,
        ];
        
        return ($fileData);

    }
    
    public static function getCountries(){
        return [
            'IT' => 'Italy',
            'US' => 'United States',
            'GB' => 'United Kingdom',
            'SE' => 'Sweden',
            'NO' => 'Norway',
            'NL' => 'Netherlands',
            'MX' => 'Mexico',
            'LU' => 'Luxembourg',
            'JP' => 'Japan',
            'IT' => 'Italy',
            'IE' => 'Ireland',
            'DE' => 'Germany',
            'FR' => 'France',
            'DK' => 'Denmark',
            'CA' => 'Canada',
            'BE' => 'Belgium',
        ];
    
    }

}