<?php
namespace Rudak\Bundle\DisclaimerBundle\Model;

use Doctrine\ORM\Mapping as ORM;


abstract class DisclaimerDataModel implements DisclaimerDataInterface
{
    protected $id;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    protected $siteUrl;

    /**
     * @ORM\Column(type="string", length=60,nullable=true)
     */
    protected $ownerName;

    /**
     * @ORM\Column(type="string", length=60,nullable=true)
     */
    protected $ownerStatus;

    /**
     * @ORM\Column(type="string", length=150,nullable=true)
     */
    protected $ownerAddress;

    /**
     * @ORM\Column(type="string", length=120,nullable=true)
     */
    protected $ownerCompanyName;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    protected $siteCreatorAgency;

    /**
     * @ORM\Column(type="string", length=60,nullable=true)
     */
    protected $siteCreatorName;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    protected $siteCreatorUrl;

    /**
     * @ORM\Column(type="string", length=60,nullable=true)
     */
    protected $webmasterName;

    /**
     * @ORM\Column(type="string", length=60,nullable=true)
     */
    protected $editorManager;

    /**
     * @ORM\Column(type="string", length=90,nullable=true)
     */
    protected $editorEmail;

    /**
     * @ORM\Column(type="string", length=60,nullable=true)
     */
    protected $hoster;

    /**
     * @ORM\Column(type="string", length=130,nullable=true)
     */
    protected $hosterAddress;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cnil", type="boolean", nullable=true)
     */
    protected $cnil;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="latestUpdate", type="datetime")
     */
    protected $latestUpdate;

    /**
     * @ORM\Column(type="string", length=60,nullable=true)
     */
    protected $cnilNumber;

    /**
     * @param boolean $cnil
     */
    public function setCnil($cnil)
    {
        $this->cnil = (strtolower($cnil) == 'oui') ? true : false;
    }

    /**
     * @return boolean
     */
    public function getCnil()
    {
        return $this->cnil;
    }

    /**
     * @param mixed $editorEmail
     */
    public function setEditorEmail($editorEmail)
    {
        $this->editorEmail = $editorEmail;
    }

    /**
     * @return mixed
     */
    public function getEditorEmail()
    {
        return $this->editorEmail;
    }

    /**
     * @param mixed $editorManager
     */
    public function setEditorManager($editorManager)
    {
        $this->editorManager = $editorManager;
    }

    /**
     * @return mixed
     */
    public function getEditorManager()
    {
        return $this->editorManager;
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
     * @param mixed $hosterAddress
     */
    public function setHosterAddress($hosterAddress)
    {
        $this->hosterAddress = $hosterAddress;
    }

    /**
     * @return mixed
     */
    public function getHosterAddress()
    {
        return $this->hosterAddress;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $latestUpdate
     */
    public function setLatestUpdate($latestUpdate)
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

    /**
     * @param mixed $ownerAddress
     */
    public function setOwnerAddress($ownerAddress)
    {
        $this->ownerAddress = $ownerAddress;
    }

    /**
     * @return mixed
     */
    public function getOwnerAddress()
    {
        return $this->ownerAddress;
    }

    /**
     * @param mixed $ownerCompanyName
     */
    public function setOwnerCompanyName($ownerCompanyName)
    {
        $this->ownerCompanyName = $ownerCompanyName;
    }

    /**
     * @return mixed
     */
    public function getOwnerCompanyName()
    {
        return $this->ownerCompanyName;
    }

    /**
     * @param mixed $ownerName
     */
    public function setOwnerName($ownerName)
    {
        $this->ownerName = $ownerName;
    }

    /**
     * @return mixed
     */
    public function getOwnerName()
    {
        return $this->ownerName;
    }

    /**
     * @param mixed $ownerStatus
     */
    public function setOwnerStatus($ownerStatus)
    {
        $this->ownerStatus = $ownerStatus;
    }

    /**
     * @return mixed
     */
    public function getOwnerStatus()
    {
        return $this->ownerStatus;
    }

    /**
     * @param mixed $siteCreatorAgency
     */
    public function setSiteCreatorAgency($siteCreatorAgency)
    {
        $this->siteCreatorAgency = $siteCreatorAgency;
    }

    /**
     * @return mixed
     */
    public function getSiteCreatorAgency()
    {
        return $this->siteCreatorAgency;
    }

    /**
     * @param mixed $siteCreatorName
     */
    public function setSiteCreatorName($siteCreatorName)
    {
        $this->siteCreatorName = $siteCreatorName;
    }

    /**
     * @return mixed
     */
    public function getSiteCreatorName()
    {
        return $this->siteCreatorName;
    }

    /**
     * @param mixed $siteCreatorUrl
     */
    public function setSiteCreatorUrl($siteCreatorUrl)
    {
        $this->siteCreatorUrl = $siteCreatorUrl;
    }

    /**
     * @return mixed
     */
    public function getSiteCreatorUrl()
    {
        return $this->siteCreatorUrl;
    }

    /**
     * @param mixed $siteUrl
     */
    public function setSiteUrl($siteUrl)
    {
        $this->siteUrl = $siteUrl;
    }

    /**
     * @return mixed
     */
    public function getSiteUrl()
    {
        return $this->siteUrl;
    }

    /**
     * @param mixed $webmasterName
     */
    public function setWebmasterName($webmasterName)
    {
        $this->webmasterName = $webmasterName;
    }

    /**
     * @return mixed
     */
    public function getWebmasterName()
    {
        return $this->webmasterName;
    }

    /**
     * @param mixed $cnilNumber
     */
    public function setCnilNumber($cnilNumber)
    {
        $this->cnilNumber = $cnilNumber;
    }

    /**
     * @return mixed
     */
    public function getCnilNumber()
    {
        return $this->cnilNumber;
    }


}
