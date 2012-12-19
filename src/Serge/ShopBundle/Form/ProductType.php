<?php

namespace Serge\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Serge\ShopBundle\Form\CategoryType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('category', 'collection', array(
                'type' => 'entity',
                'options' => array(
                    'class' => 'ShopBundle:Category',
                    'property' => 'name'
                )));
//        $builder
//            ->add('name')
//            ->add('category', 'entity', array(
//                'class' => 'ShopBundle:Category',
//                'property' => 'name'
//            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Serge\ShopBundle\Entity\Product'
        ));
    }

    public function getName()
    {
        return 'serge_shopbundle_producttype';
    }
}
