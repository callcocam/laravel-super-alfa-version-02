<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Scopes;

use Carbon\Carbon;

trait DateRange
{

    public function field_date_name(){
        return 'created_at';
    }

    /**
     * Scope a query to only include the current minute entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentMinute($query)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->second(0),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last minute entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopelastMinute($query)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subMinute()->second(0),
            Carbon::now()->second(0)
        ]);
    }

    /**
     * Scope a query to only include the current hour entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentHour($query)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->minute(0)->second(0),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last hour entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastHour($query)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subHour()->minute(0)->second(0),
            Carbon::now()->minute(0)->second(0)
        ]);
    }

    /**
     * Scope a query to only include the current day entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentDay($query)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->startOfDay(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last day entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastDay($query)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subDay()->startOfDay(),
            Carbon::now()->startOfDay()
        ]);
    }

    /**
     * Scope a query to only include the current week entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentWeek($query)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->startOfWeek(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last week entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastWeek($query)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ]);
    }

    /**
     * Scope a query to only include the current month entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentMonth($query)
    {

        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->startOfMonth(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last month entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastMonth($query)
    {

        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ]);
    }

    /**
     * Scope a query to only include the current year entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrentYear($query)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->startOfYear(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last year entries.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastYear($query)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subYear()->startOfYear(),
            Carbon::now()->subYear()->endOfYear()
        ]);
    }

    /**
     * Scope a query to only include the last x seconds entries.
     *
     * @param $query
     * @param int $countSeconds
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastSeconds($query, int $countSeconds=3600)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subSeconds($countSeconds),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x minutes entries.
     *
     * @param $query
     * @param int $countMinutes
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastMinutes($query, int $countMinutes=360)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subMinutes($countMinutes)->second(0),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x hours entries.
     *
     * @param $query
     * @param int $countHours
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastHours($query, int $countHours=24)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subHours($countHours)->minute(0),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x days entries.
     *
     * @param $query
     * @param int $countDays
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastDays($query, int $countDays=30)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subDays($countDays)->startOfDay(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x weeks entries.
     *
     * @param $query
     * @param int $countWeeks
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastWeeks($query, int $countWeeks=1)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subWeeks($countWeeks)->startOfWeek(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x months entries.
     *
     * @param $query
     * @param int $countMonths
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastMonths($query, int $countMonths=1)
    {

        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subMonths($countMonths)->startOfMonth(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x months entries.
     *
     * @param $query
     * @param int $countMonths
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNextMonths($query, int $countMonths=1)
    {

        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->addDay(),
            Carbon::now()->addMonths($countMonths)->startOfMonth()
        ]);
    }

    /**
     * Scope a query to only include the last x years entries.
     *
     * @param $query
     * @param int $countYears
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastYears($query, int $countYears=1)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->subYears($countYears)->startOfYear(),
            Carbon::now()
        ]);
    }

    /**
     * Scope a query to only include the last x years entries.
     *
     * @param $query
     * @param int $countYears
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNextYears($query, int $countYears=1)
    {
        return $query->whereBetween($this->field_date_name(), [
            Carbon::now()->addDay(),
            Carbon::now()->addYears($countYears)->startOfYear()
        ]);
    }
}
