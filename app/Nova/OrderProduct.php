<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Currency;

class OrderProduct extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\OrderProduct::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'code';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'code',
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
      
            ID::make(),

            // Using the "id_column" column...
             ID::make('CodeOrder', 'id_column'),
            Gravatar::make()->maxWidth(50),
            
            Text::make('Designation')
                ->sortable()
                ->rules('required', 'max:255'),
            Number::make('Quantity')
                ->sortable(),
            Currency::make('Price')->currency('MRU'),
                Currency::make('Price$')->currency('USD'),
             
                Select::make('Status')->options([
                    'approved' => 'At the market',
                    'waiting' => 'in the way',
                
                ])
            
            
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function calculate(NovaRequest $request)
{
    $orderLine = OrderLine::selectRaw('SUM(quantity * price) as total');

    return (new \Laravel\Nova\Metrics\ValueResult($orderLine->total))
        ->format(['thousandSeparated' => true])
        ->currency('$');
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
