<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;

class Deposit extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Deposit::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','dateT','Name',
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
             ID::make('IDTrans', 'id_column'),
            Gravatar::make()->maxWidth(50),
            
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
            Currency::make('price')->min(1)->max(1000)->step(0.01),
            Text::make('Pricefixed', 'price', function () {
                return !is_null($this->price) ? number_format($this->price, ',') : 0;
            }),
        
            Date::make('dateT')->pickerDisplayFormat('d.m.Y'),
            Currency::make('Product value', 'product_value')->currency('EUR')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    
}
