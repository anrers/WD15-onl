https://laravel.com/docs/11.x/filesystem

config/filesystem.php - отвечает за конфигурацию работы с файлами (где будут храниться)
параметр 'disks' - содержит идентификаторы папок, в которых будут сохраняться файлы (сокращенная настройка путей к папкам, 
хранящим файлы)
               -> параметр driver - классы, которые определяю с какой реализацией будем работать 
               -> параметр root - сокращенный пути к месту сохранения файлов
               -> url - по какому пути можно достучаться до файлов; добавление безопасности - чтобы не отображать файйловую  структуру приложения
               
В рамках Laravel два глобальных драйвера, определяющих место хранения файлов: local и внешний ('s3' - Amazon S3)
Storage -> app - по умолчанию хранит файлы, с которыми работает пользователь
Файлы
private
и
public - доступ по url (.../storage/app)

php artisan storage:link - команда создает ярлык папки storage в папке public (public/index.php - принимает все запросы)
В Laravel данные файла: request->file() (Illuminate/Support/UploadedFile)

$request->file('images');
Сохраняет в папку private/public (gпо умолчанию)
$file->storeAs('public', 'image');  - задает имя
$file->storePubliclyAs('public', 'image'); - доступен публично

Storage::disk('public') // переопределяем параметр disk (по умолчанию private)
->putFile("/tasks/$task->id", $data['images']);



$_FILES - для работы с файлами запроса (ассоциативный массив элементов, загруженных в текущий скрипт через метод HTTP POST)
$_REQUEST - $_POST + $_GET
$_POST - все данные всего POST-семейства (POST, PUT, PATCH)
$_GET - все данные get строки запроса
$_SESSION - данные сессии
$_COOKIE - данные кук
$_SERVER - параметры севрера