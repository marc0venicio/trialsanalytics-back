<?php

namespace App\Services\Proofs;

use App\Models\Proof;
use App\Models\Question;
use Exception;
use Illuminate\Support\Facades\DB;

class ProofService
{

    public function create(array $params) : Proof
    {
        try {
            DB::beginTransaction();

            $proofCreated = Proof::query()->create([
                "subject" => $params['subject'],
                "discipline" => $params['discipline']
            ]);

            if(!isset($proofCreated->id))
                throw new Exception("Error registering proofs");

           $this->createQuestions($params, $proofCreated);

            DB::commit();

            return $proofCreated;

        } catch (\Throwable $th) {
            DB::rollBack();
            throw new Exception($th->getMessage());
        }
    }

    private function createQuestions(array $parameters, Proof $proof)
    {

        foreach ($parameters['questions'] as $question) {

            $questionParams = [
                "alternatives" => $question["alternatives"],
                "description"=>$question[ "description"],
                "answer"=>$question["answer"]
            ];

            $question = Question::create($questionParams);

            $proof->questions()->save($question);
        }

    }

    public function update(array $params, Proof $proofs) : Proof
    {
        try {
            DB::beginTransaction();

            $proofs->fill($params);
            $proofs->payload_updated = json_encode($params, JSON_UNESCAPED_UNICODE);
            $proofs->save();

            DB::commit();

            return $proofs;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new Exception($th->getMessage());
        }
    }


    public function destroy(Proof $proofs)
    {
        try {
            DB::beginTransaction();

            $proofs->delete();

            DB::commit();

            return $proofs->id;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new Exception($th->getMessage());
        }
    }


}
