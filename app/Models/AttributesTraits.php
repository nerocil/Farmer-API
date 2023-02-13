<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait AttributesTraits
{
    /**
     * @return Attribute
     */
    private function getMakeTimeStamp(): Attribute
    {

        return Attribute::make(get: function ($value) {
            $value = $value != null ? Carbon::parse($value): null;
            return [
                'date' => $value != null ?$value->format('Y-m-d') : "",
                'readable' => $value != null ? $value->format('d M, Y') : "",
                'month_year' => $value != null ? $value->format('M, y') : "",
                'time' => $value != null ? $value->format('H:m') : "",
                'second' => $value != null ? $value->format('i') : "",
                'diff' => $value != null ? $value->diffForHumans(short: true) :"",
                'date_time' => $value ?? "",
            ];
        });
    }

    public function deletedAt():Attribute{
        return $this->getMakeTimeStamp();
    }


    public function createdAt():Attribute{
        return $this->getMakeTimeStamp();
    }

    public function updatedAt():Attribute{
        return $this->getMakeTimeStamp();
    }
}
