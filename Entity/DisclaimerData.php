<?php
namespace Rudak\Bundle\DisclaimerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Rudak\Bundle\DisclaimerBundle\Model\DisclaimerDataModel;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="rudakDisclaimer_data")
 */
class DisclaimerData extends DisclaimerDataModel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate()
    {
        $this->setLatestUpdate(new \Datetime());
    }
}
