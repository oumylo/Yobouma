<?php


$auth = function(array $users,string $telephone,string $password): array|null {

    $resultat = array_filter(
        $users,
        fn($user) =>$user["telephone"] === $telephone && $user["password"] === $password);
            return array_values($resultat)[0] ?? null;

};