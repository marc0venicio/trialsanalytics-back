<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\StoreProofRequest;
use App\Http\Resources\Proof;
use App\Models\Proof as ModelsProof;
use Illuminate\Http\Request;

class ProofController extends BaseController
{
    public function index(Request $request)
    {
        $data = ModelsProof::get();
        return $this->sendResponse(new Proof($data), 'successfully.');
    }

    public function store(StoreProofRequest $request)
    {
         dd($request->all());
    }

    public function show(ModelsProof $id)
    {

    }

    public function update(ModelsProof $id)
    {

    }

    public function delete(ModelsProof $id)
    {

    }
}
