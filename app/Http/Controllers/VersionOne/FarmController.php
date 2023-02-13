<?php

namespace App\Http\Controllers\VersionOne;

use App\Http\Controllers\Controller;
use App\Http\Requests\VersionOne\StoreFarmRequest;
use App\Http\Requests\VersionOne\UpdateFarmRequest;
use App\Models\VersionOne\Farm;

class FarmController extends Controller
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
     * @param  \App\Http\Requests\VersionOne\StoreFarmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFarmRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VersionOne\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VersionOne\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VersionOne\UpdateFarmRequest  $request
     * @param  \App\Models\VersionOne\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFarmRequest $request, Farm $farm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VersionOne\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        //
    }
}
