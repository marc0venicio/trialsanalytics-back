<?php

namespace App\Http\Controllers;

use App\Http\Resources\Proof;
use App\Models\Proof as ModelsProof;
use Illuminate\Http\Request;

class ProofController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        return $this->sendResponse(new Proof($data), 'successfully.');
    }

    public function store(Request $request)
    {

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
