<?php



// Clase que hereda de Controller, para poder usar método Render
class ProductoController extends Controller
{


    private $model;


    public function __construct()
    {
        # Crea una instancia de ProductoModel
        $this->model = new ProductoModel();
    }




    public function index()
    {

        # Desde la capa de datos, invoca al metodo Listar
        $productos = $this->model->listar();

        $data = [
                    'productos' => json_encode($productos)
                ];


        # El array $data con los productos en JSON son pasados a la vista
        $this->render('producto_listar', $data);
    }




    public function graficar()
    {

        # Desde la capa de datos, invoca al metodo Listar
        $productos = $this->model->listar();


        $producto_nombre = "";
        $producto_ventas = "";


        # En esta iteración se genera un listado de los nombres y ventas de cada producto
        # separados por comas, para ser pasados a la vista, como argumento para Chart
        for($i=0; $i<count($productos); $i++)
        {
            if($i != count($productos)-1)
            {
                $producto_nombre = $producto_nombre . "'" . ucfirst($productos[$i]['nombre_producto']) . "', ";
                $producto_ventas = $producto_ventas . $productos[$i]['vendidos'] . ", ";
            }

            else
            {
                $producto_nombre = $producto_nombre . "'" . ucfirst($productos[$i]['nombre_producto']) . "'";
                $producto_ventas = $producto_ventas . $productos[$i]['vendidos'];
            }
        }



        $data = [
                    'producto_nombre' => $producto_nombre,
                    'producto_ventas' => $producto_ventas
                ];

        # El array $data con los datos de los productos en JSON son pasados a la vista
        $this->render('producto_graficar', $data);
    }
}