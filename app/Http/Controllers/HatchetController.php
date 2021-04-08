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
        
        $query = DB::table ( "m_office" );
        $query->select(DB::raw('m_office.offices as id, m_office.offices as text'));
        $offices = $query->distinct()->get();

        $query = DB::table ( "m_office" );
        $query->select(DB::raw('m_office.tables as id, m_office.tables as text'));
        $tables = $query->distinct()->get();

        $query = DB::table ( "m_office" );
        $query->select(DB::raw('m_office.sqm as id, m_office.sqm as text'));
        $sqms = $query->orderBy('m_office.sqm', 'ASC')->distinct()->get();

        $query = DB::table ( "m_office" );
        $query->select(DB::raw('m_office.price as id, m_office.price as text'));
        $prices = $query->orderBy('m_office.price', 'ASC')->distinct()->get();

        $query = DB::table ( "m_office" );
        $query->select("name", "offices", "tables" , "sqm", "price");
        $rows = $query->orderBy("name", "asc")->get();

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
