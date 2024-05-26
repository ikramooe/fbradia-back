<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class EnvoyerAttestationEposter extends Action
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
        foreach ($models as $model) {
            // Assuming $model has a method to retrieve the user's email
           

            // Assuming $model has a method to retrieve the badge path

            $evt = $model->form->event;
            $model = json_decode($model->answers);
          //  $evt['p'] = $model->p;
            $evt['titre'] = isset($model->Titre_) ? $model->Titre_ : (isset($model->titre) ? $model->titre : "");
            $evt['nom'] = isset($model->Nom) ? $model->Nom : (isset($model->nom) ? $model->nom : "");
            $evt['prenom'] = isset($model->Prénom) ? $model->Prénom : (isset($model->prénom) ? $model->prénom : "");
            $evt['email'] = isset($model->Email) ? $model->Email : (isset($model->email) ? $model->email : "");
            $evt['image'] = isset($model->Abstracts) ? $model->Abstracts : (isset($model->abstracts) ? $model->abstracts : "");
            if($evt['image']=="{}") $evt['image']="";
            $evt['auteur'] = isset($model->Auteurs_) ? $model->Auteurs_ :  (isset($model->auteurs) ? $model->auteurs : "");
            

            
            $pdf = Pdf::loadView('attest-participation', ['evt' => $evt])->setPaper('a4', 'landscape');
            $pdf->getDomPDF()->set_option('margin-top', 0);
            $pdf->getDomPDF()->set_option('margin-right', 0);
            $pdf->getDomPDF()->set_option('margin-bottom', 0);
            $pdf->getDomPDF()->set_option('margin-left', 0);

            $userEmail = $evt->email;
            $pdf->save($evt->nom . '.pdf');

            $badgePath = $evt->nom . '.pdf';

            // Mail subject
            $subject = 'Attestation';

            // Mail content
            $content = 'Votre Inscription a été enregistrée , veuillez trouvez votre attestation en PJ.';

                Mail::raw($content, function ($message) use ($userEmail, $subject, $badgePath) {
                    $message->to($userEmail)->subject($subject)->attach($badgePath);
                });

              //  $model->sent = 1;
      

            // Send the email with the badge attached
        }

        return Action::message('Email sent!');
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
   
}
