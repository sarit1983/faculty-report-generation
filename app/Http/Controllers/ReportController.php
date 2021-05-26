<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use App\Models\Publication;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function create()
    {

        return view('reports.create');
    }

    public function download()
    {
        //dd(request());

    }
    public function export(Request $request)
    {
        //dd($request);
        // $this->download();
        // return redirect('/reports');
        return Excel::download(new ReportExport, 'report.csv');
    }
}
