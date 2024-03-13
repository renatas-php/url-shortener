<?php 

namespace App\Repositories;

use Illuminate\Support\Str;
use App\Interfaces\AlgorithmTypeRepositoryInterface;

class AlgorithmTypeRepository implements AlgorithmTypeRepositoryInterface {

    public function standard(): string
    {
        return Str::random(6);
    }
}