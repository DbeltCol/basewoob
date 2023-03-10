<?php namespace App\Traits;

trait GenerateToken
{
    public function generateToken()
    {
        return rand(0000,9999);
    }
}
