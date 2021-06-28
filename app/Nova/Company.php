<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;

class Company extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Company::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'org_company_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'org_company_name', 'email',
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

            Text::make('Company Name')
                ->sortable()
                ->rules('required', 'max:255')->hideFromIndex(),

            Text::make('Org Company Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Company Address')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:companies,email'),

            Text::make('Phone Number')
                ->sortable()->hideFromIndex(),

            Text::make('Mobile Number')
                ->sortable()->hideFromIndex(),

            Text::make('Fax Number')
                ->sortable()->hideFromIndex(),

            Text::make('Trade Name')
                ->sortable()
                ->rules('required', 'max:255')->hideFromIndex(),

            Text::make('Tax Number')
                ->sortable()->hideFromIndex(),

            Text::make('Website')
                ->sortable()->hideFromIndex(),


            Select::make('Financial Year')->options([
                    '2020' => '2020',
                    '2021' => '2021',
                    '2022' => '2022',
                    '2023' => '2024',
                    '2024' => '2025',
                    '2025' => '2026',
                    '2026' => '2027',
            ])->displayUsingLabels()->hideFromIndex(),

            Select::make('Company Type',"company_type_id")->options([
                    '1' => 'Fashion & Apparel',
                    '2' => 'Electrons Store',
                    '3' => 'Warehouse Store',
                    '4' => 'Restaurants',
                    '5' => 'Food & Drink Retail',
                    '6' => 'Supermarket',
                    '7' => 'Pharmacies',
                    '8' => 'Drug Store',
                    '9' => 'Other',
            ])->displayUsingLabels(),

            BelongsTo::make('Country'),
            HasOne::make('Subscription'),
            BelongsToMany::make('Modules'),

            BelongsToMany::make('Users')->fields(function () {
                return [
                    Text::make('Branch Id')->default(function ($request) {
                        return "1";
                    }),
                    Text::make('Printer MAC Address'),
                    Select::make('User Role Id')->options([
                        '1' => 'Owner	مالك',
                        '2' => 'Administrator	مدير',
                        '3' => 'Accountant	محاسب',
                        '4' => 'Sales	مبيعات',
                        '5' => 'Salesman	مندوب مبيعات',
                        '6' => 'Employee	موظف',
                        '7' => 'Trainee 	متدرب',
                        '8' => 'Customer	عميل',
                        '9' => 'Provider	مزود'])->displayUsingLabels(),

                    Select::make('Printer Type Id')->options([
                        '0' => 'Default Printer',
                        '9' => 'Default Printer Small',
                        '1' => 'TSC',
                        '5' => 'TSC Full Details',
                        '2' => 'Zebra',
                        '3' => 'Honeywell',
                        '4' => 'RPP 300',
                        '6' => 'Honeywell/ Intermec',
                        '7' => 'Diesel/Gas Printer',
                        '8' => 'Woosim',
                        '10' => 'Wallet ERP Printer',
                    ])->displayUsingLabels()
                ];
            }),
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
