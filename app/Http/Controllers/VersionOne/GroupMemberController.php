<?php

namespace App\Http\Controllers\VersionOne;

use App\Http\Controllers\Controller;
use App\Http\Requests\VersionOne\StoreGroupMemberRequest;
use App\Http\Requests\VersionOne\UpdateGroupMemberRequest;
use App\Models\VersionOne\GroupMember;

class GroupMemberController extends Controller
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
     * @param  \App\Http\Requests\VersionOne\StoreGroupMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VersionOne\GroupMember  $groupMember
     * @return \Illuminate\Http\Response
     */
    public function show(GroupMember $groupMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VersionOne\GroupMember  $groupMember
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupMember $groupMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VersionOne\UpdateGroupMemberRequest  $request
     * @param  \App\Models\VersionOne\GroupMember  $groupMember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupMemberRequest $request, GroupMember $groupMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VersionOne\GroupMember  $groupMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupMember $groupMember)
    {
        //
    }
}
