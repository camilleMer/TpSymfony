<?php

namespace Estei\NotatorBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Estei\NotatorBundle\Entity\StudentAssessmentCriteria;
use Estei\NotatorBundle\Form\StudentAssessmentCriteriaType;

/**
 * StudentAssessmentCriteria controller.
 *
 */
class StudentAssessmentCriteriaController extends Controller
{

    /**
     * Lists all StudentAssessmentCriteria entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EsteiNotatorBundle:StudentAssessmentCriteria')->findAll();

        return $this->render('EsteiNotatorBundle:StudentAssessmentCriteria:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new StudentAssessmentCriteria entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new StudentAssessmentCriteria();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('studentassessmentcriteria_show', array('id' => $entity->getId())));
        }

        return $this->render('EsteiNotatorBundle:StudentAssessmentCriteria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a StudentAssessmentCriteria entity.
     *
     * @param StudentAssessmentCriteria $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(StudentAssessmentCriteria $entity)
    {
        $form = $this->createForm(new StudentAssessmentCriteriaType(), $entity, array(
            'action' => $this->generateUrl('studentassessmentcriteria_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new StudentAssessmentCriteria entity.
     *
     */
    public function newAction()
    {
        $entity = new StudentAssessmentCriteria();
        $form   = $this->createCreateForm($entity);

        return $this->render('EsteiNotatorBundle:StudentAssessmentCriteria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a StudentAssessmentCriteria entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:StudentAssessmentCriteria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentAssessmentCriteria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiNotatorBundle:StudentAssessmentCriteria:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing StudentAssessmentCriteria entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:StudentAssessmentCriteria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentAssessmentCriteria entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EsteiNotatorBundle:StudentAssessmentCriteria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a StudentAssessmentCriteria entity.
    *
    * @param StudentAssessmentCriteria $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(StudentAssessmentCriteria $entity)
    {
        $form = $this->createForm(new StudentAssessmentCriteriaType(), $entity, array(
            'action' => $this->generateUrl('studentassessmentcriteria_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing StudentAssessmentCriteria entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EsteiNotatorBundle:StudentAssessmentCriteria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentAssessmentCriteria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('studentassessmentcriteria_edit', array('id' => $id)));
        }

        return $this->render('EsteiNotatorBundle:StudentAssessmentCriteria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a StudentAssessmentCriteria entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EsteiNotatorBundle:StudentAssessmentCriteria')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find StudentAssessmentCriteria entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('studentassessmentcriteria'));
    }

    /**
     * Creates a form to delete a StudentAssessmentCriteria entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('studentassessmentcriteria_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
