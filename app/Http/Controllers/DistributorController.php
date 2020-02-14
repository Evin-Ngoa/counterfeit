<?php

namespace App\Http\Controllers;

use App\Services\Distributor\DistributorService;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    protected $distributorservice;

    public function __construct(DistributorService  $distributorservice)
    {
        $this->distributorservice = $distributorservice;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $distributors = $this->distributorservice->getAllDistributors();
        // dd($distributors);
        return view('distributors.index')->with(compact('distributors'));
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
        $distributor = $this->distributorservice->getSingleDistributor($id);

        return response()->json([
            'error' => false,
            'distributor'  => $distributor,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distributor = $this->distributorservice->getSingleDistributor($id);

        return response()->json([
            'error' => false,
            'distributor'  => $distributor,
        ], 200);
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
