<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;

class TechnologyController extends Controller
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
     * @param  \App\Http\Requests\StoreTechnologyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechnologyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tecnology  $tecnology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $tecnology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tecnology  $tecnology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $tecnology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTecnologyRequest  $request
     * @param  \App\Models\Tecnology  $tecnology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechnologyRequest $request, Technology $tecnology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tecnology  $tecnology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $tecnology)
    {
        //
    }
}
