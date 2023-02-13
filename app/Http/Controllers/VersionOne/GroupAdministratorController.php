<?php

namespace App\Http\Controllers\VersionOne;

use App\Http\Controllers\Controller;
use App\Http\Requests\VersionOne\StoreGroupAdministratorRequest;
use App\Http\Requests\VersionOne\UpdateGroupAdministratorRequest;
use App\Models\VersionOne\GroupAdministrator;

class GroupAdministratorController extends Controller
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
     * @param  \App\Http\Requests\VersionOne\StoreGroupAdministratorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupAdministratorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VersionOne\GroupAdministrator  $groupAdministrator
     * @return \Illuminate\Http\Response
     */
    public function show(GroupAdministrator $groupAdministrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VersionOne\GroupAdministrator  $groupAdministrator
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupAdministrator $groupAdministrator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VersionOne\UpdateGroupAdministratorRequest  $request
     * @param  \App\Models\VersionOne\GroupAdministrator  $groupAdministrator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupAdministratorRequest $request, GroupAdministrator $groupAdministrator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VersionOne\GroupAdministrator  $groupAdministrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupAdministrator $groupAdministrator)
    {
        //
    }
}
