<?php

namespace Estei\NotatorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AssessmentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('content')
            ->add('coefficient')
            ->add('assessmentDate')
            ->add('created')
            ->add('updated')
            ->add('period')
            ->add('discipline')
            ->add('classroom')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Estei\NotatorBundle\Entity\Assessment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'estei_notatorbundle_assessment';
    }
}
