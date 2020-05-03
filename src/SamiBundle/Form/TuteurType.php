<?php

namespace SamiBundle\Form;

use AppBundle\Entity\Jardin;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TuteurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('sexe',ChoiceType::class,[
            'choices'=>[
                'Homme'=>'homme',
                'Femme'=>'femme',
            ]
        ])->add('username')
            ->add('email');
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Tuteur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_tuteur';
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType'; // TODO: Change the autogenerated stub
    }
}
