<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
use App\Models\Form;
use Eminiarts\Tabs\Traits\HasTabs;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Tab;

class Event extends Resource
{
    use HasTabs;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Event>
     */
    public static $model = \App\Models\Event::class;

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
            
            Tabs::make('Some Title', [
                Tab::make('Générales', [
                    ID::make()->sortable(),

                    Text::make('Titre'),
                    Text::make('Organisateur'),
                    Text::make('Date'),
                    Text::make('Heure'),
                    Text::make('Lieu'),
                    Trix::make('Programme'),
                    Image::make('Image')
                ]),
                Tab::make('Charte', [
                  
                    Text::make('Couleur primaire','primaire'),
                    Text::make('Couleur secondaire','secondaire'),

                  
                ]),

                Tab::make('Eposter', [
                  
                    Select::make('Eposter','eposter_id')
                    ->options(function(){
                        $forms = Form::pluck('titre','id');
                        return $forms;

                    }),
                 

                  
                ]),

              

                Tab::make('Attestations', [
                  
                    Image::make('BG Attestation com','att_com'),
                    Image::make('BG Attestation pres','att_pres'),

                    Textarea::make('Texte Attestation com','text_att_com'),
                    Textarea::make('Texte Attestation pres','text_att_pres'),

                  
                ]),


               
                Tab::make('Application', [
                  
                  
                  Image::make('BG Application','bg_application'),
                  File::make('Application apk','apk'),
                  Flexible::make('Application')
                  ->addLayout('Champ fichier', 'fichier', [
                      Text::make('Label'),
                      Image::make('Image'),
                      File::make('fichier')
                     
                  ])

                  ->addLayout('Champ lien', 'lien', [
                    Text::make('Label'),
                    Image::make('Image'),
                    Text::make('Lien'),
                   
                ])

                ]),
            ]),
          
            
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
