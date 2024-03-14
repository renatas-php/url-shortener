<?php 

namespace App\Interfaces;

interface AlgorithmTypeRepositoryInterface {
    public function standard(): string;
    public function standardMaximum(): string;
}