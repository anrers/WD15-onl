Composer:
1. автозагрузка
2. управление зависимостями 
3. исполнение скриптов composer-a

Событие - какое-то совершаемое программой действие, которое возникает 
в различных точках исполняемого кода при выполнении определённых условий.

События предназначены для того, чтобы иметь возможность предусмотреть 
реакцию программного обеспечения на действия. 

Event -> Listener (принимает в м-д handle объект события, которые прослушивает)

Использование: 
1. Одно событие в нескольких точках системы с одной и той же реакцией
2. Следование принципам единой ответственности + безопасное расширение кода (расширение без модификации основного события)
3. Уменьшение связанности кода

moments in a model's lifecycle: 
retrieved - запрос из бд
creating, created, updating, updated, saving, saved, deleting, deleted, 
trashed, 
forceDeleting, 
forceDeleted, 
restoring, 
restored, 
and replicating.

Регистрация  наблюдателя (event и слушатель регистрировать не нужно)
#[ObservedBy([TaskObserver::class])]
или 
You may register observers in the boot method of your application's AppServiceProvider class:

...
use App\Models\User;
use App\Observers\UserObserver;

/**
* Bootstrap any application services.
  */
  public function boot(): void
  {
  User::observe(UserObserver::class);
  }
...