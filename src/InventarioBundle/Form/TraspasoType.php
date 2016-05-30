<?php

namespace InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TraspasoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('horaentrada', DateType::class)
            ->add('horaSalida', DateType::class)
            ->add('responsable')
            ->add('observaciones')
            ->add('caracteristicas');
            
       $builder->add('detalles', CollectionType::class, array(
            'entry_type' => DetalleTraspasoType::class,
            'allow_add'    => true,
            'by_reference' => false,
            'allow_delete' => true  
        ));
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'InventarioBundle\Entity\Traspaso'
        ));
    }
}
