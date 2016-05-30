<?php

namespace InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use InventarioBundle\Entity\Traspaso;
use InventarioBundle\Form\TraspasoType;

/**
 * Traspaso controller.
 *
 * @Route("/traspaso")
 */
class TraspasoController extends Controller
{
    /**
     * Lists all Traspaso entities.
     *
     * @Route("/", name="traspaso_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $traspasos = $em->getRepository('InventarioBundle:Traspaso')->findAll();

        return $this->render('traspaso/index.html.twig', array(
            'traspasos' => $traspasos,
        ));
    }

    /**
     * Creates a new Traspaso entity.
     *
     * @Route("/new", name="traspaso_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $traspaso = new Traspaso();
        $form = $this->createForm('InventarioBundle\Form\TraspasoType', $traspaso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($traspaso);
            $em->flush();

            return $this->redirectToRoute('traspaso_show', array('id' => $traspaso->getId()));
        }

        return $this->render('traspaso/new.html.twig', array(
            'traspaso' => $traspaso,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Traspaso entity.
     *
     * @Route("/{id}", name="traspaso_show")
     * @Method("GET")
     */
    public function showAction(Traspaso $traspaso)
    {
        $deleteForm = $this->createDeleteForm($traspaso);

        return $this->render('traspaso/show.html.twig', array(
            'traspaso' => $traspaso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Traspaso entity.
     *
     * @Route("/{id}/edit", name="traspaso_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Traspaso $traspaso)
    {
        $deleteForm = $this->createDeleteForm($traspaso);
        $editForm = $this->createForm('InventarioBundle\Form\TraspasoType', $traspaso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($traspaso);
            $em->flush();

            return $this->redirectToRoute('traspaso_edit', array('id' => $traspaso->getId()));
        }

        return $this->render('traspaso/edit.html.twig', array(
            'traspaso' => $traspaso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Traspaso entity.
     *
     * @Route("/{id}", name="traspaso_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Traspaso $traspaso)
    {
        $form = $this->createDeleteForm($traspaso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($traspaso);
            $em->flush();
        }

        return $this->redirectToRoute('traspaso_index');
    }

    /**
     * Creates a form to delete a Traspaso entity.
     *
     * @param Traspaso $traspaso The Traspaso entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Traspaso $traspaso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('traspaso_delete', array('id' => $traspaso->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
