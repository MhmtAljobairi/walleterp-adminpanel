<?php

namespace App\Nova\Metrics;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;
use App\Models\Ticket;

class TicketsPerStatus extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->count($request, Ticket::class, 'ticket_status_id')->label(function ($value) {
            switch ($value) {
                case 1:
                    return 'New';
                case 2:
                    return 'Waiting On Contact';
                case 3:
                    return 'Waiting On Us';
                case 4:
                    return 'Fixed';
                case 5:
                    return 'Closed';
                default:
                    return ucfirst($value);
            }
        });
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'tickets-per-status';
    }
}
