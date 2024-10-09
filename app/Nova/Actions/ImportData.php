<?php
namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Select;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AnswersImport;

class ImportData extends Action
{
    use InteractsWithQueue, Queueable;

    public $name = 'Import Data';

    /**
     * Perform the action.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        // Loop through the selected forms
        foreach ($models as $model) {
            // Import the data from the CSV
            Excel::import(new AnswersImport($model->id), $fields->csv_file);
        }

        return Action::message('Data imported successfully.');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            File::make('CSV File', 'csv_file')
                ->rules('required', 'file', 'mimes:csv,txt'),

            Select::make('Form', 'form_id')
                ->options(\App\Models\Form::all()->pluck('name', 'id'))
                ->rules('required')
        ];
    }
}
