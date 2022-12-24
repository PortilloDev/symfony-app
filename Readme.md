## Crear proyecto
    `symfony new translate-app`


## Dependencias

    1 `composer require symfony/maker-bundle --dev`
	2 `composer require symfony/twig-pack`
	3 `composer require symfony/orm-pack`
	4 `composer require symfony/form`
    5 `composer require symfony/webpack-encore-bundle` -> dependencias para el front
    6 `composer require symfony/security-csrf` 
    7 `composer require sensio/framework-extra-bundle`  -> poder renderizar objetos
    8 `composer require symfony/validator`  -> validaciones
    9 `npm install bootstrap --save-dev`
    10 `npm install`
    11 `npm run dev`

## Iniciar proyecto:
    symfony serve

## Configuraciones

    1 Habilitar CSRF
        config/packages/framework.yaml => descomentar el campo csrf
    2 Crear bbdd
       Descomentar la bd a usar en el fichero .env
            DATABASE_URL="mysql://root:root@127.0.0.1:3306/symfony-form?serverVersion=8&charset=utf8mb4"
       php bin/console doctrine:database:create 
    
## Comandos
Crear controlador: 
    `php bin/console make:controller nombre_controlador`

Crear entidades
    `php bin/console make:entity` 

Crear formularios
    `php bin/console make:form`      

Crear migraciones
    `php bin/console make:migration` => crear el fichero
    `php bin/console doctrine:migrations:migrate` => crear las tablas en la base de datos

Comando para ejecutar validaciones relacionadas a una entidad
    `symfony console debug:validator ‘App\Entity\Post’`