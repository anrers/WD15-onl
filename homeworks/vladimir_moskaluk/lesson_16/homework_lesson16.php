<?php

//Написать функцию, которая будет проверять пароль. Правила:
//1. Содержит от 8 до 16 символов
//2. Содержит буквы и цифры
//4. Содержит минимум 2 символа из набора символов ?:%!()*+=_
//3. Имеет миниму 1 заглавную букву
//4. Не содержит пробелов
function verification ($password)
{
       $pattern = '#^(?=\S{8,16})(?=.*[A-Z])(?=.*\d)(?=(.*[?:%!()*+=_]){2,})\S{8,16}$#';
    return preg_match($pattern, $password);
}




