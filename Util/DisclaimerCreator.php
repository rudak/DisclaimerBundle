<?php
/**
 * Created by PhpStorm.
 * User: Rudak
 * Date: 16/08/14
 * Time: 12:43
 */

namespace Rudak\Bundle\DisclaimerBundle\Util;

use Doctrine\ORM\EntityManager;
use Rudak\Bundle\DisclaimerBundle\Entity\DisclaimerData;

class DisclaimerCreator
{

    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function create(array $values)
    {
        $entity = $this->getEntity();
        foreach ($values as $key => $value) {

            /*
            $setter = $this->getSetterName($key);
            $entity->$setter($value);
            */
            call_user_func(array($entity, $this->getSetterName($key)), $value);
        }
        $this->em->flush();
    }

    private function getEntity()
    {
        return $this->em->getRepository('RudakDisclaimerBundle:DisclaimerData')->find(1);
    }

    private function getSetterName($attribute)
    {
        return 'set' . ucfirst($attribute);
    }
} 