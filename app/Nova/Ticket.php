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

            Text::make('Subject')
                ->sortable()
                ->rules('required', 'max:255'),

            Textarea::make('Content')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('Company')->rules('required'),
            BelongsTo::make('Admin')->rules('required')->hideFromIndex(),
            BelongsTo::make('User')->rules('required'),
            Select::make('Priority')->options([
                'Low' => 'Low',
                'Medium' => 'Medium',
                'High' => 'High',
            ])->displayUsingLabels()->rules('required'),
            BelongsTo::make('Ticket Status')->rules('required'),
            Image::make('Attachment')->hideFromIndex()

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
