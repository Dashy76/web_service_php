public funtion_Construct()
<?Php


/**
 * Conexion a base de datos de MySQL con PDO
 * 
 * @author Dashy76
 * @link  https://github.com/Dashy76/web_service_php.git
 */

class Conexion
{
    private $hostBD = "localhost:27017";
    private $nombreBD = "sifbamboo";
    private $pdo; 

    public function __construct()
    {
        try {
            //crear una conexion con PDO
            $this->pdo = new PDO("mysql:host=$this->hostBD;dbname=$this->nombreBD;charset=utf8");

    //Establecer el modo de errores de PDO
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error al conectar la Base de Datos: " . $e->getMessage();
        exit;
    }  
}

public function obtenerConexion()
{
    return $this->pdo;
}
}


