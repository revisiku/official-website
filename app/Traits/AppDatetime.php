<?php

namespace App\Traits;

use App\Helpers\IDDateFormat;
use App\Helpers\Time;

trait AppDatetime
{

    public function short($datetime, $time = null) {
        $timeText = ' | '.Time::convert($time ?: $datetime);

        if (is_bool($time) && $time == false) {
            $timeText = null;
        }

        return IDDateFormat::convert($datetime).$timeText;
    }

    public function long($datetime, $time = null)
    {
        $timeText = ' | '.Time::convert($time ?: $datetime, text:true);

        if (is_bool($time) && $time == false) {
            $timeText = null;
        }

        return IDDateFormat::dayDate($datetime).$timeText;
    }

    public function getCreatedAt()
    {
        return $this->short($this->created_at);
    }

    public function getCreatedAtLong()
    {
        return $this->long($this->created_at);
    }

    public function getUpdatedAt()
    {
        return $this->short($this->updated_at);
    }

    public function getUpdatedAtLong()
    {
        return $this->long($this->updated_at);
    }

    public function getDeletedAt()
    {
        return $this->short($this->deleted_at);
    }

    public function getDeletedAtLong()
    {
        return $this->long($this->deleted_at);
    }

    public function getCreatedDiffForHumans()
    {
        if (\Carbon\Carbon::parse($this->created_at)->diffInDays(now()) > 2) {
            return $this->short($this->created_at);
        }

        return $this->created_at->diffForHumans();
    }

    public function getUpdatedDiffForHumans()
    {
        if (\Carbon\Carbon::parse($this->updated_at)->diffInDays(now()) > 2) {
            return $this->short($this->updated_at);
        }

        return $this->updated_at->diffForHumans();
    }

    public function getDeletedDiffForHumans()
    {
        if (\Carbon\Carbon::parse($this->deleted_at)->diffInDays(now()) > 2) {
            return $this->short($this->deleted_at);
        }

        return $this->deleted_at->diffForHumans();
    }
}
