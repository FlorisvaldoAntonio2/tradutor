<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHistoricalRequest;
use App\Http\Requests\UpdateHistoricalRequest;
use App\Models\Historical;

class HistoricalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHistoricalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Historical $historical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Historical $historical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoricalRequest $request, Historical $historical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Historical $historical)
    {
        //
    }
}
