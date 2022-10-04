<?php

namespace App\Http\Controllers;

use App\Core\HelperFunction;
use App\Models\Certificate;
use App\Models\Company;
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

        // $certificate = Certificate::paginate(setting('record_per_page', 15));

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
                'status' => 0,
                'created_by' => Auth::user()->id,
            ]);

            DB::commit();
            flash('certificate created successfully!')->success();
            return redirect()->route('certificategit.index');

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
            if ($benefits->column1 == 'R&S') {
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";
                return $pdf->download($name);
            }
            
            else{
                $CertificateData = HelperFunction::getCertificateData($certificate);
                $pdf = PDF::loadView('certificate.certificate2', $CertificateData);
                $name = $file->company->company_name . '– Certificato -' . $benefits->column1 . " - " . $file->year . ".pdf";

                return $pdf->download($name);
            }

        }

        $request->session()->put('files_id', $id);
        return redirect()->route('certificate.create');
        // $this->create($id);
    }

    public function client_assignment_download($id)
    {
        $file = File::where('id', $id)->first();
        $fileData = HelperFunction::getClientAssignment($file);
        $pdf = PDF::loadView('assignment.index', $fileData);
        $name = $file->company->company_name;
        return $pdf->download($name . '.pdf');
    }

    public function advoiser_assignment_download($id)
    {
        $file = File::where('id', $id)->first();
        $fileData = HelperFunction::getAuditAssignment($file);
        $pdf = PDF::loadView('assignment.pdf2', $fileData);
        $name = $file->company->company_name;
        return $pdf->download($name . '.pdf');
    }

    public function client_assignment($id)
    {
        $file = File::where('id', $id)->first();
        if (!$file->customer_email) {
            flash('Please add a customer email in Aassignment')->error();
            return back();
        }
        $fileData = HelperFunction::getClientAssignment($file);
        $pdf = PDF::loadView('assignment.index', $fileData);
        $name = $file->company->company_name;

        $data["email"] = $file->customer_email;
        $data["name"] = $file->company_name;
        $data["title"] = "From revman.com";
        $data["body"] = "You'll find the attachment below";
        $data["auditor"] = $file->advisor->name;

        $pdf = PDF::loadView('assignment.index', $fileData);

        Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf, $name) {
            $message
                ->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), $name . ".pdf");
        });

        flash('Assignment sent to Client via Email')->success();
        return back();
    }

    public function advoiser_assignment($id)
    {
        $file = File::where('id', $id)->first();
        if (!$file->advisor->email_pec) {
            flash('Please Update your PEC email in Profile of Advoiser')->error();
            return back();
        }
        $fileData = HelperFunction::getAuditAssignment($file);
        $pdf = PDF::loadView('assignment.pdf2', $fileData);
        $name = $file->company->company_name;

        $data["email"] = $file->advisor->email_pec;
        $data["title"] = "From revman.com";
        $data["body"] = "You'll find the attachment below";
        $data["name"] = $file->advisor->name;
        // dd($data["auditor"]);

        $pdf = PDF::loadView('assignment.pdf2', $fileData);

        Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf, $name) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), $name . ".pdf");
        });

        flash('Assignment sent to Advoiser via Email')->success();
        return back();

    }

    public function edit($id)
    {
        $file = File::where('id', $id)->first();
        $cuntries = HelperFunction::getCountries();
        $advisor = User::role('advisor')->pluck('name', 'id');
        $exceptThis = [1];
        $benefit = Summary::whereNotIn('id', $exceptThis)->pluck('column1', 'id');
        if (!$file) {
            flash('File Does Not Exist');
            return back();
        }
        return view('files.edit', compact('file', 'benefit', 'cuntries', 'advisor'));
    }

    public function update(Request $request)
    {
        $file = File::where('id', $request->file_id)->firstorFail();
        DB::beginTransaction();
        try {
            if ($request->advisor) {
                $advisor = $request->advisor;
            } else {
                $advisor = Auth::user()->id;
            }
            $company = Company::where('vat_number', $request->vat_number)->first();
            $query = "->where('company_id', $company->id)->Where('benefit_id' , $request->benefit_id)->Where('year', $request->year)";

            $check_file = File::where('id', '!=', $request->file_id)
                ->where('company_id', $company->id)
                ->Where('benefit_id', $request->benefit_id)
                ->Where('year', $request->year)->first();

            if ($check_file) {
                flash('File Already Exist with same Year and Benefits!')->error();
                return back();
            } else {
                $file = $file->update([
                    'company_id' => $company->id,
                    'benefit_id' => $request->benefit_id,
                    'advisor_id' => $advisor,
                    'year' => $request->year,
                    'fee' => $request->fee,
                    'sdi' => $request->sdi,
                    'customer_email' => $request->customer_email,
                    'opration_email' => $request->opration_email,
                ]);
            }
            DB::commit();

            flash('File created successfully!')->success();
            return redirect()->route('files.index');

        } catch (\Exception $e) {
            DB::rollback();
            flash('There was an error')->error();
            return back();

        }
    }
}
