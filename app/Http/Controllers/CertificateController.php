<?php

namespace App\Http\Controllers;

use App\Core\HelperFunction;
use App\Models\Certificate;
use App\Models\Company;
use App\Models\EmailTrack;
use App\Models\File;
use App\Models\Summary;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use PDF;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-certificate');
        // $this->middleware('permission:create-certificate', ['only' => ['create', 'store']]);
        // $this->middleware('permission:update-certificate', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-certificate', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $certificate = Certificate::paginate(setting('record_per_page', 15));
        if (Auth::user()->hasrole('super-admin') ||  Auth::user()->can('view-all-certificates')) {
            $uncertified = File::get();
            $unpaid_files = File::join('certificates', 'files.id', '=', 'certificates.file_id')
                ->join('summaries', 'files.benefit_id', '=', 'summaries.id')
                ->join('companies', 'files.company_id', '=', 'companies.id')
                ->where('certificates.status', 0)
                ->select('files.id as id', 'summaries.column1 as benefits', 'companies.company_name as company_name', 'files.year as benefits_year')
                ->get();
            $paid_files = File::join('certificates', 'files.id', '=', 'certificates.file_id')
                ->join('summaries', 'files.benefit_id', '=', 'summaries.id')
                ->join('companies', 'files.company_id', '=', 'companies.id')
                ->where('certificates.status', 1)
                ->select('files.id as id', 'summaries.column1 as benefits', 'companies.company_name as company_name', 'files.year as benefits_year')
                ->get();
            // dd($unpaid_files);
        } else {
            $uncertified = File::where('advisor_id', auth()->user()->id)->get();
            $unpaid_files = File::join('certificates', 'files.id', '=', 'certificates.file_id')
                ->join('summaries', 'files.benefit_id', '=', 'summaries.id')
                ->join('companies', 'files.company_id', '=', 'companies.id')
                ->where('certificates.status', 0)
                ->where('files.advisor_id', auth()->user()->id)
                ->select('files.id as id', 'summaries.column1 as benefits', 'companies.company_name as company_name', 'files.year as benefits_year')
                ->get();
            $paid_files = File::join('certificates', 'files.id', '=', 'certificates.file_id')
                ->join('summaries', 'files.benefit_id', '=', 'summaries.id')
                ->join('companies', 'files.company_id', '=', 'companies.id')
                ->where('certificates.status', 1)
                ->where('files.advisor_id', auth()->user()->id)
                ->select('files.id as id', 'summaries.column1 as benefits', 'companies.company_name as company_name', 'files.year as benefits_year')
                ->get();
        }
        return view('certificate.index', compact('uncertified', 'unpaid_files', 'paid_files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->session()->pull('files_id');
        $request->session()->put('files_allowed', $id);

        $file = File::where('id', $id)->first();
        // dd($file->company);
        return view('certificate.create', compact('file'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = $request->session()->pull('files_allowed');
        $file = File::where('id', $id)->first();
        // dd( $id );
        $data = array();
        for ($i = 0; $i < count($request->course); $i++) {
            $json = array(
                'course' => $request->course[$i],
                'hours' => $request->hours[$i],
                'employe' => $request->employe[$i],
            );
            array_push($data, $json);

        }
        $course_data = json_encode($data);
        $Cost_ecnomic_report = json_encode($request->Cost_ecnomic_report);
        // dd($Cost_ecnomic_report);

        DB::beginTransaction();
        try {

            $certificate = Certificate::create([
                'file_id' => $file->id,
                'course_data' => $course_data,
                'cost_ecnomic_report' => $Cost_ecnomic_report,
                'accrued_benifits' => $request->accrued_benefit,
                'tribute_6897' => $request->tribute_6897,
                'tribute_6938' => $request->tribute_6938,
                'tribute_6939' => $request->tribute_6939,
                'tribute_6940' => $request->tribute_6940,
                'certification_date' => $request->certification_date,
                'status' => 0,
                'created_by' => Auth::user()->id,
            ]);

            DB::commit();
            flash('certificate created successfully!')->success();
            return redirect()->route('certificate.index');

        } catch (\Exception $e) {
// dd($e);
            DB::rollback();
            flash('There was an error')->error();
            return back();

        }

    }

    ///show function////////////////////////

    public function show(Request $request, $id)
    {
        $certificate = Certificate::where('file_id', $id)->first();
        if ($certificate) {

            $file = File::where('id', $certificate->file_id)->firstorfail();
            $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
            // dd($benefits);
            // if ($benefits->column1 == 'R&S') {
            if ($benefits->column1 == 'FORMAZIONE 4.0') {
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate2', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";
                // return $pdf->stream();
                return $pdf->download($name);
            } elseif ($benefits->column1 == 'INNOVAZIONE TECNOLOGICA') {
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate3', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";
                // return $pdf->download($name);
                return $pdf->download($name);
            } elseif ($benefits->column1 == 'INNOVAZIONE DIGITALE 4.0 & GREEN') {
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate4', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";
                // return $pdf->download($name);
                return $pdf->download($name);
            } elseif ($benefits->column1 == 'INNOVAZIONE & DESIGN') {
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate5', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";
                // return $pdf->download($name);
                return $pdf->download($name);
            } else {
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";
                // return $pdf->stream();
                return $pdf->download($name);
            }

        }

        $request->session()->put('files_id', $id);
        return redirect()->route('certificate.create');
        // $this->create($id);
    }

    public function edit($id)
    {
        $certificate = Certificate::where('file_id', $id)->first();
        return view('certificate.edit', compact('certificate'));
    }

    public function update(Request $request, $id)
    {

        $OldCertificate = Certificate::where('id', $id)->first();
        $file = File::where('id', $id)->first();
        $status = 0;
        // dd( $id );
        $data = array();
        for ($i = 0; $i < count($request->course); $i++) {
            $json = array(
                'course' => $request->course[$i],
                'hours' => $request->hours[$i],
                'employe' => $request->employe[$i],
            );
            array_push($data, $json);

        }
        $course_data = json_encode($data);
        $Cost_ecnomic_report = json_encode($request->Cost_ecnomic_report);
        // dd($Cost_ecnomic_report);
        if ($request->status == 1) {
            $paid_date = date('d/m/Y H:m:s');
            $status = 1;
            // dd($paid_date);
        } else {
            $paid_date = null;
        }
        // dd('asd');
        DB::beginTransaction();
        try {

            $certificate = Certificate::where('id', $id)->update([
                'course_data' => $course_data,
                'cost_ecnomic_report' => $Cost_ecnomic_report,
                'accrued_benifits' => $request->accrued_benefit,
                'tribute_6897' => $request->tribute_6897,
                'tribute_6938' => $request->tribute_6938,
                'tribute_6939' => $request->tribute_6939,
                'tribute_6940' => $request->tribute_6940,
                'certification_date' => $request->certification_date,
                'status' => $status,
                'paid_date' => $paid_date,

            ]);
            // dd($certificate);
            DB::commit();
            flash('Certificate Update successfully!')->success();
            return redirect()->route('certificate.index');

        } catch (\Exception $e) {
// dd($e);
            DB::rollback();
            flash('There was an error')->error();
            return back();

        }

    }
    public function send($id)
    {
        $certificate = Certificate::where('file_id', $id)->first();
        if ($certificate) {

            $file = File::where('id', $id)->firstorfail();
            $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
            $auditor = User::where('id', $file->advisor_id)->withTrashed()->first();

            $EmailTrackCLI = EmailTrack::where('model_id', $id)->where('model', 'App\Models\File::CLI')->get();
            $EmailTrackREV = EmailTrack::where('model_id', $id)->where('model', 'App\Models\File::REV')->get();
            if (!$EmailTrackCLI->count() || !$EmailTrackREV->count()) {
                flash('Please send INCARICO_CLI and INCARICO_REV  first ')->error();
                return redirect()->back();
            }

            if ($benefits->column1 == 'FORMAZIONE 4.0') {
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate2', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";
                // return $pdf->download($name);

            } elseif ($benefits->column1 == 'INNOVAZIONE TECNOLOGICA') {
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate3', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";
                // return $pdf->download($name);

            } elseif ($benefits->column1 == 'INNOVAZIONE DIGITALE 4.0 & GREEN') {
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate4', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";
                // return $pdf->download($name);

            } elseif ($benefits->column1 == 'INNOVAZIONE & DESIGN') {
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate5', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";
                // return $pdf->download($name);
            } else {
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";
                // return $pdf->download($name);
            }
            if ($file->advisor) {
                if ($file->customer_email && $file->opration_email && $file->advisor->email) {
                    $data["email"] = $file->customer_email;
                    $data["solida_email"] = 'coordinamento.certificazioni@solidateam.it';
                    $data["opration_email"] = $file->opration_email;
                    $data["advisor_email"] = $file->advisor->email;
                    $data["title"] = "Ufficio Certificazioni Solida s.r.l";

                    $data["subject"] = "Invio certificazione ";

                    $data["body"] = "Salve, <br> in allegato quanto in oggetto <br> Cordialità <br> Ufficio Certificazioni Solida s.r.l.";

                    Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf, $name) {
                        $message
                            ->to($data["email"], $data["email"])
                            ->cc([$data["solida_email"], $data["opration_email"], $data["advisor_email"]])
                            ->subject($data["subject"])
                            ->attachData($pdf->output(), $name . ".pdf");
                    });

                    $data["subject"] = "Emissione Fattura";

                    $data["body"] = "Prego emettere fattura nei confronti di:  <br>" .
                    " * Ragione Sociale: " . $CertificateData['company_name'] . "<br>" .
                    " * P.IVA: " . $CertificateData['vat_number'] . "<br>" .
                    " * SDI: " . $certificate->file->sdi . "<br>" .
                    " * Indirizzo email: " . $certificate->file->customer_email . "<br>" .
                    " * telefono: " . $certificate->file->company->phone_number . "<br>";

                    Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf, $name) {
                        $message
                            ->to($data["solida_email"], $data["solida_email"])
                            ->subject($data["subject"])
                            ->attachData($pdf->output(), $name . ".pdf");
                    });

                    EmailTrack::create([
                        'created_by' => Auth::user()->id,
                        'model' => 'App\Models\Certificate',
                        'model_id' => $file->id,
                        'date' => date('d/m/Y H:m:s'),

                    ]);

                    flash(__('lang.Certification_send'))->success();
                    return back();

                } else {
                    flash('There was a missing email please revise your data')->error();
                    return back();
                }
            } else {
                flash('There was a error please revise your data')->error();
                return back();
            }

        }

        $request->session()->put('files_id', $id);
        return redirect()->route('certificate.create');

    }
}
