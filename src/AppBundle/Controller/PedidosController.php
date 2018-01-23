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
    public function obtener_pedidosAction(Request $request){
        $helpers = $this->get("app.helpers");
        $jwt_auth = $this->get("app.jwt_auth");

        $data_json = $request->get('data', null);
        if ($data_json != null){
            $params = json_decode($data_json);
            $idUsu = (isset($params->id) ? $params->id : null);
            $getHash = (isset($params->getHash) ? $params->getHash : null);
            if ($getHash == null || $idUsu == null){
                $respuesta = array(
                    "status" => "error",
                    "code"  => 400,
                    "msg" => "token y/o usuario inválido"
                );
                return;
            }
        }
        //comprobamos el token
        $check =  $jwt_auth->checkToken($getHash, false);
        if ($check == false){
            $respuesta = array(
                    "status" => "error",
                    "code"  => 400,
                    "msg" => "token incorrecto"
            );
            return;
        }
        //el token es válido
        //devolver ordenes del usuario
        $em = $this->getDoctrine()->getManager();
        $ordenes = $this->getDoctrine()
                ->getRepository('AppBundle:Ordenes')
                ->getOrdenes($idUsu);

       //para cada orden vemos los Productos de esa orden y los devolvemos
       //en detalle_productos
        $resultado = array();
        foreach ($ordenes as $orden) {
          echo($orden["id"]). '<br>';
          $detalle_productos = $this->getDoctrine()
                  ->getRepository('AppBundle:OrdenesDetalle')
                  ->getProductos($orden["id"]);
          //una orden es un nodo json con
          //id, fecha de la orden y el detalle_productos asociado
          $orden = array (
            'orden_id' => $orden["id"],
            'detalle' =>   $detalle_productos
          );
          //lo concatenamos en resultado
          array_push( $resultado, $orden );
        }
        //devolvemos el resultado en json
        return  $helpers->a_json($resultado);
    }
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
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository("AppBundle:Login")->findOneBy(array("id" =>$idUsu));
        var_dump($usuario);
        $orden = new Ordenes();
        $orden->setUsuario($usuario);
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
            $orden = $em->getRepository("AppBundle:Ordenes")->findOneBy(array("id" =>$orden_id));
            $ordenes_detalle->setOrden($orden);
            $producto = $em->getRepository("AppBundle:Productos")->findOneBy(array("codigo" =>$producto_id));

            $ordenes_detalle->setProducto($producto);
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
