## Tienda de abarrotes

### Corriendo la aplicacion
Para correr la aplicacion colocarla en el directorio www de tu servidor, 
la aplicacion funciona con PHP, MySQL.

### Conexion DB
Modificar el archivo mysql.php que es la clase que conecta al servidor MySQL.

    private $host = "localhost"; // Nombre del servidor
    private $user = "root"; // Usuario de la base de datos
    private $pass = ""; // La contraseña de la base de datos
    
del controller/mysql.php las linea 9 al 11 para que la app conecte al servidor.    

### Base de datos
Para importar la base de datos ingresa a tu phpMyAdmin crea la base de datos 
con el nombre "crowd-interactive" y despues importar el archivo "crowd-interactive.sql"
para que cargue todas las tablas que se necesitan.

