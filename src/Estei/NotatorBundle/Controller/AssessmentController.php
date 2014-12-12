<?php

namespace Estei\NotatorBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Estei\NotatorBundle\Entity\Assessment;
use Estei\NotatorBundle\Form\AssessmentType;

/**
 * Assessment controller.
 *
 */
class AssessmentController extends Controller
{

    /**
     * Lists all Assessment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EsteiNotatorBundle:Assessment')->findAll();

        return $this->render('EsteiNotatorBundle:Assessment:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Assessment entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Assessment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('assessment_show', array('id' => $entity->getId())));
        }

        return $this->render('EsteiNotatorBundle:Assessment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Assessment entity.
     *
     * @param Assessment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Assessment $entity)
    {
        $form = $this->createForm(new AssessmentType(), $entity, array(
            'action' => $this->generateUrl('assessment_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Assessment entity.
     *
     */
    public function newAction()
    {
        $entity = new Assessment();
        $form   = $this->createCreateForm($entity);

        return $this->render('EsteiNotatorBundle:Assessment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Assessment entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:Assessment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Assessment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiNotatorBundle:Assessment:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Assessment entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:Assessment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Assessment entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiNotatorBundle:Assessment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Assessment entity.
    *
    * @param Assessment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Assessment $entity)
    {
        $form = $this->createForm(new AssessmentType(), $entity, array(
            'action' => $this->generateUrl('assessment_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Assessment entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:Assessment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Assessment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('assessment_edit', array('id' => $id)));
        }

        return $this->render('EsteiNotatorBundle:Assessment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Assessment entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EsteiNotatorBundle:Assessment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Assessment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('assessment'));
    }

    /**
     * Creates a form to delete a Assessment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('assessment_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
