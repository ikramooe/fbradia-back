<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
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
                    Image::make('Image'),

                    Text::make('Plus d\'info','more_link'),
                    Text::make('Lien inscription','inscription_link'),
                    Text::make('Lien soumission','soumission_link'),

                    Boolean::make('Arreter ?','ended'),
                    Trix::make('Texte fin','text_fin'),

                ]),
                Tab::make('Charte', [
                  
                    Text::make('Couleur primaire','primaire'),
                    Text::make('Couleur secondaire','secondaire'),

                  
                ]),

                Tab::make('Eposter', [
                  
                    Image::make('Image','image_eposter'),
                    Text::make('Titre Page','titre_page'),
                    Textarea::make('Texte','text_eposter'),
                    Select::make('Eposter', 'eposter_id')
                    ->options(function(){
                        // Assuming Form has a 'belongsTo' relationship with Event
                        $forms = Form::with('event')->get();
                
                        // Map the forms to the required format "titre form - titre event"
                        $options = $forms->mapWithKeys(function ($form) {
                            return [$form->id => $form->titre . ' - ' . $form->event->titre];
                        });
                
                        return $options;
                    })->displayUsingLabels()
                 

                  
                ]),

              

                Tab::make('Attestations', [
                  
                    Image::make('BG Attestation com','att_com'),
                    Image::make('BG Attestation pres','att_pres'),
                    Image::make('BG Attestation Eposter','att_eposter'),
                    Text::make('Code couleur','code_couleur'),

                    Trix::make('Texte Attestation com','text_att_com'),
                    Trix::make('Texte Attestation pres','text_att_pres'),
                    Trix::make('Texte Attestation Eposter','text_att_eposter'),

                  
                ]),


               
                Tab::make('Application', [
                  
                  
                  Image::make('BG Application','bg_application'),
                  Image::make('BG Application start','bg_application_start'),
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
                ->addLayout('Champ Eposter', 'eposter', [
                    Text::make('Label'),
                    Image::make('Image'),
                   
                   
                ])
                ->addLayout('Champ Questions', 'questions', [
                    Text::make('Label'),
                    Image::make('Image'),
                   
                   
                ])

                ]),

               
            ]),
           HasMany:make('formulaires')
            
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
