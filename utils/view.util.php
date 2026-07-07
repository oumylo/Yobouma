<?php

$saisie = function (string $message) : string {
    return readline($message);
};


$showError = function (array $errors) : void {

    array_walk($errors, function ($error) {

        array_walk($error, function ($erreur) {

            echo $erreur;

        });

    });

};

$selectModel = function (array $datas,callable $saisie,string $message = "Faites votre choix : ",bool $returnIndex = false,string $key = "nom") : string | int {

    array_walk($datas, function ($data, $index) use ($key) {

        echo "$index-$data[$key] \n" ;

    });

    $selectModelIndex = (int) $saisie($message);

    return $returnIndex ? $selectModelIndex : $datas[$selectModelIndex][$key];

};

