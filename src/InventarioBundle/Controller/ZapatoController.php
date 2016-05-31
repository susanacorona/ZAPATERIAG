<?php

namespace InventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use InventarioBundle\Entity\Zapato;
use InventarioBundle\Form\ZapatoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Zapato controller.
 *
 * @Route("/zapato")
 * @Security("has_role('ROLE_ADMIN')")
 */
class ZapatoController extends Controller
{
    /**
     * Lists all Zapato entities.
     *
     * @Route("/", name="zapato_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $zapatos = $em->getRepository('InventarioBundle:Zapato')->findAll();

        return $this->render('zapato/index.html.twig', array(
            'zapatos' => $zapatos,
        ));
    }

    /**
     * Creates a new Zapato entity.
     *
     * @Route("/new", name="zapato_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $zapato = new Zapato();
        $form = $this->createForm('InventarioBundle\Form\ZapatoType', $zapato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zapato);
            $em->flush();

            return $this->redirectToRoute('zapato_show', array('id' => $zapato->getId()));
        }

        return $this->render('zapato/new.html.twig', array(
            'zapato' => $zapato,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Zapato entity.
     *
     * @Route("/{id}", name="zapato_show")
     * @Method("GET")
     */
    public function showAction(Zapato $zapato)
    {
        $deleteForm = $this->createDeleteForm($zapato);

        return $this->render('zapato/show.html.twig', array(
            'zapato' => $zapato,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Zapato entity.
     *
     * @Route("/{id}/edit", name="zapato_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Zapato $zapato)
    {
        $deleteForm = $this->createDeleteForm($zapato);
        $editForm = $this->createForm('InventarioBundle\Form\ZapatoType', $zapato);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zapato);
            $em->flush();

            return $this->redirectToRoute('zapato_edit', array('id' => $zapato->getId()));
        }

        return $this->render('zapato/edit.html.twig', array(
            'zapato' => $zapato,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Zapato entity.
     *
     * @Route("/{id}", name="zapato_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Zapato $zapato)
    {
        $form = $this->createDeleteForm($zapato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($zapato);
            $em->flush();
        }

        return $this->redirectToRoute('zapato_index');
    }

    /**
     * Creates a form to delete a Zapato entity.
     *
     * @param Zapato $zapato The Zapato entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Zapato $zapato)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zapato_delete', array('id' => $zapato->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
