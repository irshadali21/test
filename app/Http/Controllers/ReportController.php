<?php

namespace App\Http\Controllers;

use App\Exports\FilessExport;
use App\Models\Company;
use App\Models\File;
use App\Models\Firm;
use App\Models\ateco_table;
use App\Models\province_table;
use App\Models\sector_table;
use App\Models\Summary;
use App\User;
use App\Models\LaVelina;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view-report');
        // $this->middleware('permission:create-report', ['only' => ['create', 'store']]);
        // $this->middleware('permission:update-report', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:destroy-report', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function files()
    {
        $exceptThis = [1];
        $company = Company::get();
        $benefit = Summary::whereNotIn('id', $exceptThis)->pluck('column1', 'id');
        return view('reports.files', compact('company', 'benefit'));
    }
    public function firms()
    {
        $advisor = User::get();
        $ateco = ateco_table::get();
        $province = province_table::get();
        $sector = sector_table::get();
        return view('reports.firms', compact('ateco', 'province', 'sector', 'advisor'));
    }
    public function valina()
    {
        if (auth()->user()->hasrole('super-admin'))
        {
            $lavelina = LaVelina::get();
        }else{
            $lavelina = LaVelina::where('created_by', auth()->user()->id)->get();
        }

        // $lavelina = LaVelina::get();
        

        return view('reports.valina', compact('lavelina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filesDownload(Request $request)
    {

        // dd($request->all());
        $files = File::join('certificates', 'files.id', '=', 'certificates.file_id')
            ->join('summaries', 'files.benefit_id', '=', 'summaries.id')
            ->join('companies', 'files.company_id', '=', 'companies.id')
            ->join('email_tracks', 'files.id', '=', 'email_tracks.model_id')
            ->join('users', 'files.advisor_id', '=', 'users.id');

        // if ($request->vat_number) {
        //     $files->where('companies.vat_number', 'LIKE', "%{$request->vat_number}%");
        // }
        if ($request->company) {
            $files->where('companies.id', $request->company);
        }
        if ($request->benefits) {
            $files->where('summaries.id', $request->benefits);
        }
        if ($request->advisor_name) {
            $files->where('users.name', 'LIKE', "%{$request->advisor_name}%");
        }
        if ($request->opration_email) {
            $files->where('files.opration_email', 'LIKE', "%{$request->opration_email}%");
        }
        if ($request->inc_send_date) {
            $from = Carbon::parse($request->inc_send_date)->format('Y-m-d');
            $to = Carbon::parse(now())->format('Y-m-d');
            $files->where('email_tracks.model', '!=', 'App\Models\Certificate');
            $files->whereBetween('email_tracks.created_at', [$from, $to]);
        }
        if ($request->certificate_issue_date) {
            $from = Carbon::parse($request->certificate_issue_date)->format('Y-m-d');
            $to = Carbon::parse(now())->format('Y-m-d');
            $files->where('email_tracks.model', 'App\Models\Certificate');
            $files->whereBetween('email_tracks.created_at', [$from, $to]);
        }
        if ($request->file_date) {
            $from = Carbon::parse($request->file_date)->format('Y-m-d');
            $to = Carbon::parse(now())->format('Y-m-d');
            $files->whereBetween('files.created_at', [$from, $to]);
        }

        $files->select('files.*');

        $files = $files->get();
        if ($files == null || empty($files) || count($files) == 0) {
            flash(' 0 report Found')->info();

            return redirect()->back();
        }

        $headings = [
            'VAT N.',
            'COMPANY NAME',
            'PHONE NUMBER',
            'CUSTOMER EMAIL',
            'TYPE OF BENEFIT',
            'YEAR OF BENEFIT',
            'CERTIFICATE STATUS',
            'INCARICO SEND DATE',
            'CERTIFICATION ISSUE DATE',
            'DATE PAYMENT',
            'FEE',
            'ADVISOR NAME',
            'E-MAIL OPERATION',
        ];

        $filename = date('Y-m-d') . '-File-Report.';

        $data = array();
        $data[] = $headings;

        foreach ($files as $key => $file) {
            $EmailTrack = $file->EmailTrack;
            $Certificate = $file->certificate;

            $benefit = $file->benefit;
            $company = $file->company;
            $advisor = $file->advisor;
            $CertificateSendDate = '-';
            $IncaricoSendDate = '-';
            $datePayment = '-';
            $status = '-';
            $advisor_name = '-';
            $phone_number = '-';
            $customer_email = '-';
            $opration_email = '-';

            if ($file->EmailTrack) {
                foreach ($file->EmailTrack as $track) {
                    if ($track) {
                        if ($Certificate) {
                            if ($track->model == 'App\Models\Certificate') {
                                $CertificateSendDate = (string) $track->date;
                            }
                        }
                        if ($track->model == 'App\Models\File::CLI') {
                            $IncaricoSendDate = (string) $track->date;
                        }
                    }
                }
            }
            if ($Certificate) {
                if ($Certificate->status == 1) {
                    $status = 'certified and already paid';
                    $datePayment = $Certificate->paid_date;
                } elseif (strlen($CertificateSendDate) > 1) {
                    $status = 'certified and unpaid';
                }
            } else {
                $status = 'to be certified';
            }

            if (!empty($advisor->name)) {
                $advisor_name = $advisor->name;
            }
            if (!empty($company->phone_number)) {
                $phone_number = $company->phone_number;
            }
            if (!empty($file->customer_email)) {
                $customer_email = $file->customer_email;
            }
            if (!empty($file->opration_email)) {
                $opration_email = $file->opration_email;
            }
            if (!empty($advisor->name)) {
                $advisor_name = $advisor->name;
            }

            if ($Certificate) {
                $value = [
                    $company->vat_number,
                    $company->company_name,
                    $phone_number,
                    $customer_email,
                    $benefit->column1,
                    $file->year,
                    $status,
                    $CertificateSendDate,
                    $IncaricoSendDate,
                    $datePayment,
                    $file->fee,
                    $advisor_name,
                    $opration_email,
                ];
                $data[] = $value;
            }
        }

        if ($request->file_type == 1) {
            $datapdf = array();
            // dd($data);
            foreach ($data as $value) {
                $tempdata = [
                    'vat' => $value[0],
                    'name' => $value[1],
                    'phone' => $value[2],
                    'cemail' => $value[3],
                    'benefit' => $value[4],
                    'year' => $value[5],
                    'status' => $value[6],
                    'send' => $value[7],
                    'issue' => $value[8],
                    'payment' => $value[9],
                    'fee' => $value[10],
                    'adname' => $value[11],
                    'opration' => $value[12],
                ];
                array_push($datapdf, $tempdata);
            }
            // dd($datapdf);
            $datapdf = [
                'data' => $datapdf,
            ];
            $pdf = PDF::loadView('exports.files', $datapdf);
            $name = $filename;
            return $pdf->download($name . '.pdf');
        } elseif ($request->file_type == 2) {
            $export = new FilessExport($data);
            return Excel::download($export, $filename . 'xlsx');
            dd($data);
        }

        flash('There was an Error')->info();
        return redirect()->back();
    }

    public function firmsDownload(Request $request)
    {
        $firms = new Firm;
        if ($request->firm_name) {
            $firms = $firms->where('firm_name', 'LIKE', "%{$request->firm_name}%");
        }
        if ($request->ateco) {
            $firms = $firms->where('ateco_id', $request->ateco);
        }
        if ($request->sector) {
            $firms = $firms->where('sector_id', $request->sector);
        }
        if ($request->province) {
            $firms = $firms->where('province_id', $request->province);
        }
        if ($request->category) {
            $firms = $firms->where('category', 'LIKE', "%{$request->category}%");
        }
        if ($request->firm_type) {
            $firms = $firms->where('firm_type', 'LIKE', "%{$request->firm_type}%");
        }
        if ($request->advisor) {
            $firms = $firms->where('created_by',  "$request->advisor");
        }

        $firms = $firms->get();

        if ($firms == null || empty($firms) || count($firms) == 0) {
            flash(' 0 report Found')->info();
            return redirect()->back();
        }
        $headings = [
            'COMPANY Name',
            'VAT',
            'Type',
            'Province',
            'Category',
            'Phone',
            'Contact Person',
            'Email',
            'Email2',
            'Sector',
            'Ateco Code',
            'Advisor',
        ];

        $filename = date('Y-m-d') . '-Firm-Report.';


        $data = array();
        $datapdf = array();
        $firmscheck = array();

        if ($request->file_type == 2) {
            $data[] = $headings;
        }

        $province = '-';
        $sector = '-';
        $ateco = '-';
        $advisor = '-';

        foreach ($firms as $key => $firm) {
            if(in_array($firm->id, $firmscheck)){

            }else{

            }

            $FName = $firm->firm_name;
            $vatN = $firm->firm_vat_no;
            $type = $firm->firm_type;
            $category = $firm->category;
            $phone_number = $firm->phone_number;
            $fOwner = $firm->firm_owner;
            $email = $firm->email;
            $email2 = $firm->email2;

            if (!empty($firm->levlelina_advisor)) {
                $advisor = $firm->levlelina_advisor;
            }
            if (!empty($firm->ateco->code)) {
                $ateco = $firm->ateco->code;
            }
            if (!empty($firm->sector)) {
                $sector = $firm->sector->name;
            }
            if (!empty($firm->province->province)) {
                $province = $firm->province->province;
            }
            if ($request->file_type == 1) {
                if(in_array($firm->id, $firmscheck)){

                }else{

                    $tempdata = [
                        'name' => $FName,
                        'vat' => $vatN,
                        'type' => $type,
                        'province' => $province,
                        'category' => $category,
                        'phone' => $phone_number,
                        'contact_person' => $fOwner,
                        'email' => $email,
                        'email2' => $email2,
                        'sector' => $sector,
                        'ateco' => $ateco,
                        'advisor' => $advisor,
                    ];
                    array_push($datapdf, $tempdata);
                }

            } elseif ($request->file_type == 2) {
                $value = [
                    $FName,
                    $vatN,
                    $type,
                    $province,
                    $category,
                    $phone_number,
                    $fOwner,
                    $email,
                    $email2,
                    $sector,
                    $ateco,
                    $advisor,
                ];
                $data[] = $value;
            }
        }

        if ($request->file_type == 1) {
            $datapdf = ['data' => $datapdf,];
            $pdf = PDF::loadView('exports.firms', $datapdf);
            $name = $filename;
            return $pdf->download($name . '.pdf');
        } elseif ($request->file_type == 2) {
            $export = new FilessExport($data);
            return Excel::download($export, $filename . 'xlsx');
        }
        flash('There was an error')->info();
        return redirect()->back();
    }



    public function valinaDownload(Request $request){
        $valina = LaVelina::where('id', $request->lavelina)->get();

        if ($valina == null || empty($valina) || count($valina) == 0) {
            flash(' 0 report Found')->info();
            return redirect()->back();
        }

        $headings = [
            'VAT',
            'COMPANY Name',
            'Date',
            'Cluster',
        ];

        $filename = date('Y-m-d') . '-Firm-Report.';


        $data = array();
        $datapdf = array();
        $firmscheck = array();

        if ($request->file_type == 2) {
            $data[] = $headings;
        }

        $province = '-';
        $sector = '-';
        $ateco = '-';
        $advisor = '-';

        foreach ($firms as $key => $firm) {
            if(in_array($firm->id, $firmscheck)){

            }else{

            }

            $FName = $firm->firm_name;
            $vatN = $firm->firm_vat_no;
            $type = $firm->firm_type;
            $category = $firm->category;
            $phone_number = $firm->phone_number;
            $fOwner = $firm->firm_owner;
            $email = $firm->email;
            $email2 = $firm->email2;

            if (!empty($firm->levlelina_advisor)) {
                $advisor = $firm->levlelina_advisor;
            }
            if (!empty($firm->ateco->code)) {
                $ateco = $firm->ateco->code;
            }
            if (!empty($firm->sector)) {
                $sector = $firm->sector->name;
            }
            if (!empty($firm->province->province)) {
                $province = $firm->province->province;
            }
            if ($request->file_type == 1) {
                if(in_array($firm->id, $firmscheck)){

                }else{

                    $tempdata = [
                        'name' => $FName,
                        'vat' => $vatN,
                        'type' => $type,
                        'province' => $province,
                        'category' => $category,
                        'phone' => $phone_number,
                        'contact_person' => $fOwner,
                        'email' => $email,
                        'email2' => $email2,
                        'sector' => $sector,
                        'ateco' => $ateco,
                        'advisor' => $advisor,
                    ];
                    array_push($datapdf, $tempdata);
                }

            } elseif ($request->file_type == 2) {
                $value = [
                    $FName,
                    $vatN,
                    $type,
                    $province,
                    $category,
                    $phone_number,
                    $fOwner,
                    $email,
                    $email2,
                    $sector,
                    $ateco,
                    $advisor,
                ];
                $data[] = $value;
            }
        }

        if ($request->file_type == 1) {
            $datapdf = ['data' => $datapdf,];
            $pdf = PDF::loadView('exports.firms', $datapdf);
            $name = $filename;
            return $pdf->download($name . '.pdf');
        } elseif ($request->file_type == 2) {
            $export = new FilessExport($data);
            return Excel::download($export, $filename . 'xlsx');
        }
        flash('There was an error')->info();
        return redirect()->back();
    }



    public function download_csv($files)
    {
        try {
            $headings = [
                'VAT N.',
                'COMPANY NAME',
                'PHONE NUMBER',
                'CUSTOMER EMAIL',
                'TYPE OF BENEFIT',
                'YEAR OF BENEFIT',
                'CERTIFICATE STATUS',
                'INCARICO SEND DATE',
                'CERTIFICATION ISSUE DATE',
                'DATE PAYMENT',
                'FEE',
                'ADVISOR NAME',
                'E-MAIL OPERATION',

            ];

            $filename = date('Y-m-d') . '-' . $request->title . '.csv';
            $csv = fopen($filename, 'w+');
            fputcsv($csv, $headings);

            foreach ($values as $value) {

                foreach ($value as $key => $val) {
                    $value[$key] = trim($val);
                }
                fputcsv($csv, $value);
            }
            $headers = ['Content-Type' => 'text/csv'];
            return response()->download($filename, $filename, $headers)->deleteFileAfterSend();
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', __('messages.unkown_err'));
        }
    }
}
