<?php

namespace Calc\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Calc\ApiBundle\Repository\SessionIdRepository")
 * @ORM\Table(name="session_id")
 */
class SessionId
{    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Domain", inversedBy="sessionId")
     * @ORM\JoinColumn(name="domain_id", referencedColumnName="id", nullable=false)
     */
    protected $domain;

    /**
     * @ORM\ManyToOne(targetEntity="Manager", inversedBy="session")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id", nullable=true)
     */
    protected $manager;

    /**
     * @ORM\ManyToOne(targetEntity="Phone", inversedBy="sessionId", cascade={"persist"})
     * @ORM\JoinColumn(name="phones_id", referencedColumnName="id", nullable=true)
     */
    protected $phones;

    /**
     * @ORM\ManyToOne(targetEntity="Email", inversedBy="sessionId", cascade={"persist"})
     * @ORM\JoinColumn(name="emails_id", referencedColumnName="id", nullable=true)
     */
    protected $eMails;
    
    /**
     * @ORM\Column(name="uniq_id", type="string", length=50, unique=True)
     */
    protected $uniqId;
    
    /**
    * @ORM\Column(name="ip", type="string", length=45)
    */
    protected $ip;
    
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;
    
    /**
     * @ORM\Column(type="boolean")
     */ 
    protected $contract;

    /**
     * @ORM\Column(name="is_phone", type="boolean")
     */
    protected $isPhone;

    /**
     * @ORM\Column(name="is_email", type="boolean")
     */
    protected $isEmail;

    /**
     * @ORM\Column(name="is_test", type="boolean")
     */
    protected $isTest;

    /**
     * @ORM\Column(name="is_welcome", type="boolean")
     */
    protected $isWelcome;

    /**
     * @ORM\Column(name="is_send_excel", type="boolean")
     */
    protected $isSendExcel;

    /**
     * @ORM\Column(name="is_send_mail_sitereport", type="boolean")
     */
    protected $isSendMailSitereport;

    /**
     * @ORM\Column(name="is_send_mail_free", type="boolean", options={"default" = FALSE})
     */
    protected $isSendMailFree;

    /**
     * @ORM\Column(name="is_send_mail_four", type="boolean", options={"default" = FALSE})
     */
    protected $isSendMailFour;

    /**
     * @ORM\Column(name="is_reset_audit", type="boolean", options={"default" = FALSE})
     */
    protected $isResetAudit;

    /**
     * @ORM\Column(name="is_reset_audit_update", type="date", options={"default":"1970-01-01"})
     */
    protected $isResetAuditUpdate;

    /**
     * @ORM\Column(name="is_send_mail_audit", type="boolean", options={"default" = FALSE})
     */
    protected $isSendMailAudit;

    /**
     * @ORM\Column(name="is_send_mail_audit_update", type="date", options={"default":"1970-01-01"})
     */
    protected $isSendMailAuditUpdate;

    /**
     * @ORM\OneToMany(targetEntity="SessionCompetitors", mappedBy="sessionId", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $competitors;

    /**
     * @ORM\OneToMany(targetEntity="SessionSemYadro", mappedBy="session", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $semYadro;
    
    public function __construct()
    {
        $this->contract = false;
        $this->isPhone = false;
        $this->isEmail = false;
        $this->isTest = false;
        $this->isWelcome = false;
        $this->isSendExcel = false;
        $this->isSendMailSitereport = false;
        $this->isSendMailFree = false;
        $this->isSendMailFour = false;
        $this->isResetAudit = false;
        $this->isSendMailAudit = false;
        $this->ip = "";

        $this->competitors = new ArrayCollection();
        $this->semYadro = new ArrayCollection();

        $this->isResetAuditUpdate = new \DateTime();
        $this->isSendMailAuditUpdate = new \DateTime();
        $this->createdAt = new \DateTime();
    }

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
     * Set uniqId
     *
     * @param string $uniqId
     *
     * @return SessionId
     */
    public function setUniqId($uniqId)
    {
        $this->uniqId = $uniqId;

        return $this;
    }

     /**
     * Set ip
     *
     * @param string $ip
     *
     * @return SessionId
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }
    
    /**
     * Get uniqId
     *
     * @return string
     */
    public function getUniqId()
    {
        return $this->uniqId;
    }
    
    /**
    * Get ip
    *
    * @return string
    */
    public function getIp()
    {
        return $this->ip;
    }
    
    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return SessionId
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set contract
     *
     * @param boolean $contract
     *
     * @return SessionId
     */
    public function setContract($contract)
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Get contract
     *
     * @return boolean
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Set domain
     *
     * @param \Calc\ApiBundle\Entity\Domain $domain
     *
     * @return SessionId
     */
    public function setDomain(\Calc\ApiBundle\Entity\Domain $domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return \Calc\ApiBundle\Entity\Domain
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set manager
     *
     * @param \Calc\ApiBundle\Entity\Manager $manager
     *
     * @return SessionId
     */
    public function setManager(\Calc\ApiBundle\Entity\Manager $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return \Calc\ApiBundle\Entity\Manager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Set phones
     *
     * @param \Calc\ApiBundle\Entity\Phone $phones
     *
     * @return SessionId
     */
    public function setPhones(\Calc\ApiBundle\Entity\Phone $phones)
    {
        $this->phones = $phones;

        return $this;
    }

    /**
     * Get phones
     *
     * @return \Calc\ApiBundle\Entity\Phone
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Set eMails
     *
     * @param \Calc\ApiBundle\Entity\Email $eMails
     *
     * @return SessionId
     */
    public function setEMails(\Calc\ApiBundle\Entity\Email $eMails)
    {
        $this->eMails = $eMails;

        return $this;
    }

    /**
     * Get eMails
     *
     * @return \Calc\ApiBundle\Entity\Email
     */
    public function getEMails()
    {
        return $this->eMails;
    }

    /**
     * Add competitor
     *
     * @param \Calc\ApiBundle\Entity\SessionCompetitors $competitor
     *
     * @return SessionId
     */
    public function addCompetitor(\Calc\ApiBundle\Entity\SessionCompetitors $competitor)
    {
        $this->competitors[] = $competitor;

        return $this;
    }

    /**
     * Remove competitor
     *
     * @param \Calc\ApiBundle\Entity\SessionCompetitors $competitor
     */
    public function removeCompetitor(\Calc\ApiBundle\Entity\SessionCompetitors $competitor)
    {
        $this->competitors->removeElement($competitor);
    }

    /**
     * Get competitors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetitors()
    {
        return $this->competitors;
    }

    /**
     * Set isPhone
     *
     * @param boolean $isPhone
     *
     * @return SessionId
     */
    public function setIsPhone($isPhone)
    {
        $this->isPhone = $isPhone;

        return $this;
    }

    /**
     * Get isPhone
     *
     * @return boolean
     */
    public function getIsPhone()
    {
        return $this->isPhone;
    }

    /**
     * Set isEmail
     *
     * @param boolean $isEmail
     *
     * @return SessionId
     */
    public function setIsEmail($isEmail)
    {
        $this->isEmail = $isEmail;

        return $this;
    }

    /**
     * Get isEmail
     *
     * @return boolean
     */
    public function getIsEmail()
    {
        return $this->isEmail;
    }

    /**
     * Add semYadro
     *
     * @param \Calc\ApiBundle\Entity\SessionSemYadro $semYadro
     *
     * @return SessionId
     */
    public function addSemYadro(\Calc\ApiBundle\Entity\SessionSemYadro $semYadro)
    {
        $this->semYadro[] = $semYadro;

        return $this;
    }

    /**
     * Remove semYadro
     *
     * @param \Calc\ApiBundle\Entity\SessionSemYadro $semYadro
     */
    public function removeSemYadro(\Calc\ApiBundle\Entity\SessionSemYadro $semYadro)
    {
        $this->semYadro->removeElement($semYadro);
    }

    /**
     * Get semYadro
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSemYadro()
    {
        return $this->semYadro;
    }

    /**
     * Set isSendExcel
     *
     * @param boolean $isSendExcel
     *
     * @return SessionId
     */
    public function setIsSendExcel($isSendExcel)
    {
        $this->isSendExcel = $isSendExcel;

        return $this;
    }

    /**
     * Get isSendExcel
     *
     * @return boolean
     */
    public function getIsSendExcel()
    {
        return $this->isSendExcel;
    }

    /**
     * Set isSendMailSitereport
     *
     * @param boolean $isSendMailSitereport
     *
     * @return SessionId
     */
    public function setIsSendMailSitereport($isSendMailSitereport)
    {
        $this->isSendMailSitereport = $isSendMailSitereport;

        return $this;
    }

    /**
     * Get isSendMailSitereport
     *
     * @return boolean
     */
    public function getIsSendMailSitereport()
    {
        return $this->isSendMailSitereport;
    }

    /**
     * Set isTest
     *
     * @param boolean $isTest
     *
     * @return SessionId
     */
    public function setIsTest($isTest)
    {
        $this->isTest = $isTest;

        return $this;
    }

    /**
     * Get isTest
     *
     * @return boolean
     */
    public function getIsTest()
    {
        return $this->isTest;
    }

    /**
     * Set isWelcome
     *
     * @param boolean $isWelcome
     *
     * @return SessionId
     */
    public function setIsWelcome($isWelcome)
    {
        $this->isWelcome = $isWelcome;

        return $this;
    }

    /**
     * Get isWelcome
     *
     * @return boolean
     */
    public function getIsWelcome()
    {
        return $this->isWelcome;
    }

    /**
     * Set isSendMailFree
     *
     * @param boolean $isSendMailFree
     *
     * @return SessionId
     */
    public function setIsSendMailFree($isSendMailFree)
    {
        $this->isSendMailFree = $isSendMailFree;

        return $this;
    }

    /**
     * Get isSendMailFree
     *
     * @return boolean
     */
    public function getIsSendMailFree()
    {
        return $this->isSendMailFree;
    }

    /**
     * Set isSendMailFour
     *
     * @param boolean $isSendMailFour
     *
     * @return SessionId
     */
    public function setIsSendMailFour($isSendMailFour)
    {
        $this->isSendMailFour = $isSendMailFour;

        return $this;
    }

    /**
     * Get isSendMailFour
     *
     * @return boolean
     */
    public function getIsSendMailFour()
    {
        return $this->isSendMailFour;
    }

    /**
     * Set isSendMailAudit
     *
     * @param boolean $isSendMailAudit
     *
     * @return SessionId
     */
    public function setIsSendMailAudit($isSendMailAudit)
    {
        $this->isSendMailAudit = $isSendMailAudit;

        return $this;
    }

    /**
     * Get isSendMailAudit
     *
     * @return boolean
     */
    public function getIsSendMailAudit()
    {
        return $this->isSendMailAudit;
    }

    /**
     * Set isSendMailAuditUpdate
     *
     * @param \DateTime $isSendMailAuditUpdate
     *
     * @return SessionId
     */
    public function setIsSendMailAuditUpdate($isSendMailAuditUpdate)
    {
        $this->isSendMailAuditUpdate = $isSendMailAuditUpdate;

        return $this;
    }

    /**
     * Get isSendMailAuditUpdate
     *
     * @return \DateTime
     */
    public function getIsSendMailAuditUpdate()
    {
        return $this->isSendMailAuditUpdate;
    }

    /**
     * Set isResetAudit
     *
     * @param boolean $isResetAudit
     *
     * @return SessionId
     */
    public function setIsResetAudit($isResetAudit)
    {
        $this->isResetAudit = $isResetAudit;

        return $this;
    }

    /**
     * Get isResetAudit
     *
     * @return boolean
     */
    public function getIsResetAudit()
    {
        return $this->isResetAudit;
    }

    /**
     * Set isResetAuditUpdate
     *
     * @param \DateTime $isResetAuditUpdate
     *
     * @return SessionId
     */
    public function setIsResetAuditUpdate($isResetAuditUpdate)
    {
        $this->isResetAuditUpdate = $isResetAuditUpdate;

        return $this;
    }

    /**
     * Get isResetAuditUpdate
     *
     * @return \DateTime
     */
    public function getIsResetAuditUpdate()
    {
        return $this->isResetAuditUpdate;
    }
}
