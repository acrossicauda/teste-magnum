<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInfluencersRequest;
use App\Http\Requests\UpdateInfluencersRequest;
use App\Models\Campanhas;
use App\Models\Influencers;
use App\Models\VinculoInfluencersCampanhas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InfluencersController extends Controller
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
     * @param  \App\Http\Requests\StoreInfluencersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registerUserData = $request->validate([
            'name'=>'required|string',
            'username'=>'required|string|unique:influencers,username',
            'qtd_followers'=>'required|min:0',
            'category'=>'string|nullable',
        ]);

        $influencers = Influencers::create([
            'name' => $registerUserData['name'],
            'username' => $registerUserData['username'],
            'qtd_followers' => $registerUserData['qtd_followers'],
            'category' => $registerUserData['category'],
        ]);


        return response()->json([
            'message' => 'Influencer Created',
        ]);
    }


    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function vincularInfluencer(Request $request)
    {
        $request = $request->all();
        try {

            foreach ($request as $vinculos) {
                DB::beginTransaction();
                foreach ($vinculos['campanhas'] as $campanha) {
                    DB::table('vinculo_influencers_campanhas')->insert([
                        'influencer_id' => $vinculos['influencer'],
                        'campanha_id' => $campanha,
                    ]);

                }
                DB::commit();
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ' . $th->getMessage(),
            ])->setStatusCode(500);
        }

        return response()->json([
            'message' => 'Vinculo criado com sucesso',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @return VinculoInfluencersCampanhas
     */
    public function listarVinculosByInfluencer(VinculoInfluencersCampanhas $vinculos)
    {
        $campanhas = Campanhas::select(
            'c.name as campanha_name',
            'v.campanha_id',
            'v.influencer_id',
            'i.name as influencer_name',
            'i.username',
            'i.qtd_followers',
            'i.category'
        )
            ->from('campanhas as c')
            ->leftJoin('vinculo_influencers_campanhas as v', 'v.campanha_id', '=', 'c.id')
            ->leftJoin('influencers as i', 'i.id', '=', 'v.influencer_id')
            ->distinct()
            ->get();

        return response()->json([
            'data' => $campanhas,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Influencers  $influencers
     * @return \Illuminate\Http\Response
     */
    public function show(Influencers $influencers)
    {
        return response()->json([
            'data' => $influencers->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Influencers  $influencers
     * @return \Illuminate\Http\Response
     */
    public function edit(Influencers $influencers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInfluencersRequest  $request
     * @param  \App\Models\Influencers  $influencers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInfluencersRequest $request, Influencers $influencers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Influencers  $influencers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Influencers $influencers)
    {
        //
    }
}
