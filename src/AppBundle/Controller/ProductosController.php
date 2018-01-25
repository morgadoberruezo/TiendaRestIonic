<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints As Assert;
use Symfony\Component\HttpFoundation\JsonResponse;


class ProductosController extends Controller
{
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
