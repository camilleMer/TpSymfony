<?php

namespace Estei\NotatorBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Estei\NotatorBundle\Entity\Discipline;
use Estei\NotatorBundle\Form\DisciplineType;

/**
 * Discipline controller.
 *
 */
class DisciplineController extends Controller
{

    /**
     * Lists all Discipline entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EsteiNotatorBundle:Discipline')->findAll();

        return $this->render('EsteiNotatorBundle:Discipline:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Discipline entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Discipline();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('discipline_show', array('id' => $entity->getId())));
        }

        return $this->render('EsteiNotatorBundle:Discipline:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Discipline entity.
     *
     * @param Discipline $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Discipline $entity)
    {
        $form = $this->createForm(new DisciplineType(), $entity, array(
            'action' => $this->generateUrl('discipline_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Discipline entity.
     *
     */
    public function newAction()
    {
        $entity = new Discipline();
        $form   = $this->createCreateForm($entity);

        return $this->render('EsteiNotatorBundle:Discipline:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Discipline entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:Discipline')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Discipline entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiNotatorBundle:Discipline:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Discipline entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:Discipline')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Discipline entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiNotatorBundle:Discipline:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Discipline entity.
    *
    * @param Discipline $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Discipline $entity)
    {
        $form = $this->createForm(new DisciplineType(), $entity, array(
            'action' => $this->generateUrl('discipline_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Discipline entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:Discipline')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Discipline entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('discipline_edit', array('id' => $id)));
        }

        return $this->render('EsteiNotatorBundle:Discipline:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Discipline entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EsteiNotatorBundle:Discipline')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Discipline entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('discipline'));
    }

    /**
     * Creates a form to delete a Discipline entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('discipline_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
