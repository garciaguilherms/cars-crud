<?php

namespace App\Http\Controllers;

use App\Models\CarHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarHistoryRequest;
use App\Http\Requests\UpdateCarHistoryRequest;

class CarHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCarHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarHistory  $carHistory
     * @return \Illuminate\Http\Response
     */
    public function show(CarHistory $carHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarHistory  $carHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(CarHistory $carHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarHistoryRequest  $request
     * @param  \App\Models\CarHistory  $carHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarHistoryRequest $request, CarHistory $carHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarHistory  $carHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarHistory $carHistory)
    {
        //
    }
}
