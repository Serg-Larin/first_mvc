<?php

const PAGE_NOT_FOUND = 1;
const USER_NOT_FOUND = 2;
const VARIABLE_IS_NOT_FOUND = 3;
const VARIABLE_IS_DIFFERENT_DATA_TYPE = 4;
const VIEW_IS_NOT_FOUND = 5;
const DATABASE_CONNECT_ERROR = 6;




const ERROR_MASSAGES = [
    PAGE_NOT_FOUND => 'Страница не найдена',
    USER_NOT_FOUND => 'Пользователь не найден',
    VARIABLE_IS_NOT_FOUND => 'Переменная :variable не найдена',
    VARIABLE_IS_DIFFERENT_DATA_TYPE => 'Переменная :variable не соответвтствует ожидаемому типу',
    VIEW_IS_NOT_FOUND =>  'Представление :variable не найдено',
    DATABASE_CONNECT_ERROR => 'Ошибка подключения базы данных'
];



function getError($error,$variable = false){
    if($variable !== false){
      return  '<h1>'.str_replace(':variable',$variable,ERROR_MASSAGES[$error]).'</h1>';
    }
    return ERROR_MASSAGES[$error];
}
