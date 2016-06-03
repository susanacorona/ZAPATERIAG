<?php

namespace InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use InventarioBundle\Entity\Entrada;
use InventarioBundle\Form\EntradaType;

/**
 * Entrada controller.
 *
 * @Route("/entrada")
 */
class EntradaController extends Controller
{
    /**
     * Lists all Entrada entities.
     *
     * @Route("/", name="entrada_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entradas = $em->getRepository('InventarioBundle:Entrada')->findAll();

        return $this->render('entrada/index.html.twig', array(
            'entradas' => $entradas,
        ));
    }

    /**
     * Creates a new Entrada entity.
     *
     * @Route("/new", name="entrada_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $entrada = new Entrada();
        $form = $this->createForm('InventarioBundle\Form\EntradaType', $entrada);
        $form->handleRequest($request);
        
         $zapatos = $this->getDoctrine()->getRepository('InventarioBundle:Zapato')->findAll();
        
        $zapato = $this->getDoctrine()->getRepository('InventarioBundle:Zapato')->findOneByCodigo('1234');
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entrada);
            $em->flush();

            return $this->redirectToRoute('entrada_show', array('id' => $entrada->getId()));
        }

        return $this->render('entrada/new.html.twig', array(
            'entrada' => $entrada,
            'zapatos' => $zapatos,
            'zapato' => $zapato,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Entrada entity.
     *
     * @Route("/{id}", name="entrada_show")
     * @Method("GET")
     */
    public function showAction(Entrada $entrada)
    {
        $deleteForm = $this->createDeleteForm($entrada);

        return $this->render('entrada/show.html.twig', array(
            'entrada' => $entrada,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Entrada entity.
     *
     * @Route("/{id}/edit", name="entrada_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Entrada $entrada)
    {
        $deleteForm = $this->createDeleteForm($entrada);
        $editForm = $this->createForm('InventarioBundle\Form\EntradaType', $entrada);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entrada);
            $em->flush();

            return $this->redirectToRoute('entrada_edit', array('id' => $entrada->getId()));
        }

        return $this->render('entrada/edit.html.twig', array(
            'entrada' => $entrada,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Entrada entity.
     *
     * @Route("/{id}", name="entrada_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Entrada $entrada)
    {
        $form = $this->createDeleteForm($entrada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entrada);
            $em->flush();
        }

        return $this->redirectToRoute('entrada_index');
    }

    /**
     * Creates a form to delete a Entrada entity.
     *
     * @param Entrada $entrada The Entrada entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Entrada $entrada)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('entrada_delete', array('id' => $entrada->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
        
}
