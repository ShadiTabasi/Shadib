<?php


namespace AppBundle\Form\Types;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocumentType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference', 'text')
            ->add('title', 'text')
            ->add('summary', 'textarea')
            ->add(
                'author',
                'entity',
                [
                    'class'=>'AppBundle\Entity\Person'
                ]
            )
            ->add('submit','submit')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            ['data_class' => 'AppBundle\Entity\Document']
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
        return 'document';
    }


}
