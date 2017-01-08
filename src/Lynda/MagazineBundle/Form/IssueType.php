<?php

namespace Lynda\MagazineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IssueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number')
            ->add('datePublication', 'date', array(
                'years' => range(date('Y'), date('Y', strtotime('-50 years'))),
                'required' => true,

            ))
            // ->add('cover')
            ->add('publication', 'entity', array(
                'required' => true,
                'class' => 'LyndaMagazineBundle:Publication',
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lynda\MagazineBundle\Entity\Issue'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lynda_magazinebundle_issue';
    }


}
