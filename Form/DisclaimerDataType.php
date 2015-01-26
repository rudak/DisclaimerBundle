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
                'label' => 'Adresse du site',
                'required'  => false
            ))
            ->add('ownerName', 'text', array(
                'label' => 'Propriétaire du site',
                'required'  => false
            ))
            ->add('ownerStatus', 'text', array(
                'label' => 'Satut du propriétaire',
                'required'  => false
            ))
            ->add('ownerAddress', 'text', array(
                'label' => 'Adresse du propriétaire',
                'required'  => false
            ))
            ->add('ownerCompanyName', 'text', array(
                'label' => 'Nom de l\'entreprise',
                'required'  => false
            ))
            ->add('siteCreatorAgency', 'text', array(
                'label' => 'Agence web',
                'required'  => false
            ))
            ->add('siteCreatorName', 'text', array(
                'label' => 'Responsable de création',
                'required'  => false
            ))
            ->add('siteCreatorUrl', 'text', array(
                'label' => 'Site du responsable',
                'required'  => false
            ))
            ->add('webmasterName', 'text', array(
                'label' => 'Chef de projet',
                'required'  => false
            ))
            ->add('editorManager', 'text', array(
                'label' => 'Responsable d\'edition',
                'required'  => false
            ))
            ->add('editorEmail', 'text', array(
                'label' => 'Son email',
                'required'  => false
            ))
            ->add('hoster', 'text', array(
                'label' => 'Hébergeur',
                'required'  => false
            ))
            ->add('hosterAddress', 'text', array(
                'label' => 'Adresse de l\'hébergeur',
                'required'  => false
            ))
            ->add('cnil', 'checkbox', array(
                'label'    => 'Déclaration CNIL',
                'required' => false
            ))
            ->add('cnilNumber', 'text', array(
                'label' => 'Numéro de déclaration',
                'required'  => false
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
