<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Date;
use Whitecube\NovaFlexibleContent\Flexible;
use Laravel\Nova\Http\Requests\NovaRequest;

use Eminiarts\Tabs\Traits\HasTabs;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Tab;

class Formulaire extends Resource
{
    use HasTabs;
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
    public static $title = 'titre';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','titre'
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
            Tabs::make('Formualaire', [
                Tab::make('Informations', [
                   
                    Text::make('Titre'),
                   
                    Image::make('Image'),
                   
                    BelongsTo::make('Event'),

                    Text::make('Voir', function () {
                        $details = "<a class='shrink-0 h-9 px-4 focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring text-white dark:text-gray-800 inline-flex items-center font-bold shadow rounded focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-800 inline-flex items-center font-bold px-4 h-9 text-sm shrink-0 h-9 px-4 focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring text-white dark:text-gray-800 inline-flex items-center font-bold' href='https://" . $this->event->titre . ".wemakeplus.com/formulaire/" . $this->titre . "' target='_blank'>Voir</a>";
                        return $details;
                    })->asHtml(),

                    
                ]),
                Tab::make('Supp', [
                  
                   
                    Text::make('Email'),
                    Date::make('Chrono','chrono'),
                   
                    Trix::make('Description'),
                    Textarea::make('Description bas de page','description_bas'),
                 
                ]),

              
              
            ]),


            HasMany::make('answers'),
           

           
           
          
          
          
            
           
            
           


          
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
