<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class HomeController extends Controller
{
    public function addToAnswerAteliers(Request $request, $answerId)
{
    // Retrieve the answer by ID
   
    $answer = Answer::findOrFail($answerId);
    
    // Get the atelier details from query parameters
    $nom = $request->query('nom');
    $codeCouleur = $request->query('code_couleur');

    // Decode the existing ateliers field
    $currentAteliers = json_decode($answer->ateliers, true) ?? [];

    // Add the new atelier if it doesn't already exist
    if (!collect($currentAteliers)->contains(function ($existingAtelier) use ($nom, $codeCouleur) {
        return $existingAtelier['nom'] === $nom && $existingAtelier['code_couleur'] === $codeCouleur;
    })) {
        $currentAteliers[] = ['nom' => $nom, 'code_couleur' => $codeCouleur];
    }

    // Save updated ateliers field
    $answer->ateliers = json_encode($currentAteliers);
    $answer->save();

    return redirect()->back()->with('success', "{$nom} added to ateliers.");
}

public function removeFromAnswerAteliers(Request $request, $answerId)
{
    // Retrieve the answer by ID
    $answer = Answer::findOrFail($answerId);

    // Get the atelier details from query parameters
    $nom = $request->query('nom');
    $codeCouleur = $request->query('code_couleur');

    // Decode the existing ateliers field
    $currentAteliers = json_decode($answer->ateliers, true) ?? [];

    // Remove the specified atelier if it exists
    $updatedAteliers = array_filter($currentAteliers, function ($existingAtelier) use ($nom, $codeCouleur) {
        return $existingAtelier['nom'] !== $nom || $existingAtelier['code_couleur'] !== $codeCouleur;
    });

    // Save the updated ateliers field
    $answer->ateliers = json_encode(array_values($updatedAteliers));
    $answer->save();

    return redirect()->back()->with('success', "{$nom} removed from ateliers.");
}

}
