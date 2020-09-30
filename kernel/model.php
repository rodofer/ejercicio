<?php




class Model
{

    # Método utulizado por los modelos que heredan esta clase
    # y permite establecer una conexión a la BD
    public function connection()
    {
        try
        {
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

            return $conn;
        }

        catch( PDOException $e )
        {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }
}