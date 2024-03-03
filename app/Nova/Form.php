<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Flexible;
use Laravel\Nova\Http\Requests\NovaRequest;

class Form extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Form>
     */
    public static $model = \App\Models\Form::class;

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
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Titre'),
            Textarea::make('Description'),
            Textarea::make('Description bas de page','description_bas'),
            BelongsTo::make('Event'),
            
            
            Flexible::make('Content')
            ->addLayout('Champ text', 'text', [
                Text::make('Label'),
                Text::make('Name'),
               Select::make('Requis')
                ->options([
                    '1'=>'Oui',
                    '0'=>'Non'
                ]),
               
            ])
            ->addLayout('Champ textarea', 'textarea', [
                Text::make('Label'),
                Text::make('Name'),
               Select::make('Requis')
                ->options([
                    '1'=>'Oui',
                    '0'=>'Non'
                ]),
               
            ])
            ->addLayout('Champ fichier', 'file', [
                Text::make('Label'),
                Text::make('Name'),
               Select::make('Requis')
                ->options([
                    '1'=>'Oui',
                    '0'=>'Non'
                ]),
               
            ])
            ->addLayout('Champ pays', 'pays', [
                Text::make('Label'),
               
            ])
            ->addLayout('Champ wilaya', 'wilaya', [
                Text::make('Label'),
               
            ])
            ->addLayout('Champ radio', 'radio', [
                Text::make('Label'),
                Text::make('Name'),
               Select::make('Requis')
                ->options([
                    '1'=>'Oui',
                    '0'=>'Non'
                ]),
                Flexible::make('Options')
                    ->addLayout('Champ option', 'option', [
                       
                        Text::make('Name'),
                      
               
                ])
            ])
            ->addLayout('Champ checkbox', 'checkbox', [
                Text::make('Label'),
                Text::make('Name'),
               Select::make('Requis')
                ->options([
                    '1'=>'Oui',
                    '0'=>'Non'
                ]),
                Flexible::make('Options')
                    ->addLayout('Champ option', 'option', [
                       
                        Text::make('Name'),
                       
               
                ])
            ])
            ->addLayout('Champ select', 'select', [
                Text::make('Label'),
                Text::make('Name'),
             
                Select::make('Requis')
                ->options([
                    '1'=>'Oui',
                    '0'=>'Non'
                ]),
                Flexible::make('Options')
                    ->addLayout('Champ option', 'option', [
                       
                        Text::make('Name'),
                       
               
                ])
            ])


          
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
