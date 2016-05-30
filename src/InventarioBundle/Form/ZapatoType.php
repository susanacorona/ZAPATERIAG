<?php

namespace InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ZapatoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marca')
            ->add('tipo')
            ->add('modelo')
            ->add('genero')
            ->add('costo')
            ->add('linea')
            ->add('lote')
            ->add('descripcion')
            ->add('material')
            ->add('minimo')
            ->add('maximo')
            ->add('puntoReorden')
            ->add('codigo')
            ->add('precio')
            ->add('color')
            ->add('numeracion')
            ->add('existencia')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'InventarioBundle\Entity\Zapato'
        ));
    }
}
