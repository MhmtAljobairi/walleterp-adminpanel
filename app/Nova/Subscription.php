<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class Subscription extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Subscription::class;

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
        'id'
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
            ID::make()->sortable(),


            Text::make('Name')
            ->sortable()
            ->rules('required', 'max:255'),

            Date::make('Date')->format('YYYY-MM-DD')
                ->sortable()
                ->rules('required', 'max:255'),

            Select::make('Peroid','period_type_id')->options([
                    '14' => 'Trial',
                    '30' => 'Monthly',
                    '90' => '3 Months',
                    '182' => '6 Months',
                    '365' => 'Yearly',
                    '750' => '2 Year',
            ])->displayUsingLabels(),

            Select::make('Subscription Type','subscription_type_id')->options([
                    '1' => 'Subscription',
                    '2' => 'Licenses',
            ])->displayUsingLabels(),

            Number::make('Companies Number')
                ->min(1)->max(1000)
                ->sortable()
                ->rules('required', 'max:255'),
            Number::make('users Number')
                ->min(1)->max(1000)
                ->sortable()
                ->rules('required', 'max:255'),


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
        return [];
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
