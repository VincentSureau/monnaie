<?php

namespace App;

class RendreMonnaie
{
    function rendreMonnaie($montantDonne, $prixAPayer): string {
        $billets = [5, 10, 20, 50, 100, 200];
        $pieces = [0.01, 0.02, 0.05, 0.10, 0.20, 0.50, 1, 2 ];
        $reste = null;
        
        if($montantDonne < $prixAPayer) {
            throw new \Exception('Le montant donné est insuffisant');
        }
        if($montantDonne == $prixAPayer) {
            return 'Montant à rendre : 0€';
        }
        if($prixAPayer == 0) {
            return "Montant à rendre : {$montantDonne}€";
        }
        $reste = $montantDonne - $prixAPayer;
        $billets = array_reverse($billets);
        $pieces = array_reverse($pieces);
        $message = "Montant à rendre : {$reste}€";
        // pour chaque billet 
            // vérifier que montant à rendre est >= aux billets
                // calculer le nombre de billets à rendre
                // calculer le nouveau resteARendre
        // pour chaque piece
            // vérifier que montant à rendre est >= aux pièces
                // calculer le nombre de pièces à rendre
                // calculer le nouveau reste à rendre

        foreach ($billets as $key => $value) {
            if($reste >= $value) {
                $nbBillets = floor($reste / $value);
                $reste = $reste - ($value * $nbBillets);
                $message .= "\nNombre de billet de {$value}€ : {$nbBillets}"; 
            }
        }
        $reste *= 100;
        foreach ($pieces as $key => $value) {
            $coin = $value;
            $value *=100;
            if($reste >= $value) {
                $nbPieces = floor($reste / $value);
                $reste = $reste - ($value * $nbPieces);
                if($value < 100) {
                    $message .= "\nNombre de pièces de {$value}cts : {$nbPieces}"; 
                } else {
                    $message .= "\nNombre de pièces de {$coin}€ : {$nbPieces}"; 
                }
            }
        }
        return $message;
    }
}