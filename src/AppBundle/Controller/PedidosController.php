<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints As Assert;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Ordenes;
use AppBundle\Entity\OrdenesDetalle;

class PedidosController extends Controller
{
    public function realizar_ordenAction(Request $request){
        $helpers = $this->get("app.helpers"); 
        $jwt_auth = $this->get("app.jwt_auth");
        
        $data_json = $request->get('data', null);
        if ($data_json != null){
            $params = json_decode($data_json);
            $idUsu = (isset($params->id) ? $params->id : null);
            $items = (isset($params->items) ? $params->items : null);
            $getHash = (isset($params->getHash) ? $params->getHash : null);
            if ($getHash == null || $idUsu == null){
                $respuesta = array(
                    "status" => "error",
                    "code"  => 400,
                    "msg" => "token y/o usuario inválido"
                );
                return;
            } 
            if ($items == null || strlen($items) == 0){
                $respuesta = array(
                    "status" => "error",
                    "code"  => 400,
                    "msg" => "Faltan los productos"
                );
            }
        }
        $check =  $jwt_auth->checkToken($getHash, false);
        if ($check == false){
            $respuesta = array(
                    "status" => "error",
                    "code"  => 400,
                    "msg" => "token incorrecto"
            );
            return;
        }
        //usuario y token son correctos
        //inserto la orden en la TABLA ORDENES (usuario_id, creado_en)
        $orden = new Ordenes();
        $orden->setUsuarioId($idUsu);
        $orden->setCreadoEn(new \DateTime("now"));
        $em = $this->getDoctrine()->getManager();
        $em->persist($orden);
        $em->flush();
        //obtengo el id de la orden insertada
        $orden_id =  $orden->getId();
        //inserto cada item en la TABLA ORDENES_DETALLE (orden_id, producto_id)
        //items es un array con los códigos de losproductos separados por ,
        $productosIds = explode(',', $items);
        foreach ($productosIds as $producto_id){
            $ordenes_detalle = new OrdenesDetalle();
            $ordenes_detalle->setOrdenId($orden_id);
            $ordenes_detalle->setProductoId($producto_id);
            $em->persist($ordenes_detalle);
            $em->flush();
        }
        $respuesta = array(
                    "status" => "success",
                    "code"  => 200,
                    "msg" => "orden: " . $orden_id 
            );        
        return  $helpers->a_json($respuesta);
    }
    
    
}
