<?php

$required = function (array &$errors, string $message, string $value, string $key) {

    if (empty($value)) {
        $errors[$key]["required"] = $message;
    }

};


$unique = function (array $datas, array &$errors, string $message, string $value, string $key) {

    if (in_array($value, $datas)) {
        $errors[$key]["unique"] = $message;
    }

};


$existeValue = function (
    array &$errors,
    array $datas,
    string $value,
    string $key,
    string $message
): int {

    $indexTrouve = -1;

    array_walk($datas, function ($data, $index) use (&$indexTrouve, $value, $key) {

        if ($data[$key] == $value) {
            $indexTrouve = $index;
        }

    });


    if ($indexTrouve !== -1) {
        return $indexTrouve;
    }


    $errors[$key]["isExiste"] = $message;

    return -1;
};


$errorExist = function (array $errors): bool {

    return count($errors) !== 0;

};