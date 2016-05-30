<?php

namespace InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class SalidaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipoSalida')
            ->add('referencia')
            ->add('autorizacion')
            ->add('encargado')
            ->add('fecha', DateType::class);
        
        $builder->add('detalles', CollectionType::class, array(
            'entry_type' => DetalleSalidaType::class,
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
            'data_class' => 'InventarioBundle\Entity\Salida'
        ));
    }
}
