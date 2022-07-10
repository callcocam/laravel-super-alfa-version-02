<?php

namespace SIGA\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use SIGA\Scopes\UuidGenerate;
use SIGA\Sluggable\HasSlug;
use SIGA\Sluggable\SlugOptions;

class AbstractModel extends Model
{
    use HasSlug, UuidGenerate;

    public $incrementing = false;

    protected $keyType = "string";

//    protected $casts = [
//        "created_at" => 'datetime:d/m/Y H:i:s',
//        "updated_at" => 'datetime:d/m/Y H:i:s',
//    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logs()
    {
        return $this->morphMany(Log::class, "logable");
    }

    public function log()
    {
        return $this->morphOne(Log::class, "logable");
    }
    
    public function logone()
    {
        return $this->morphOne(Log::class, "logable");
    }

    public function templog()
    {
        return $this->morphOne(\App\Models\TempLog::class, "templogable");
    }
    /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUser($query)
    {
        return $query->where('user_id', auth()->id());
    }

    protected function slugTo()
    {
        return "slug";
    }

    protected function slugFrom()
    {
        return 'name';
    }

    public function isUser()
    {
        return true;
    }

    public function getSlugOptions()
    {
        if (is_string($this->slugTo())) {
            return SlugOptions::create()
                ->generateSlugsFrom($this->slugFrom())
                ->saveSlugsTo($this->slugTo());
        }
    }

    public function status_color()
    {
        if ($this->getOriginal('status') == "draft") {
            return 'danger';
        }
        return 'success';
    }


    public function created_format($format = "d/m/Y H:i:s")
    {

        return $this->date_carbom_format($this->getOriginal('created_at'), $format);

    }

    public function updated_format($format = "d/m/Y H:i:s")
    {

        return $this->date_carbom_format($this->getOriginal('created_at'), $format);

    }

    public function date_carbom_format($date, $format = "d/m/Y H:i:s")
    {

        $date = explode(" ", str_replace(["-", "/", ":"], " ", $date));

        if (!isset($date[0])) {
            $date[0] = null;
        }
        if (!isset($date[1])) {
            $date[1] = null;
        }
        if (!isset($date[2])) {
            $date[2] = null;
        }
        if (!isset($date[3])) {
            $date[3] = null;
        }
        if (!isset($date[4])) {
            $date[4] = null;
        }
        if (!isset($date[5])) {
            $date[5] = null;
        }
        list($y, $m, $d, $h, $i, $s) = $date;

        //$carbon = \Carbon\Carbon::now();
        $carbon = \Illuminate\Support\Facades\Date::now();
        $carbon->locale('pt');
        if (strlen($date[0]) == 4) {
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toDateTimeLocalString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toDayDateTimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toLongDateString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toFullDateString().PHP_EOL;
//
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toShortTimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toMediumTimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toLongTimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toFullTimeString().PHP_EOL;
//
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toShortDatetimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toMediumDatetimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toLongDatetimeString().PHP_EOL;
//            echo  $carbon->create($y,$m,$d,$h,$i,$s)->toFullDatetimeString().PHP_EOL;
            return $carbon->create($y, $m, $d, $h, $i, $s);

        }
        if ($y && $m && $d) {
            return $carbon->create($d, $m, $y, $h, $i, $s);
        }
        return $carbon->create(null, null, null, null, null, null);

    }

}
