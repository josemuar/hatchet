<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MOffice;
use DB;

class HatchetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        /*
        $query = DB::table ( "m_office" );
        $query->select( 
            "m_lead.name" , 
            "m_lead.name",
            "m_lead.phone" ,
            "m_lead.email",
             "m_lead.email as em"
        );*/

        $prices = MOffice::distinct()->get(['price']);
        $offices= MOffice::distinct()->get(['offices']);
        $tables = MOffice::distinct()->get(['tables']);
        $sqms   =   MOffice::distinct()->get(['sqm']);
        $rows   =   MOffice::get();

        return view('dashboard', ['rows' => $rows, 'prices' => $prices , 'offices' => $offices, 'tables' => $tables, 'sqms' => $sqms ]);
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
    public function store(Request $request)
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
}
