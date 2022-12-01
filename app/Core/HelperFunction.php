<?php

namespace App\Core;

use App\Models\ApiData;
use App\Models\File;
use App\Models\Summary;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\LaVelina;
use App\Models\LavelinaDetail;


class HelperFunction
{

    public static function _uid()
    {
        return md5(date('Y-m-d') . microtime() . rand());
    }

    public static function GetResponse($url, $pramas)
    {

        $api = ApiData::firstorfail();
        $user = User::where('id', Auth::user()->id)->first();
        $response = Http::withToken($api->token)->get($url, $pramas);
        //updating user count in user profile
        $user->api_count++;
        $user->save();
        //updating overall api count
        $api->total_api_count++;
        $api->save();

        if ($response->successful()) {
            return $response;
        } else if ($response->failed()) {
            // genrate new token and save it
            $response = Http::acceptJson()->post('https://connect.creditsafe.com/v1/authenticate', [
                'Username' => $api->user_name,
                'Password' => $api->password,
            ]);
            $token = $api['token'] = $response['token'];
            $api->save();

            // retry on api request
            $response = Http::withToken($api->token)->get($url, $pramas);

            if ($response->successful()) {
                return $response;
            } else if ($response->failed()) {
                //its an error with data sent please check the following error
                dd($response['details'], $response['message']);
            } else if ($response->serverError()) {
                dd($response['details'], $response['message']);
            } else {
                dd('unkown error');
            }
        } else if ($response->serverError()) {
            dd($response['details'], $response['message']);
        } else {
            dd('unkown error');
        }
    }

    public static function getClientAssignment($file)
    {
        $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
        $auditor = User::where('id', $file->advisor_id)->withTrashed()->first();
        $date = Date('d/m/Y');
        $code_date = Date('dmy');
// dd($file->advisor);
        $img = url('/') . '/image/signature/sigh.png';
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

    public static function getAuditAssignment($file)
    {

        $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
        $auditor = User::where('id', $file->advisor_id)->withTrashed()->first();
        $code_date = Date('dmy');
        $date = Date('d/m/Y');
        $logo = url('/') . '/image/signature/Solida_logo.png';
        $signature = url('/') . '/image/signature/sigh.png';
        $square = url('/') . '/image/signature/test.jpg';
        $square2 = url('/') . '/image/signature/test2.jpg';
        $stamp = url('/') . $auditor->advoiser_stamp;
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

    public static function getCertificateData($certificate)
    {

        $file = File::where('id', $certificate->file_id)->firstorfail();
        $auditor = User::where('id', $file->advisor_id)->withTrashed()->first();
        $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
        if ($benefits->column1 == 'R&S') {
            if ($file->year < 2020) {
                $description = "RICERCA E SVILUPPO";
                $refrance = "Art. 3 del D.L 23.12.2013 N. 145";
            } else {
                $description = "RICERCA E SVILUPPO";
                $refrance = "Art. 1 Comma 201 – Legge n.160 del 27 dicembre 2019 Decreto del MISE del 26/05/2020";
            }
        } else {
            $description = HelperFunction::getDescription($benefits->column1);
            $refrance = HelperFunction::getRafrance($benefits->column1);
        }


        $code_date = Date('dmy');
        $date = Date('d/m/Y');
        $logo = url('/') . '/image/signature/Solida_logo.png';
        $signature = url('/') . '/image/signature/sigh.png';
        $square = url('/') . '/image/signature/test.jpg';
        $square2 = url('/') . '/image/signature/test2.jpg';
        $euro = url('/') . '/image/signature/euro.jpg';
        $euro_lightBlue = url('/') . '/image/signature/euro_lightBlue.jpg';
        $stamp = url('/') . $auditor->advoiser_stamp;
        $cost_ecnomics = $certificate->cost_ecnomic_report;
        $cost_ecnomics = json_decode($cost_ecnomics);
        $course_data = json_decode($certificate->course_data);
        

        $fileData = [
            'benefits_name' => $benefits->column1,
            'benefits_year' => $file->year,
            'fee' => $file->fee,
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
            'euro' => $euro,
            'euro_lightBlue' => $euro_lightBlue,
            'refrance' => $refrance,
            'description' => $description,

            'accrued_benifits' => $certificate->accrued_benifits,
            'tribute_6938' => $certificate->tribute_6938,
            'tribute_6939' => $certificate->tribute_6939,
            'course_data' => $course_data,
        ];

        return ($fileData);

    }

    public static function getCountries()
    {
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
    public static function getDescription($case)
    {

        switch ($case) {
            case ('FORMAZIONE 4.0'):
                return "FORMAZIONE 4.0";
            case ('INNOVAZIONE TECNOLOGICA'):
                return "INNOVAZIONE TECNOLOGICA";
            case ('INNOVAZIONE DIGITALE 4.0 & GREEN'):
                return "INNOVAZIONE DIGITALE";
            case ('INNOVAZIONE & DESIGN'):
                return "DESIGN E IDEAZIONE ESTETICA";
            default:
                return 'Something went wrong.';
        }
    }
    public static function getRafrance($case)
    {

        switch ($case) {
            case ('FORMAZIONE 4.0'):
                return "Legge 27/12/2017 Art. 1 Commi 46-56 e successive modifiche; Art.31 comma 3 del Regolamento (UE) n.651/2014";
            case ('INNOVAZIONE TECNOLOGICA'):
                return "Comma 201 della legge di bilancio n. 160 del 27 dicembre 2019";
            case ('INNOVAZIONE DIGITALE 4.0 & GREEN'):
                return "Legge 27 dicembre 2019, n. 160 – Art. 1 Comma 201; Legge 30 dicembre 2020, n. 178 – Art.1 Comma 1064 lettera d, f, g";
            case ('INNOVAZIONE & DESIGN'):
                return "Art. 1 Comma 202 – Legge n.160 del 27 dicembre 2019; Decreto del MISE del 26/05/2020";
            default:
                return 'Something went wrong.';
        }
    }

    public static function lavelina($id)
    {

        $lavelina = LaVelina::where('id', $id)->first();
        $body = LavelinaDetail::where('lavelina_id', $id)->get();
        $background_image = asset('image/signature/lavelina_3.jpg');
        $logo = asset('image/signature/Solida_footer.png');
        $date = Date('d/m/Y');
        $Data = [
            'title' => $lavelina->title,
            'body' => $body,
            'firms' => $lavelina->firms,
            'benefits' => $lavelina->benefits,
            'benefits_in_number' => $lavelina->benefits_in_number,
            'tax_breack' => $lavelina->tex_breack,
            'source' => $lavelina->source,
            // 'advisor' => $lavelina->advisor->name,
            'background_image' => $background_image,
            'logo' => $logo,
            'color' => $lavelina->body,
            'date' => $date,
        ];

        return $Data;
    }

}
