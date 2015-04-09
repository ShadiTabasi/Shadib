<?php
/**
 * Created by PhpStorm.
 * User: shadi
 * Date: 09/04/15
 * Time: 09:51
 */

namespace AppBundle\Form\Types;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReviewType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'author',
                'entity',
                [
                    'class'=>'AppBundle\Entity\Person'
                ])
            ->add('content', 'textarea')
            ->add('submit','submit')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            ['data_class' => 'AppBundle\Entity\Review']
        );
    }


    /**
     *
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'review';
    }


}

