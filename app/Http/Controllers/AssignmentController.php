<?php

namespace App\Http\Controllers;

use App\Core\HelperFunction;
use App\Http\Requests\AssignmentRequest;
use App\Models\File;
use App\Models\Summary;
use Illuminate\Http\Request;
use Mail;
use PDF;

class AssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-certificate');
        $this->middleware('permission:create-certificate', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-certificate', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-certificate', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $file = File::firstorfail();
        $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
        // dd($file->auditor);
        $date = Date('d/m/Y');
        // dd($date);
        $img = 'image/signature/sigh.png';
        // dd($img);
        $fileData = [
            'company_name' => $file->company_name,
            'vat_number' => $file->vat_number,
            'company_address' => $file->company_address,
            'benefits_name' => $benefits->column1,
            'benefits_year' => $file->year,
            'auditor' => $file->auditor->name,
            'auditor_address' => $file->auditor->ofc_address,
            'auditor_pec_email' => $file->auditor->email_pec,
            'date' => $date,
            'signature' => $img,
            // 'date' => $file->auditor->email_pec,
        ];
        // dd($file);
        $pdf = PDF::loadView('assignment.index', $fileData);
        return $pdf->download('test.pdf');
    }
    public function pdf2()
    {
        $file = File::firstorfail();
        $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
        $auditor = $file->auditor;
        $code_date = Date('dmy');
        $date = Date('d/m/Y');
        $logo = 'image/signature/Solida_logo.png';
        $signature = 'image/signature/sigh.png';
        $square = 'image/signature/test.jpg';
        $square2 = 'image/signature/test2.jpg';
        $fileData = [
            'company_name' => $file->company_name,
            'vat_number' => $file->vat_number,
            'company_address' => $file->company_address,
            'benefits_name' => $benefits->column1,
            'benefits_year' => $file->year,
            'auditor' => $auditor->name,
            'auditor_address' => $auditor->ofc_address,
            'auditor_city' => $auditor->acc_city,
            'accountant_reg_no' => $auditor->accountant_reg_no,
            'auditor_reg_no' => $auditor->auditor_reg_no,
            'auditor_pec_email' => $auditor->email_pec,
            'auditor_office_no' => $auditor->ofc_name,
            'auditor_signature' => $auditor->advoiser_stamp,
            'date' => $date,
            'solida_logo' => $logo,
            'square' => $square,
            'square2' => $square2,
            'code_date' => $code_date,
            'signature' => $signature,
        ];

        $data["email"] = "m.irshad.ali21@gmail.com";
        $data["title"] = "From revman.com";
        $data["body"] = "You'll find the attachment below";
        $data["auditor"] = $auditor->name;
        // dd($data["auditor"]);

        $pdf = PDF::loadView('assignment.pdf2', $fileData);

        Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "text.pdf");
        });

        dd('Mail sent successfully');

        return $pdf->download('test.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssignmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function certificate()
    {
        $file = File::first();
        $fileData = HelperFunction::getAuditAssignment($file);
        $pdf = PDF::loadView('certificate.certificate', $fileData);
        $name = $file->company->company_name;
        return $pdf->download($name . '.pdf');

    }
}
