<?php

namespace App\Helpers;

class OrdersHelper
{
    public static function requestArray($result)
    {
        $errorCodes = [
            'ACCESS_ACTIVATION' => 6, //Сервис успешно активирован
            'ACCESS_CANCEL' => 8, //Активация отменена
            'ACCESS_READY' => 3, //Ожидание нового смс
            'ACCESS_RETRY_GET' => 1, //Готовность номера подтверждена
            'ACCOUNT_INACTIVE' => 'Свободных номеров нет',
            'ALREADY_FINISH' => 'Аренда уже завершена',
            'ALREADY_CANCEL' => 'Аренда уже отменена',
            'BAD_ACTION' => 'Некорректное действие (параметр action)',
            'BAD_SERVICE' => 'Некорректное наименование сервиса (параметр service)',
            'BAD_KEY' => 'Неверный API ключ доступа',
            'BAD_STATUS' => 'Попытка установить несуществующий статус',
            'BANNED' => 'Аккаунт заблокирован',
            'CANT_CANCEL' => 'Невозможно отменить аренду (прошло более 20 мин.)',
            'ERROR_SQL' => 'Один из параметров имеет недопустимое значение',
            'NO_NUMBERS' => 'Нет свободных номеров для приёма смс от текущего сервиса',
            'NO_BALANCE' => 'Закончился баланс',
            'NO_YULA_MAIL' => 'Необходимо иметь на счету более 500 рублей для покупки сервисов холдинга Mail.ru и Mamba',
            'NO_CONNECTION' => 'Нет соединения с серверами sms-activate',
            'NO_ID_RENT' => 'Не указан id аренды',
            'NO_ACTIVATION' => 'Указанного id активации не существует',
            'STATUS_CANCEL' => 'Активация/аренда отменена',
            'STATUS_FINISH' => 'Аренда оплачена и завершена',
            'STATUS_WAIT_CODE' => 4, //Ожидание первой смс
            'STATUS_WAIT_RETRY' => 5, //Ожидание уточнения кода,
            'SQL_ERROR' => 'Один из параметров имеет недопустимое значение',
            'INVALID_PHONE' => 'Номер арендован не вами (неправильный id аренды)',
            'INCORECT_STATUS' => 'Отсутствует или неправильно указан статус',
            'WRONG_SERVICE' => 'Сервис не поддерживает переадресацию',
            'WRONG_SECURITY' => 'Ошибка при попытке передать ID активации без переадресации, или же завершенной/не активной активации'
        ];

        if (array_key_exists($result, $errorCodes)){
            return $errorCodes[$result];
        } else {
            return false;
        }
    }
}
