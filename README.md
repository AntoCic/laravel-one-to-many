# Dopo aver clonato lanciare
- npm i
- composer install
- cp .env.example .env 
- php artisan key:generate

## AVVIARE SEVER
- php artisan serve  
### IN UN SECONSO TERMINALE
- npm run dev

## CMD crezione CRUD
- php artisan make:model NomeSingolarePrimaLetteraMaiuscola -a

cancellare controller se nella cartella sbagliata
- php artisan make:controller cartellaGiusta/PageController -r --model=ModelName

## CMD utili
- php artisan make:model NomeSingolarePrimaLetteraMaiuscola -a
- php artisan make:model NomeSingolarePrimaLetteraMaiuscola -m
- php artisan make:controller --help
- php artisan make:controller PageController
- php artisan make:controller PageController -r --model[=Model]
- php artisan make:migration nome_della_migration
- php artisan make:migration create_users_table
- php artisan make:migration update_users_table --table=users
- php artisan make:migration add_phone_nunber_to_users_table
- php artisan migrate --help
- php artisan migrate:rollback
- php artisan migrate:status
- php artisan make:seeder TrainsSeeder
- php artisan db:seed --class=TrainsSeeder

- php artisan route:list

Route::resource('pastas', PastaController::class);


https://laravel.com/docs/10.x/seeding
https://fakerphp.org


composer create-project laravel/laravel:^10.0 laravel-auth-template
cd C:\Users\antoc\Dev\gitRepository\laravel-auth-template
composer require laravel/breeze --dev
 aggiungere "type": "module", in package.json
php artisan breeze:install
composer require pacificdev/laravel_9_preset
php artisan preset:ui bootstrap --auth 
npm i   