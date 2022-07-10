<?php

namespace SIGA\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traduction extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function slugTo()
    {
        return false;
    }
}
