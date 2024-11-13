<?php
namespace App\Imports;

use App\Models\Answer;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AnswersImport implements ToModel, WithHeadingRow
{
    protected $form_id;

    public function __construct($form_id)
    {
        $this->form_id = $form_id;
    }

    public function model(array $row)
    {
        // Perform validation if needed
      
     
        // Create the answer record with the JSON data
        return Answer::create([
            'form_id' => $this->form_id,
            'answers' => json_encode([
                'form_id' => $this->form_id,
                'nom' => $row['nom'],
                'prenom' => $row['prenom'],
                'email' => $row['email'],
                'telephone' => $row['telephone'],
                'specialite' => $row['specialite'],
            ]),
        ]);
    }
}
