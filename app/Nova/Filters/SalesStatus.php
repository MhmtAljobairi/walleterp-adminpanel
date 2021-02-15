<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class SalesStatus extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('status', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'Prospecting' => 'Prospecting',
            'Lead qualification' => 'Lead qualification',
            'Information Sent' => 'Information Sent',
            'Demo or meeting.' => 'Demo or meeting',
            'Proposal' => 'Proposal',
            'Negotiation and commitment' => 'Negotiation and commitment',
            'Opportunity won' => 'Opportunity won',
            'No Answer' => 'No Answer',
            'Rejected' => 'Rejected',
            'Post-purchase' => 'Post-purchase',
        ];
    }
}
