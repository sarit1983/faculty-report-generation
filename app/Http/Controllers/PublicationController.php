<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Publication;
use Illuminate\Http\Request;
use PhpOption\None;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::where('user_id', auth()->user()->id)->orderByDesc('publication_date')->paginate(10)->withQueryString();
        return view('publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:5',
            'category' => 'required|not_in:none',
            'published_in' => 'required|date',


        ]);
        if ($request->exists('authors')) {
            $authors = $request->authors;
            $authors_list = explode(',', $authors);
            $primary_author = null;
            $co_author1 = null;
            $co_author2 = null;
            $co_author3 = null;
            $co_author4 = null;
            $co_author5 = null;
            if (count($authors_list) >= 1)
                $primary_author = $authors_list[0];
            if (count($authors_list) >= 2)
                $co_author1 = $authors_list[1];
            if (count($authors_list) >= 3)
                $co_author2 = $authors_list[2];
            if (count($authors_list) >= 4)
                $co_author3 = $authors_list[3];
            if (count($authors_list) >= 5)
                $co_author4 = $authors_list[4];
            if (count($authors_list) >= 6)
                $co_author5 = $authors_list[5];
        }
        $record = [
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'category' => $request->category,
            'primary_author' => $primary_author,
            'co_author1' => $co_author1,
            'co_author2' => $co_author2,
            'co_author3' => $co_author3,
            'co_author4' => $co_author4,
            'co_author5' => $co_author5,
            'journal' => $request->journal,
            'conference' => $request->conference,
            'publisher' => $request->publisher,
            'book' => $request->book,
            'publication_date' => $request->published_in,
            'volume' => $request->volume,
            'pages' => $request->pages,
            'issue' => $request->issue,

        ];
        // dd($record);
        Publication::create($record);

        return redirect('/publications');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        //
    }
}
