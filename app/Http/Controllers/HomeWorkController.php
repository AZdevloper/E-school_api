<?php

namespace App\Http\Controllers;

use App\Models\HomeWork;
use App\Http\Requests\StoreHomeWorkRequest;
use App\Http\Requests\UpdateHomeWorkRequest;

class HomeWorkController extends Controller
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
     * @param  \App\Http\Requests\StoreHomeWorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeWorkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeWork  $homeWork
     * @return \Illuminate\Http\Response
     */
    public function show(HomeWork $homeWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeWork  $homeWork
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeWork $homeWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeWorkRequest  $request
     * @param  \App\Models\HomeWork  $homeWork
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeWorkRequest $request, HomeWork $homeWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeWork  $homeWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeWork $homeWork)
    {
        //
    }
}
