<?php
/*Дз 16:
Написать функцию, которая будет проверять пароль. Правила:

1. Содержит от 8 до 16 символов
2. Содержит буквы и цифры
4. Содержит минимум 2 символа из набора символов ?:%!()*+=_
3. Имеет минимум 1 заглавную букву
4. Не содержит пробелов*/

$password = "RRihucs345()y";

function examinationPassword($password)
{
    if(strlen($password) >= 8 && strlen($password) <= 16){
        $resultLen = "";
    } else {
        $resultLen = "Длинна пароля не соответствует. <br>";}
    if(preg_match("#[a-zA-Z0-9]#", $password)){
        $resultW = "";
    } else {$resultW = "Пароль должен содержать буквы и цифры. <br>";
    }
    if (preg_match("#[\?:%!\(\)*+=_]{2,}#", $password)){
        $resultSym = "";
    } else {
        $resultSym = "Пароль должен содержать минимум 2 символа из набора символов ?:%!()*+=_  <br>";
    }
    if(preg_match("#[A-Z]#", $password)){
        $resultUp = "";
    } else {
        $resultUp = "Пароль должен содержать заглавные буквы. <br>";
    }
    if (!preg_match("# #", $password)){
        $resultSpace = "";
    } else {
        $resultSpace = "Не должно быть пробелов. <br>";
    }

    $resultAll = $resultLen.$resultUp.$resultSym.$resultW.$resultSpace;
    if(empty($resultAll)){
        return "Пароль соответствует нашим строгим требованиям";
    } else {
        return $resultLen.$resultUp.$resultSym.$resultW.$resultSpace;
    }
};

echo examinationPassword($password);
