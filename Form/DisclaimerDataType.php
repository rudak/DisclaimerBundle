<?php

namespace Rudak\Bundle\DisclaimerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DisclaimerDataType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('siteUrl', 'text', array(
                'label' => 'Adresse du site'
            ))
            ->add('ownerName', 'text', array(
                'label' => 'Propriétaire du site'
            ))
            ->add('ownerStatus', 'text', array(
                'label' => 'Satut du propriétaire'
            ))
            ->add('ownerAddress', 'text', array(
                'label' => 'Adresse du propriétaire'
            ))
            ->add('ownerCompanyName', 'text', array(
                'label' => 'Nom de l\entreprise'
            ))
            ->add('siteCreatorAgency', 'text', array(
                'label' => 'Agence web'
            ))
            ->add('siteCreatorName', 'text', array(
                'label' => 'Responsable de création'
            ))
            ->add('siteCreatorUrl', 'text', array(
                'label' => 'Site du responsable'
            ))
            ->add('webmasterName', 'text', array(
                'label' => 'Chef de projet'
            ))
            ->add('editorManager', 'text', array(
                'label' => 'Responsable d\edition'
            ))
            ->add('editorEmail', 'text', array(
                'label' => 'Son email'
            ))
            ->add('hoster', 'text', array(
                'label' => 'Hébergeur'
            ))
            ->add('hosterAddress', 'text', array(
                'label' => 'Adresse de l\'hébergeur'
            ))
            ->add('cnil', 'checkbox', array(
                'label'    => 'Déclaration CNIL',
                'required' => false
            ))
            ->add('cnilNumber', 'text', array(
                'label' => 'Numéro de déclaration'
            ))
            ->add('Submit', 'submit', array(
                'label' => 'Enregistrer ces information',
                'attr'  => array(
                    'class' => 'btn btn-success'
                )
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rudak\Bundle\DisclaimerBundle\Entity\DisclaimerData'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rudak_bundle_disclaimerbundle_disclaimerdata';
    }
}
