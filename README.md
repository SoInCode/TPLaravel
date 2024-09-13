## TP LARAVEL

### Installation

**créer le projet**  
>``composer create-project laravel/laravel tpLaravel``

**créer la base de données "exemple avec Laragon"**

paramétrer .env

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=dwwm23530_tplaravel  
DB_USERNAME=root  
DB_PASSWORD=  

**commandes à taper avant de lancer l'appli**  
>``php artisan migrate``  
>``php artisan serve``  

**installer breeze**
>``composer require laravel/breeze ``  
>``php artisan breeze:install``  
>``npm install``  
>~~``php artisan migrate``~~  


**modeles, migrations**
>``php artisan make:model Civilite -m``  
>``php artisan make:model Client -m``  

seeder

routes

**controller**

>``php artisan make:Controller ClientController --resource``

**debugbar**
>``composer require barryvdh/laravel-debugbar --dev``

**request**
>``php artisan make:request ClientRequest``