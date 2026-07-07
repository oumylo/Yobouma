<?php

require_once __DIR__ . "/../model/users.model.php";
require_once __DIR__ . "/../service/AuthService.php";
require_once __DIR__ . "/../utils/view.util.php";

$saisie = fn(string $message) => readline($message);

$telephone = $saisie("Téléphone : ");
$password = $saisie("Mot de passe : ");

$user = $auth($users, $telephone, $password);

if ($user !== null) {
    echo "Connexion réussie\n";

    if ($user["role"] === "passager") {
        require_once __DIR__ . "/passager.controller.php";
    }

    if ($user["role"] === "chauffeur") {
        require_once __DIR__ . "/chauffeur.controller.php";
    }
} else {
    echo "Identifiants incorrects\n";
}