<?php

namespace Estei\NotatorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentAssessmentCriteriaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mark')
            ->add('criteria')
            ->add('student')
            ->add('assessment')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Estei\NotatorBundle\Entity\StudentAssessmentCriteria'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'estei_notatorbundle_studentassessmentcriteria';
    }
}
