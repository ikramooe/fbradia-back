<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use App\Nova\Actions\ImportData;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use App\Models\Form;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use App\Nova\Filters\TypeFilter;

class Answer extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Answer>
     */
    public static $model = \App\Models\Answer::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */

    public static function label()
    {
        return 'Toutes les reponses';
    }
    public static $title = 'id';
    public static function indexQuery($request, $query)
    {
        // Check if the 'answerfilter' parameter exists in the request
        if ($request->has('answerfilter')) {
            // Retrieve the value of 'answerfilter' parameter
            $answerFilter = $request->input('answerfilter');

            // Filter the query based on the value of 'answerfilter'
            return $query->where('form_id', $answerFilter);
        }

        // If 'answerfilter' parameter is not provided, return the original query
        return $query;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = ['id','answers'];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()
                ->sortable()
                ->canSee(function ($request) {
                    $options = json_decode($this->answers, true);
                    $details = '';

                    return !isset($options['p']);
                }),

     
            Text::make('P', function () {
                $options = json_decode($this->answers, true);
                $details = '';

                if (!empty($options['p'])) {
                    $details .= $options['p'];
                } else {
                    $details .= ' N/A';
                }

                return $details;
            })
                ->asHtml()
                ->canSee(function ($request) {
                    $options = json_decode($this->answers, true);
                    $details = '';

                    return isset($options['p']);
                }),

           
            Text::make('Nom', function () {
                $options = json_decode($this->answers, true);
                $details = '';

                if (!empty($options['nom'])) {
                    $details .= $options['nom'];
                } else {
                    $details .= ' N/A';
                }

                return $details;
            })->asHtml(),

            Text::make('Prénom', function () {
                $options = json_decode($this->answers, true);
                $details = 'N/A'; // Default value
            
                // Normalize keys to lowercase and check for 'prenom'
                $keys = ['prénom', 'prenom','Prénom','Prenom'];
                foreach ($keys as $key) {
                    if (!empty($options[$key])) {
                        $details = $options[$key];
                        break;
                    }
                }
            
                return $details;
            })->asHtml(),

            Text::make('Type', function () {
                $options = json_decode($this->answers, true);
                $details = 'N/A'; // Default value
            
                // Normalize keys to lowercase and check for 'prenom'
                $keys = ['type', 'Type'];
                foreach ($keys as $key) {
                    if (!empty($options[$key])) {
                        $details = $options[$key];
                        break;
                    }
                }
            
                return $details;
            })->asHtml(),



            Text::make('Email', function () {
                $options = json_decode($this->answers, true);
                $details = '';

                if (!empty($options['email'])) {
                    $details .= $options['email'];
                } else {
                    $details .= ' N/A';
                }

                return $details;
            })->asHtml(),

            Text::make('Specialite', function () {
                $options = json_decode($this->answers, true);
                $details = '';

                if (!empty($options['specialite'])) {
                    $details .= $options['specialite'];
                } else {
                    $details .= ' N/A';
                }

                return $details;
            })->asHtml(),

            Text::make('Abstract', function () {
                $options = json_decode($this->answers, true);
                $details = '';

                if (!empty($options['abstracts'])) {
                    $options['abstracts'] = str_replace('uploads/', 'storage/uploads/', $options['abstracts']);
                    $details .= "<a class='shrink-0 h-9 px-4 focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring text-white dark:text-gray-800 inline-flex items-center font-bold shadow rounded focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-800 inline-flex items-center font-bold px-4 h-9 text-sm shrink-0 h-9 px-4 focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring text-white dark:text-gray-800 inline-flex items-center font-bold' href='" . asset($options['abstracts']) . "' target='_blank'>Voir</a>";
                } else {
                    $details .= ' N/A';
                }

                return $details;
            })->asHtml(),

            Text::make('Reponses', function () {
                $options = json_decode($this->answers, true);
                $details = '';

                if ($options) {
                    foreach ($options as $key => $value) {
                        if ($key != 'abstracts' && $key != 'form_id' && $key != 'Form_id') {
                            $details .= '<strong>' . ucfirst($key) . ':</strong> ' . ($value ?? 'N/A') . '<br>';
                        }
                    }

                    if (!empty($options['abstracts'])) {
                        $options['abstracts'] = str_replace('uploads/', 'storage/uploads/', $options['abstracts']);
                        $details .= "Abstracts : <a class='shrink-0 h-9 px-4 focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring text-white dark:text-gray-800 inline-flex items-center font-bold shadow rounded focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-800 inline-flex items-center font-bold px-4 h-9 text-sm shrink-0 h-9 px-4 focus:outline-none ring-primary-200 dark:ring-gray-600 focus:ring text-white dark:text-gray-800 inline-flex items-center font-bold' href='" . asset($options['abstracts']) . "' target='_blank'>Voir</a>";
                    } else {
                        $details .= ' N/A';
                    }
                } else {
                    $details .= 'No answers available';
                }

                return $details;
            })->asHtml(),

            DateTime::make('Créer le ', 'created_at'),
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
        return [
            (new \App\Nova\Filters\TypeFilter)
            ->canRun(function(){
                    return true;
            })
            ->canSee(function(){
                    return true;
            }),
        ];
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
        return [  new ImportData,(new DownloadExcel)->withHeadings(),new Actions\ImprimerBadge(), new Actions\EnvoyerAttestation(),new Actions\EnvoyerAttestationParticipation(),new Actions\EnvoyerAttestationEposter()];
    }
      
    
}
