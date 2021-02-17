<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;

class Ticket extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Ticket::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'subject', 'content',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable()->hideFromIndex(),

            Date::make('Date')->format('YYYY-MM-DD')->default(new DateTime('today')),
            Text::make('Subject')
                ->sortable()
                ->rules('required'),

            Textarea::make('Issue')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Company')->rules('required')->searchable(),
            BelongsTo::make('Admin')->rules('required')->hideFromIndex()->searchable(),
            BelongsTo::make('User')->rules('required')->searchable(),
            Select::make('Priority')->options([
                'Low' => 'Low',
                'Medium' => 'Medium',
                'High' => 'High',
            ])->displayUsingLabels()->rules('required')->default("Medium"),
            BelongsTo::make('Ticket Status')->rules('required')->default(1),
            Image::make('Attachment')->hideFromIndex(),
            Textarea::make('Response')
            ->sortable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [new \App\Nova\Metrics\NewTickets,new \App\Nova\Metrics\ClosedTickets,new \App\Nova\Metrics\TicketsPerStatus];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
