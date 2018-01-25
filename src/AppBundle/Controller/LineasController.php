<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints As Assert;
use Symfony\Component\HttpFoundation\JsonResponse;


class LineasController extends Controller
{
  public function listarAction(Request $request)
  {
    $categorias = $this->getDoctrine()
            ->getRepository('AppBundle:Lineas')
            ->getLineas();


    $helpers = $this->get("app.helpers");

    return $helpers->a_json($categorias);
  }
}
