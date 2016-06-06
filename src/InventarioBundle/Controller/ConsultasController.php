<?php

namespace InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use InventarioBundle\Entity\Salida;
use InventarioBundle\Form\SalidaType;

/**
 * Consulta controller.
 *
 * @Route("/consultas")
 */
class ConsultasController extends Controller
{
    /**
     * Lists all Consultas.
     *
     * @Route("/", name="mostrarSalida")
     * @Method("GET")
     */
    public function consultaSalida()
    {
        $em = $this->getDoctrine()->getManager();

        $salidas = $em->getRepository('InventarioBundle:Salida')->findAll();

        return $this->render('salida/mostrarSalida.html.twig', array(
            'salidas' => $salidas,
        ));
    }
}