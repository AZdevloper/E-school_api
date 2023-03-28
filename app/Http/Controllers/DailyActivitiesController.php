<?php

namespace App\Http\Controllers;

use App\Models\DailyActivities;
use App\Http\Requests\StoreDailyActivitiesRequest;
use App\Http\Requests\UpdateDailyActivitiesRequest;

class DailyActivitiesController extends Controller
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
     * @param  \App\Http\Requests\StoreDailyActivitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDailyActivitiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailyActivities  $dailyActivities
     * @return \Illuminate\Http\Response
     */
    public function show(DailyActivities $dailyActivities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DailyActivities  $dailyActivities
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyActivities $dailyActivities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDailyActivitiesRequest  $request
     * @param  \App\Models\DailyActivities  $dailyActivities
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDailyActivitiesRequest $request, DailyActivities $dailyActivities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyActivities  $dailyActivities
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyActivities $dailyActivities)
    {
        //
    }
}
