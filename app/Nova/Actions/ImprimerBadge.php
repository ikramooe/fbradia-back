<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use App\Models\ActionLog; 
use Auth;

class ImprimerBadge extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        
         ActionLog::create([
                'user_id' => Auth::id(), // The current authenticated user
                'action' => 'Imprimer badge', // The name of the action being executed
                'resource_type' => get_class($models[0]), // The class name of the resource (e.g., 'App\\Nova\\Answer')
                'resource_id' => $models[0]->id, // The ID of the resource being acted upon
         ]);

       return Action::redirect('/badge/'.$models[0]->id);
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
  
}