<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\File;
use App\Models\Summary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view-report');
        $this->middleware('permission:create-report', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-report', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-report', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exceptThis = [1];
        $company = Company::get();
        $benefit = Summary::whereNotIn('id', $exceptThis)->pluck('column1', 'id');
        return view('reports.index', compact('company', 'benefit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

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

        $filename = date('Y-m-d') . '-Report.csv';
        $csv = fopen($filename, 'w+');
        fputcsv($csv, $headings);

        foreach ($files as $key => $file) {
            $EmailTrack = $file->EmailTrack;
            $Certificate = $file->certificate;

            $benefit = $file->benefit;
            $company = $file->company;
            $advisor = $file->advisor;
            $CertificateSendDate = '-';
            $IncaricoSendDate = '-';
            $datePayment = '-';
            $status = '';
            $advisor_name = '';

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
            if ($Certificate) {
                $value = [
                    $company->vat_number,
                    $company->company_name,
                    $company->phone_number,
                    $file->customer_email,
                    $benefit->column1,
                    $file->year,
                    $status,
                    $CertificateSendDate,
                    $IncaricoSendDate,
                    $datePayment,
                    $file->fee,
                    $advisor_name,
                    $file->opration_email,

                ];
            }
            fputcsv($csv, $value);

        }
        $headers = ['Content-Type' => 'text/csv'];

        return response()->download($filename, $filename, $headers)->deleteFileAfterSend();

        // return view('reports.report_pdf')->with('files', $files);

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
