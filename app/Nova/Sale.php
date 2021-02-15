<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Eminiarts\Tabs\Tabs;

class Sale extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Sale::class;

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
        'id', 'name', 'email',
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

            Tabs::make('Sales Information', [
                'Information'    => [
                    ID::make()->sortable()->hideFromIndex(),

                    Date::make('Date')->format('YYYY-MM-DD')
                    ->sortable()
                    ->rules('required', 'max:255'),

                    Text::make('Company Name')
                    ->sortable()
                    ->rules('required', 'max:255'),

                    Text::make('Contact Name')
                    ->sortable()
                    ->rules('required', 'max:255')->hideFromIndex(),

                    Text::make('Telephone Number')
                    ->sortable()
                    ->rules('required', 'max:255'),

                    Text::make('Email Address')
                    ->sortable()->hideFromIndex(),


                    Text::make('Field')
                    ->sortable()
                    ->rules('required', 'max:255'),

                    Text::make('Location')
                    ->sortable()
                    ->rules('required', 'max:255')->hideFromIndex(),

                    Select::make('Status')->options([
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
                    ])->displayUsingLabels()->default('Prospecting'),

                    Textarea::make('Notes')->sortable()



                ],
                'Sale Notes' => [
                    HasMany::make('SaleNote'),
                ],
                'Tasks' => [
                    HasMany::make('SaleTask'),
                ],
                ])->withToolbar(),

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
        return [new  \App\Nova\Metrics\CountSalesMeeting , new \App\Nova\Metrics\SalesPerStatus];

    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [new \App\Nova\Filters\SalesStatus];
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
