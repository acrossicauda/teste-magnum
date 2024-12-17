<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampanhasRequest;
use App\Http\Requests\UpdateCampanhasRequest;
use App\Models\Campanhas;
use Illuminate\Http\Request;

class CampanhasController extends Controller
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
     * @param  \App\Http\Requests\StoreCampanhasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registerCampanhaData = $request->validate([
            'name'=>'required|string',
            'budget'=>'required|numeric',
            'description'=>'nullable|string',
            'initial_date'=>'required|date',
            'final_date'=>'required|date',
        ]);

        $influencers = Campanhas::create([
            'name' => $registerCampanhaData['name'],
            'budget' => $registerCampanhaData['budget'],
            'description' => $registerCampanhaData['description'],
            'initial_date' => $registerCampanhaData['initial_date'],
            'final_date' => $registerCampanhaData['final_date'],
        ]);


        return response()->json([
            'message' => 'Campanha Created',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campanhas  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function show(Campanhas $campanhas)
    {
        return response()->json([
            'data' => $campanhas->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campanhas  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function edit(Campanhas $campanhas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCampanhasRequest  $request
     * @param  \App\Models\Campanhas  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCampanhasRequest $request, Campanhas $campanhas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campanhas  $campanhas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campanhas $campanhas)
    {
        //
    }
}
