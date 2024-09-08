Para iniciar la pagina es necesario acatar las sisguientes instrucciones

Programas necesarios

Composer
Node.js
PHP (Incluido en XAMPP)
XAMPP

El siguiente paso es ejecutar los siguientes comandos y crear el archivo .env que ya esta creado solo elimina el ".example"

En ese mismo archivo puedes cambiar la conexion de tu base de datos

npm install

composer install 

composer require laravel/passport

php artisan passport:install     

php artisan passport:keys --force

php artisan passport:client --personal

php artisan migrate

php artisan db:seed


Configuracion XAMPP (Torres)

CAmbia la ruta por defecto a la ruta que escogiste para el proyecto, esto no abrira directamente la pagina de inicio, tendras que selccionar "Public" en el directorio

DocumentRoot "C:\Programacion\GearUp-TBI" 
<Directory "C:\Programacion\GearUp-TBI">
    #
    # Possible values for the Options directive are "None", "All",
    # or any combination of:
    #   Indexes Includes FollowSymLinks SymLinksifOwnerMatch ExecCGI MultiViews
    #
    # Note that "MultiViews" must be named *explicitly* --- "Options All"
    # doesn't give it to you.
    #
    # The Options directive is both complicated and important.  Please see
    # http://httpd.apache.org/docs/2.4/mod/core.html#options
    # for more information.
    #
    Options Indexes FollowSymLinks Includes ExecCGI

    #
    # AllowOverride controls what directives may be placed in .htaccess files.
    # It can be "All", "None", or any combination of the keywords:
    #   AllowOverride FileInfo AuthConfig Limit
    #
    AllowOverride All

    #
    # Controls who can get stuff from this server.
    #
    Require all granted
</Directory>


Las cuentas se inician segun el Email de las personas registradas como admin, solo hay 3 por defecto

JohnDoe@gmail.com
RobertJohnson@gmail.com
JamesBrown@gmail.com

Todos tienen la misma contraseña

password

Los empleados que sufran un cambio de rol hacia Administrador se les generara su propia cuenta pra que inicien sesion, solo tendras que poner su respectivo Email

Los Emails los puedes consultar en la base de datos
