<?php

namespace App\Exports;

use App\Models\Publication;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if (request()->report_type == "dynamic") {

            $fields = [];
            foreach (request()->fields_list as $field) {
                array_push($fields, explode(' ', $field)[0]);
            }
            $query = Publication::select($fields);
            $query->where('user_id', auth()->user()->id);
        } elseif (request()->report_type == "static") {
            //dd(request());
            if (request()->has('report1')) {
                $query = Publication::select([
                    'title', 'authors', 'journal', 'publisher',
                    'volume', 'issue', 'pages', 'publication_date'
                ]);
                $query->where('category', 'journal');
            } elseif (request()->has('report2')) {
                $query = Publication::select([
                    'title', 'authors', 'book', 'publisher',
                    'volume', 'issue', 'pages', 'publication_date'
                ]);
                $query->where('category', 'book');
            }
        }

        if (request()->filled('categories') && count(request()->categories) > 0) {
            $categories = request()->categories;
            if (!in_array('all', $categories))
                $query->whereIn('category', request()->categories);
        }
        $from = date(request()->published_from);
        $to = date(request()->published_till);
        $query->whereBetween('publication_date', [$from, $to]);
        return $query->get();
    }
}
