<?php

namespace Prac\MentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email_id')
            ->add('occupation')
            ->add('company')
            ->add('intro')
            ->add('rating')
            ->add('experience')
            ->add('github')
            ->add('linkedin')
            ->add('category')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Prac\MentBundle\Entity\User'
        ));
    }
}
