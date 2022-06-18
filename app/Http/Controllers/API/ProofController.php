<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\StoreProofRequest;
use App\Http\Resources\Proof;
use App\Http\Resources\ProofCollection;
use App\Models\Enums\TypeTenantEnum;
use App\Models\Proof as ModelsProof;
use App\Services\Proofs\ProofService;
use Illuminate\Http\Request;

class ProofController extends BaseController
{
    public function index(Request $request)
    {
        return $this->sendResponse(Proof::collection(ModelsProof::with('questions')->get()), 'successfully.');
    }

    public function store(StoreProofRequest $request, ProofService $proofService)
    {
        try {

            $proof = $proofService->create($request->all());
            return $this->sendResponse($proof, 'successfully',201);

        } catch (\Throwable $th) {
            throw $th;
        }
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
