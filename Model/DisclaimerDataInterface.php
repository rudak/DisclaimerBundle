<?php
namespace Rudak\Bundle\DisclaimerBundle\Model;


interface DisclaimerDataInterface
{


    /**
     * @param boolean $cnil
     */
    public function setCnil($cnil);

    /**
     * @return boolean
     */
    public function getCnil();

    /**
     * @param mixed $editorEmail
     */
    public function setEditorEmail($editorEmail);

    /**
     * @return mixed
     */
    public function getEditorEmail();

    /**
     * @param mixed $editorManager
     */
    public function setEditorManager($editorManager);

    /**
     * @return mixed
     */
    public function getEditorManager();

    /**
     * @param mixed $hoster
     */
    public function setHoster($hoster);

    /**
     * @return mixed
     */
    public function getHoster();

    /**
     * @param mixed $hosterAddress
     */
    public function setHosterAddress($hosterAddress);

    /**
     * @return mixed
     */
    public function getHosterAddress();

    /**
     * @param mixed $id
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param \DateTime $latestUpdate
     */
    public function setLatestUpdate($latestUpdate);

    /**
     * @return \DateTime
     */
    public function getLatestUpdate();

    /**
     * @param mixed $ownerAddress
     */
    public function setOwnerAddress($ownerAddress);

    /**
     * @return mixed
     */
    public function getOwnerAddress();

    /**
     * @param mixed $ownerCompanyName
     */
    public function setOwnerCompanyName($ownerCompanyName);

    /**
     * @return mixed
     */
    public function getOwnerCompanyName();

    /**
     * @param mixed $ownerName
     */
    public function setOwnerName($ownerName);

    /**
     * @return mixed
     */
    public function getOwnerName();

    /**
     * @param mixed $ownerStatus
     */
    public function setOwnerStatus($ownerStatus);

    /**
     * @return mixed
     */
    public function getOwnerStatus();

    /**
     * @param mixed $siteCreatorAgency
     */
    public function setSiteCreatorAgency($siteCreatorAgency);

    /**
     * @return mixed
     */
    public function getSiteCreatorAgency();

    /**
     * @param mixed $siteCreatorName
     */
    public function setSiteCreatorName($siteCreatorName);

    /**
     * @return mixed
     */
    public function getSiteCreatorName();

    /**
     * @param mixed $siteCreatorUrl
     */
    public function setSiteCreatorUrl($siteCreatorUrl);

    /**
     * @return mixed
     */
    public function getSiteCreatorUrl();

    /**
     * @param mixed $siteUrl
     */
    public function setSiteUrl($siteUrl);

    /**
     * @return mixed
     */
    public function getSiteUrl();

    /**
     * @param mixed $webmasterName
     */
    public function setWebmasterName($webmasterName);

    /**
     * @return mixed
     */
    public function getWebmasterName();

} 