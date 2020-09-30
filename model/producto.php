<?php




class ProductoModel extends Model
{

    # Este metodo devuelve un array asociativo con los resultados de la consulta SQL
    public function listar()
    {

        $db = $this->connection();

        $sql = "SELECT * FROM producto";

        $query = $db->prepare($sql);

        $query->execute();

        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }
}