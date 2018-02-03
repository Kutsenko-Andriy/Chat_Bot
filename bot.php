<?
header('Content-Type: text/html; charset=utf-8');
// подрубаем API
include('../../vendor/autoload.php'); //Подключаем библиотеку

// создаем переменную бота
$token = "472294769:AAFW4NR6_2S80wnG1VpPEdglr1GupeQnkxI";
$bot = new \TelegramBot\Api\Client($token);
$chatId = $message->getChat()->getId();

// обязательное. Запуск бота
$bot->command('start', function ($message) use ($bot) {
    $answer = 'Добро пожаловать!';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

// помощ
$bot->command('help', function ($message) use ($bot) {
    $answer = 'Команды: /help - помощ';
    //$bot->sendMessage($message->getChat()->getId(), $answer);

    $keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
        [
            [
                ['text' => 'link', 'url' => 'https://core.telegram.org']
            ]
        ]
    );

    $bot->sendMessage($message->getChat()->getId(), $answer, $keyboard);

});

// передаем картинку
$bot->command('getpic', function ($message) use ($bot) {
    $pic = "http://aftamat4ik.ru/wp-content/uploads/2017/03/photo_2016-12-13_23-21-07.jpg";

    $bot->sendPhoto($message->getChat()->getId(), $pic);
});

// передаем документ
$bot->command('getdoc', function ($message) use ($bot) {
    $document = new \CURLFile('files/test.txt');

    $bot->sendDocument($message->getChat()->getId(), $document);
});

// запускаем обработку
$bot->run();

?>