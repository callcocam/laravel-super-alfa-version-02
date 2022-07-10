<?php

namespace SIGA\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class Log extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    public function logable(){
        return $this->morphTo();
    }

    protected function slugTo()
    {
        return false;
    }

}
