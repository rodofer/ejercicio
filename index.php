<?php

require_once 'config/global.php';
require_once 'config/database.php';

require_once 'kernel/model.php';
require_once 'kernel/controller.php';

require_once 'model/producto.php';
require_once 'controller/home.php';
require_once 'controller/producto.php';




if( isset($_GET['controller']) )
{
    $controller = $_GET['controller'];


    # Si existe controlador ingresado por URL
    if( file_exists("controller/" . $controller . ".php") )
    {

        $controllerPHP = ucfirst($controller) . "Controller";

        $object = new $controllerPHP();


        if( isset($_GET['action']) )
        {

            if( method_exists($object, $_GET['action']) )
            {
                $methodPHP = $_GET['action'];
                $object->$methodPHP();
            }

            else if ( method_exists($object, DEFAULT_METHOD) )
            {
                $methodPHP = DEFAULT_METHOD;
                $object->$methodPHP();
            }

            else
            {
                echo "No existe método default \"" . DEFAULT_METHOD . "\"";
            }
        }

        else
        { 
            if ( method_exists($object, DEFAULT_METHOD) )
            {
                $methodPHP = DEFAULT_METHOD;
                $object->$methodPHP();
            }

            else
            {
                echo "No existe método default \"" . DEFAULT_METHOD . "\"";
            }
        }

    }

    # Si no existe, se intenta utilizar controlador por defecto
    else
    {
        # Comprueba si controlador por Defecto existe
        if( file_exists("controller/" . DEFAULT_CONTROLLER . ".php") )
        {

            $controllerPHP = ucfirst(DEFAULT_CONTROLLER) . "Controller";

            $object = new $controllerPHP();


            # Método por Defecto
            if( method_exists($object, DEFAULT_METHOD) )
            {
                $methodPHP = DEFAULT_METHOD;
                $object->$methodPHP();
            }

            else
            {
                echo "No existe el método por defecto \"" . DEFAULT_METHOD . "\".";
            }
        }

        # Si no existe controlador por defecto, envía error
        else
        {
            echo "No existe el controlador por defecto \"" . DEFAULT_CONTROLLER . "\".";
        }
    }
}

else
{
    # Comprueba si controlador por Defecto existe
    if( file_exists("controller/" . DEFAULT_CONTROLLER . ".php") )
    {

        $controllerPHP = ucfirst(DEFAULT_CONTROLLER) . "Controller";

        $object = new $controllerPHP();


        # Método por Defecto
        if( method_exists($object, DEFAULT_METHOD) )
        {
            $methodPHP = DEFAULT_METHOD;
            $object->$methodPHP();
        }

        else
        {
            echo "No existe el método por defecto \"" . DEFAULT_METHOD . "\".";
        }
    }

    # Si no existe controlador por defecto, envía error
    else
    {
        echo "No existe el controlador por defecto \"" . DEFAULT_CONTROLLER . "\".";
    }
}