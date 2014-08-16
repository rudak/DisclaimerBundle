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
            ->add('siteUrl')
            ->add('ownerName')
            ->add('ownerStatus')
            ->add('ownerAddress')
            ->add('ownerCompanyName')
            ->add('siteCreatorAgency')
            ->add('siteCreatorName')
            ->add('siteCreatorUrl')
            ->add('webmasterName')
            ->add('editorManager')
            ->add('editorEmail')
            ->add('hoster')
            ->add('hosterAddress')
            ->add('cnil')
            ->add('Submit', 'submit');
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
