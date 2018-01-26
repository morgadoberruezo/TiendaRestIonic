<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints As Assert;
use Symfony\Component\HttpFoundation\JsonResponse;


class ProductosController extends Controller
{
    public function productosPorTipoAction(Request $request){

      $helpers = $this->get("app.helpers");
      $pagina = $request->get('pagina', 0);
      $linea = $request->get('linea', 0);

      $productos = $this->getDoctrine()
              ->getRepository('AppBundle:Productos')
              ->getProductosCategoria($linea,$pagina);
      $resultado = array(
        'error' => 'false',
        'productos' => $productos
      );
      return  $helpers->a_json($resultado);
    }


    public function obtener_productosAction(Request $request){

        $helpers = $this->get("app.helpers");
        $jwt_auth = $this->get("app.jwt_auth");
        $pagina = $request->get('pagina', null);
        $productos = $this->getDoctrine()
                ->getRepository('AppBundle:Productos')
                ->getProductosPage($pagina);
          return  $helpers->a_json($productos);
    }
}
