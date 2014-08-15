<?php
namespace Rudak\DisclaimerBundle\Entity;

/**
 * Created by PhpStorm.
 * User: Rudak
 * Date: 15/08/14
 * Time: 22:16
 */

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="DisclaimerData")
 * @ORM\Entity(repositoryClass="DisclaimerDataRepository")
 */
class DisclaimerData
{
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $owner_name;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $site_url;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $owner_statut;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $owner_address;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $site_creator_url;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $site_creator_agency;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $editor_manager;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $editor_contact;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $webmaster_name;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $hoster;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $hoster_address;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $site_creator_name;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $owner_company_name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cnil", type="boolean")
     */
    private $cnil;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="latestUpdate", type="datetime")
     */
    private $latestUpdate;

    /**
     * @param boolean $cnil
     */
    public function setCnil($cnil)
    {
        $this->cnil = $cnil;
    }

    /**
     * @return boolean
     */
    public function getCnil()
    {
        return $this->cnil;
    }

    /**
     * @param mixed $editor_contact
     */
    public function setEditorContact($editor_contact)
    {
        $this->editor_contact = $editor_contact;
    }

    /**
     * @return mixed
     */
    public function getEditorContact()
    {
        return $this->editor_contact;
    }

    /**
     * @param mixed $editor_manager
     */
    public function setEditorManager($editor_manager)
    {
        $this->editor_manager = $editor_manager;
    }

    /**
     * @return mixed
     */
    public function getEditorManager()
    {
        return $this->editor_manager;
    }

    /**
     * @param mixed $hoster
     */
    public function setHoster($hoster)
    {
        $this->hoster = $hoster;
    }

    /**
     * @return mixed
     */
    public function getHoster()
    {
        return $this->hoster;
    }

    /**
     * @param mixed $hoster_address
     */
    public function setHosterAddress($hoster_address)
    {
        $this->hoster_address = $hoster_address;
    }

    /**
     * @return mixed
     */
    public function getHosterAddress()
    {
        return $this->hoster_address;
    }

    /**
     * @param mixed $owner_address
     */
    public function setOwnerAddress($owner_address)
    {
        $this->owner_address = $owner_address;
    }

    /**
     * @return mixed
     */
    public function getOwnerAddress()
    {
        return $this->owner_address;
    }

    /**
     * @param mixed $owner_company_name
     */
    public function setOwnerCompanyName($owner_company_name)
    {
        $this->owner_company_name = $owner_company_name;
    }

    /**
     * @return mixed
     */
    public function getOwnerCompanyName()
    {
        return $this->owner_company_name;
    }

    /**
     * @param mixed $owner_name
     */
    public function setOwnerName($owner_name)
    {
        $this->owner_name = $owner_name;
    }

    /**
     * @return mixed
     */
    public function getOwnerName()
    {
        return $this->owner_name;
    }

    /**
     * @param mixed $owner_statut
     */
    public function setOwnerStatut($owner_statut)
    {
        $this->owner_statut = $owner_statut;
    }

    /**
     * @return mixed
     */
    public function getOwnerStatut()
    {
        return $this->owner_statut;
    }

    /**
     * @param mixed $site_creator_agency
     */
    public function setSiteCreatorAgency($site_creator_agency)
    {
        $this->site_creator_agency = $site_creator_agency;
    }

    /**
     * @return mixed
     */
    public function getSiteCreatorAgency()
    {
        return $this->site_creator_agency;
    }

    /**
     * @param mixed $site_creator_name
     */
    public function setSiteCreatorName($site_creator_name)
    {
        $this->site_creator_name = $site_creator_name;
    }

    /**
     * @return mixed
     */
    public function getSiteCreatorName()
    {
        return $this->site_creator_name;
    }

    /**
     * @param mixed $site_creator_url
     */
    public function setSiteCreatorUrl($site_creator_url)
    {
        $this->site_creator_url = $site_creator_url;
    }

    /**
     * @return mixed
     */
    public function getSiteCreatorUrl()
    {
        return $this->site_creator_url;
    }

    /**
     * @param mixed $site_url
     */
    public function setSiteUrl($site_url)
    {
        $this->site_url = $site_url;
    }

    /**
     * @return mixed
     */
    public function getSiteUrl()
    {
        return $this->site_url;
    }

    /**
     * @param mixed $webmaster_name
     */
    public function setWebmasterName($webmaster_name)
    {
        $this->webmaster_name = $webmaster_name;
    }

    /**
     * @return mixed
     */
    public function getWebmasterName()
    {
        return $this->webmaster_name;
    }

    /**
     * @param \DateTime $latestUpdate
     */
    public function setLatestUpdate(\Datetime $latestUpdate)
    {
        $this->latestUpdate = $latestUpdate;
    }

    /**
     * @return \DateTime
     */
    public function getLatestUpdate()
    {
        return $this->latestUpdate;
    }


}
