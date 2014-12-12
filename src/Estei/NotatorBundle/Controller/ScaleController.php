<?php

namespace Estei\NotatorBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Estei\NotatorBundle\Entity\Scale;
use Estei\NotatorBundle\Form\ScaleType;

/**
 * Scale controller.
 *
 */
class ScaleController extends Controller
{

    /**
     * Lists all Scale entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EsteiNotatorBundle:Scale')->findAll();

        return $this->render('EsteiNotatorBundle:Scale:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Scale entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Scale();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('scale_show', array('id' => $entity->getId())));
        }

        return $this->render('EsteiNotatorBundle:Scale:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Scale entity.
     *
     * @param Scale $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Scale $entity)
    {
        $form = $this->createForm(new ScaleType(), $entity, array(
            'action' => $this->generateUrl('scale_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Scale entity.
     *
     */
    public function newAction()
    {
        $entity = new Scale();
        $form   = $this->createCreateForm($entity);

        return $this->render('EsteiNotatorBundle:Scale:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Scale entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:Scale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Scale entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiNotatorBundle:Scale:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Scale entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:Scale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Scale entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiNotatorBundle:Scale:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Scale entity.
    *
    * @param Scale $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Scale $entity)
    {
        $form = $this->createForm(new ScaleType(), $entity, array(
            'action' => $this->generateUrl('scale_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Scale entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:Scale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Scale entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('scale_edit', array('id' => $id)));
        }

        return $this->render('EsteiNotatorBundle:Scale:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Scale entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EsteiNotatorBundle:Scale')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Scale entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('scale'));
    }

    /**
     * Creates a form to delete a Scale entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('scale_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
