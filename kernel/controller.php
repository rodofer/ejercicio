<?php




class Controller
{


    # Este método genera las vistas, a partir de archivos base (template) y los datos
    # pasados por los controladores.
    public function render($view, $data=null)
    {
        $header = file_get_contents("view/template/header.html");
        $contentido = file_get_contents("view/" . $view . ".html");
        $footer = file_get_contents("view/template/footer.html");

        if( $data != null )
        {
            # Esta iteración busca y reemplaza los valores definidos en los array $data de los controladores
            foreach( $data as $key => $value )
            {
                $contentido = str_replace("{" . $key . "}", $value, $contentido);
            }
        }

        print $header;
        print $contentido;
        print $footer;
    }
}