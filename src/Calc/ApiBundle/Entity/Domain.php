<?php

namespace Calc\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Calc\ApiBundle\Repository\DomainRepository")
 * @ORM\Table(name="domain")
 * 
 * @ORM\HasLifecycleCallbacks()
 */
class Domain
{
    const DEFAULT_DATE = '1970-01-01';
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=255, unique=True)
     */
    protected $domain;
    
    /**
     * @ORM\Column(name="status_code", type="smallint")
     */
    protected $statusCode = 0;
    
    /**
     * @ORM\Column(name="size_download", type="decimal", precision=7, scale=2)
     */
    protected $sizeDownload = 0;

    /**
     * @ORM\Column(name="total_time", type="decimal", precision=7, scale=2)
     */
    protected $totalTime = 0;

    /**
     * @ORM\Column(name="connect_time", type="decimal", precision=7, scale=2)
     */
    protected $connectTime = 0;

    /**
     * @ORM\Column(name="title", type="string", length=250, nullable=true)
     */
    protected $title = '';

    /**
     * @ORM\Column(name="description", type="string", length=250, nullable=true)
     */
    protected $description = '';

    /**
     * @ORM\Column(name="meta_update", type="date")
     */
    protected $metaUpdate;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */ 
    protected $created;
    
    /**
     * @ORM\Column(name="ya_tic", type="integer")
     */
    protected $yaTic = 0;

    /**
     * @ORM\Column(name="ya_mirror", type="string", length=250)
     */
    protected $yaMirror = '';

    /**
     * @ORM\Column(name="ya_commerce", type="boolean")
     */
    protected $yaCommerce = 0;

    /**
     * @ORM\Column(name="ya_catalog", type="boolean")
     */
    protected $yaCatalog = 0;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="YaTheme", inversedBy="domain", cascade={"persist"})
     * @ORM\JoinColumn(name="ya_theme_id", referencedColumnName="id")
     * 
     */
    protected $yaTheme;
    /**
     * @ORM\Column(name="ya_bar_update", type="date")
     */
    protected $yaBarUpdate;
    
    /**
     * @ORM\Column(name="bounce_percent", type="decimal", precision=6, scale=2)
     */
    protected $bouncePercent = 0;

    /**
     * @ORM\Column(name="time_on_site", type="string", length=25)
     */
    protected $timeOnSite = 0;

    /**
     * @ORM\Column(name="ru_alexa", type="integer")
     */
    protected $ruAlexa = 0;

    /**
     * @ORM\Column(name="pageviews_per_visitor", type="decimal", precision=6, scale=2)
     */
    protected $pageviewsPerVisitor = 0;

    /**
     * @ORM\Column(name="rank_alexa", type="integer")
     */
    protected $rankAlexa = 0;

    /**
     * @ORM\Column(name="alexa_update", type="date")
     */
    protected $alexaUpdate;
    
    /**
     * @ORM\Column(name="dmoz", type="boolean")
     */
    protected $dmoz = 0;

    /**
     * @ORM\Column(name="dmoz_update", type="date")
     */ 
    protected $dmozUpdate;        

    /**
     * @ORM\Column(name="domain_creation_date", type="date")
     */ 
    protected $domainCreationDate;
    
    /**
     * @ORM\Column(name="domain_creation_date_update", type="date")
     */ 
    protected $domainCreationDateUpdate;

    /**
     * @ORM\Column(name="g_index", type="bigint")
     */ 
    protected $gIndex = 0;

    /**
     * @ORM\Column(name="g_index_update", type="date")
     */ 
    protected $gIndexUpdate;

    /**
     * @ORM\Column(name="g_extra_index", type="integer")
     */ 
    protected $gExtraIndex = 0;

    /**
     * @ORM\Column(name="g_extra_index_update", type="date")
     */ 
    protected $gExtraIndexUpdate;
    
    /**
     * @ORM\Column(name="g_mention", type="bigint")
     */ 
    protected $gMention = 0;

    /**
     * @ORM\Column(name="g_mention_update", type="date")
     */ 
    protected $gMentionUpdate;
    
    /**
     * @ORM\Column(name="g_picture", type="integer")
     */ 
    protected $gPicture = 0;

    /**
     * @ORM\Column(name="g_picture_update", type="date")
     */ 
    protected $gPictureUpdate;
    
    /**
     * @ORM\Column(name="mailru_cat", type="boolean")
     */
    protected $mailruCat = false;
    
    /**
     * @ORM\Column(name="mailru_cat_update", type="date")
     */ 
    protected $mailruCatUpdate;

    /**
     * @ORM\Column(name="rambler_cat", type="boolean")
     */
    protected $ramblerCat = false;

    /**
     * @ORM\Column(name="rambler_cat_update", type="date")
     */ 
    protected $ramblerCatUpdate;
    
    /**
     * @ORM\Column(name="ya_index", type="integer")
     */ 
    protected $yaIndex = 0;

    /**
     * @ORM\Column(name="ya_virus", type="boolean")
     */
    protected $yaVirus = false;

    /**
     * @ORM\Column(name="ya_index_and_virus_update", type="date")
     */ 
    protected $yaIndexAndVirusUpdate;
    
    /**
     * @ORM\Column(name="ya_last_update", type="date")
     */ 
    protected $yaLastUpdate;

    /**
     * @ORM\Column(name="ya_last_update_update", type="date")
     */ 
    protected $yaLastUpdateUpdate;

    /**
     * @ORM\Column(name="ya_updatable", type="integer")
     */
    protected $yaUpdatable = 0;

    /**
     * @ORM\Column(name="ya_updatable_update", type="date")
     */
    protected $yaUpdatableUpdate;
    
    /**
     * @ORM\Column(name="ya_mention", type="integer")
     */ 
    protected $yaMention = 0;

    /**
     * @ORM\Column(name="ya_mention_update", type="date")
     */ 
    protected $yaMentionUpdate;

    /**
     * @ORM\Column(name="is_ags", type="boolean")
     */
    protected $isAGS = 0;

    /**
     * @ORM\Column(name="is_ags_update", type="date")
     */
    protected $isAGSUpdate;

    /**
     * @ORM\Column(name="ya_news", type="integer")
     */
    protected $yaNews = 0;

    /**
     * @ORM\Column(name="ya_news_update", type="date")
     */
    protected $yaNewsUpdate;

    /**
     * @ORM\Column(name="ya_picture", type="integer")
     */ 
    protected $yaPicture = 0;

    /**
     * @ORM\Column(name="ya_picture_update", type="date")
     */ 
    protected $yaPictureUpdate;
    
    /**
     * @ORM\Column(name="vk_like", type="integer")
     */ 
    protected $vkLike = 0;

    /**
     * @ORM\Column(name="vk_like_update", type="date")
     */ 
    protected $vkLikeUpdate;

    /**
     * @ORM\Column(name="fb_like", type="integer")
     */ 
    protected $fbLike = 0;

    /**
     * @ORM\Column(name="fb_like_update", type="date")
     */ 
    protected $fbLikeUpdate;

    /**
     * @ORM\Column(name="gp_like", type="integer")
     */ 
    protected $gpLike = 0;

    /**
     * @ORM\Column(name="gp_like_update", type="date")
     */ 
    protected $gpLikeUpdate;

    /**
     * @ORM\Column(name="tw_like", type="integer")
     */ 
    protected $twLike = 0;

    /**
     * @ORM\Column(name="tw_like_update", type="date")
     */ 
    protected $twLikeUpdate;
    
    /**
     * @ORM\Column(name="links_external", type="integer")
     */ 
    protected $linksExternal = 0;

    /**
     * @ORM\Column(name="domains_external", type="integer")
     */ 
    protected $domainsExternal = 0;
    
    /**
     * @ORM\Column(name="links_into", type="integer")
     */ 
    protected $linksInto = 0;

    /**
     * @ORM\Column(name="domains_into", type="integer")
     */ 
    protected $domainsInto = 0;
    
    /**
     * @ORM\Column(name="into_and_external_update", type="date")
     */ 
    protected $IntoAndExternalUpdate;

    /**
     * @ORM\OneToOne(targetEntity="DomainOverview", inversedBy="domain", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="domain_overview_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     *
     */
    protected $domainOverview;

    /**
     * @ORM\Column(name="domain_overview_update", type="date")
     */
    protected $domainOverviewUpdate;
    
    /**
     * @ORM\OneToMany(targetEntity="HistorySolomonoLinks", mappedBy="domain", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $historySolomonoLinks;

    /**
     * @ORM\Column(name="history_solomono_links_update", type="date")
     */ 
    protected $historySolomonoLinksUpdate;
    
    /**
     * @ORM\Column(name="ya_blog", type="integer")
     */ 
    protected $yaBlog = 0;

    /**
     * @ORM\Column(name="ya_blog_update", type="date")
     */ 
    protected $yaBlogUpdate;

    /**
     * @ORM\Column(name="first_crawl_date", type="date")
     */ 
    protected $firstCrawlDate;

    /**
     * @ORM\Column(name="first_crawl_date_update", type="date")
     */ 
    protected $firstCrawlDateUpdate;
    
    /**
     * @ORM\Column(name="citation_flow", type="integer")
     */ 
    protected $citationFlow = 0;

    /**
     * @ORM\Column(name="trust_flow", type="integer")
     */ 
    protected $trustFlow = 0;

    /**
     * @ORM\Column(name="flow_update", type="date")
     */ 
    protected $flowUpdate;

    /**
     * @ORM\Column(name="screen_shot_update", type="date")
     */
    protected $screenShotUpdate;

    /**
     * @ORM\ManyToMany(targetEntity="Calc\ApiBundle\Entity\Domain", mappedBy="competitors", cascade={"persist"})
     */
    protected $competitorsWithMeInYandex;
    
    /**
     * @ORM\ManyToMany(targetEntity="Calc\ApiBundle\Entity\Domain", inversedBy="competitorsWithMeInYandex", cascade={"persist"})
     * @ORM\JoinTable(name="competitors",
     *      joinColumns={@ORM\JoinColumn(name="domain_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="competitor_domain_id", referencedColumnName="id")}
     * )
     */
    protected $competitors;

    /**
     * @ORM\Column(name="competitors_update", type="date")
     */ 
    protected $competitorsUpdate;

    /**
     * @ORM\OneToMany(targetEntity="SemYadro", mappedBy="domain", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $semYadro;
    
    /**
     * @ORM\Column(name="sem_yadro_update", type="date")
     */ 
    protected $semYadroUpdate;

    /**
     * @ORM\OneToMany(targetEntity="SessionId", mappedBy="domain", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $sessionId;
    
    /**
     * @ORM\OneToMany(targetEntity="SessionCompetitors", mappedBy="domain", cascade={"persist"}, orphanRemoval=true)
     */
    protected $sessionCompetitors;
    
    /**
     * @ORM\ManyToMany(targetEntity="Sales", inversedBy="domains", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinTable(name="domain_sales")
     */
    protected $sales;
    
    /**
     * @ORM\ManyToMany(targetEntity="Badge", inversedBy="domains", cascade={"persist"})
     * @ORM\JoinTable(name="domain_badge")
     */
    protected $badge;

    /**
     * @ORM\Column(name="not_project_id", type="boolean")
     */
    protected $notProjectId = 0;
    
    /**
     * @ORM\Column(name="sitereport_project_id", type="integer")
     */ 
    protected $sitereportProjectId = 0;

    /**
     * @ORM\Column(name="status", type="string", length=10)
     */
    protected $status = 0;

    /**
     * @ORM\Column(name="stage", type="string", length=10)
     */
    protected $stage = 0;

    /**
     * @ORM\Column(name="text_stage", type="string", length=45)
     */
    protected $textStage = "";

    /**
     * @ORM\Column(name="pages_count", type="integer")
     */
    protected $pagesCount = 0;

    /**
     * @ORM\Column(name="link", type="string", length=120, nullable=true)
     */
    protected $link;

    /**
     * @ORM\Column(name="link_text_report", type="string", length=120, nullable=true)
     */
    protected $linkTextReport;

    /**
     * @ORM\Column(name="pdf_report_link", type="string", length=120, nullable=true)
     */
    protected $pdfReportLink;

    /**
     * @ORM\Column(name="is_semantic_sitereport", type="boolean", options={"default" = 0})
     */
    protected $isSemanticSitereport = 0;

    /**
     * @ORM\Column(name="sitereport_update", type="date")
     */
    protected $sitereportUpdate;
    
    /**
     * @ORM\Column(name="sales_project_id", type="integer")
     */ 
    protected $salesProjectId = 0;

    /**
     * @ORM\Column(name="is_live", type="boolean")
     */
    protected $isLive = 0;

    /**
     * @ORM\Column(name="price", type="integer")
     */
    protected $price = 0;

    /**
     * @ORM\Column(name="price_update", type="date")
     */
    protected $priceUpdate;

    /**
     * @ORM\Column(name="is_sem_yadro", type="boolean")
     */
    protected $isSemYadro = 0;

    /**
     * @ORM\Column(name="is_top", type="boolean")
     */
    protected $isTop = 0;

    /**
     * @ORM\Column(name="is_words_price", type="boolean")
     */
    protected $isWordsPrice = 0;

    /**
     * @ORM\Column(name="is_create_excel", type="boolean")
     */
    protected $isCreateExcel = 0;

    /**
     * @ORM\Column(name="is_g_metrics", type="boolean")
     */
    protected $isGMetrics = 0;

    /**
     * @ORM\Column(name="is_y_metrics", type="boolean")
     */
    protected $isYMetrics = 0;

    /**
     * @ORM\Column(name="is_metrics_update", type="date")
     */
    protected $isMetricsUpdate;

    /**
     * @ORM\Column(name="is_mobile_version", type="boolean")
     */
    protected $isMobileVersion = 0;

    /**
     * @ORM\Column(name="is_mobile_version_update", type="date")
     */
    protected $isMobileVersionUpdate;

    /**
     * @ORM\Column(name="is_robots", type="boolean")
     */
    protected $isRobots = 0;

    /**
     * @ORM\Column(name="is_robots_update", type="date")
     */
    protected $isRobotsUpdate;

    /**
     * @ORM\Column(name="is_site_map", type="boolean")
     */
    protected $isSiteMap = 0;

    /**
     * @ORM\Column(name="is_site_map_update", type="date")
     */
    protected $isSiteMapUpdate;

    /**
     * @ORM\Column(name="is_micro_data", type="boolean")
     */
    protected $isMicroData = 0;

    /**
     * @ORM\Column(name="is_micro_data_update", type="date")
     */
    protected $isMicroDataUpdate;

    /**
     * @ORM\Column(name="is_context_adv", type="boolean")
     */
    protected $isContextAdv = 0;

    /**
     * @ORM\Column(name="is_context_adv_update", type="date")
     */
    protected $isContextAdvUpdate;

    /**
     * @ORM\Column(name="is_redirect_for_main_page", type="boolean")
     */
    protected $isRedirectForMainPage = 0;

    /**
     * @ORM\Column(name="is_redirect_for_main_page_update", type="date")
     */
    protected $isRedirectForMainPageUpdate;

    /**
     * @ORM\Column(name="is_not_found_page", type="boolean")
     */
    protected $isNotFoundPage = 0;

    /**
     * @ORM\Column(name="is_not_found_page_update", type="date")
     */
    protected $isNotFoundPageUpdate;

    /**
     * @ORM\Column(name="is_correct_address", type="boolean")
     */
    protected $isCorrectAddress = 0;

    /**
     * @ORM\Column(name="is_correct_address_update", type="date")
     */
    protected $isCorrectAddressUpdate;

    /**
     * @ORM\Column(name="is_sem_yadro_excel", type="boolean")
     */
    protected $isSemYadroExcel = 0;

    /**
     * @ORM\Column(name="is_sem_yadro_excel_update", type="date")
     */
    protected $isSemYadroExcelUpdate;

    /**
     * @ORM\Column(name="is_long_tail", type="boolean", options={"default":"FALSE"})
     */
    protected $isLongTail = false;

    /**
     * @ORM\Column(name="create_lead", type="date", options={"default":"1970-01-01"})
     */
    protected $createLead;

    /**
     * @ORM\OneToMany(targetEntity="Calc\ApiBundle\Entity\DomainDictionary", mappedBy="domain", cascade={"persist"}, orphanRemoval=true)
     */
    protected $domainDictionary;

    public function __construct()
    {
        $this->competitorsWithMeInYandex = new ArrayCollection();
        $this->competitors = new ArrayCollection();
        $this->semYadro = new ArrayCollection();
        $this->sales = new ArrayCollection();
        $this->badge = new ArrayCollection();
        $this->sessionId = new ArrayCollection();

        //Устанавливаем даты по-умолчанию
        $this->created                          = new \DateTime(self::DEFAULT_DATE);
        $this->yaBarUpdate                      = new \DateTime(self::DEFAULT_DATE);
        $this->alexaUpdate                      = new \DateTime(self::DEFAULT_DATE);
        $this->domainCreationDate               = new \DateTime(self::DEFAULT_DATE);
        $this->domainCreationDateUpdate         = new \DateTime(self::DEFAULT_DATE);
        $this->dmozUpdate                       = new \DateTime(self::DEFAULT_DATE);
        $this->gIndexUpdate                     = new \DateTime(self::DEFAULT_DATE);
        $this->gExtraIndexUpdate                = new \DateTime(self::DEFAULT_DATE);
        $this->gMentionUpdate                   = new \DateTime(self::DEFAULT_DATE);
        $this->gPictureUpdate                   = new \DateTime(self::DEFAULT_DATE);
        $this->mailruCatUpdate                  = new \DateTime(self::DEFAULT_DATE);
        $this->ramblerCatUpdate                 = new \DateTime(self::DEFAULT_DATE);
        $this->yaIndexAndVirusUpdate            = new \DateTime(self::DEFAULT_DATE);
        $this->yaLastUpdate                     = new \DateTime(self::DEFAULT_DATE);
        $this->yaLastUpdateUpdate               = new \DateTime(self::DEFAULT_DATE);
        $this->yaMentionUpdate                  = new \DateTime(self::DEFAULT_DATE);
        $this->yaPictureUpdate                  = new \DateTime(self::DEFAULT_DATE);
        $this->vkLikeUpdate                     = new \DateTime(self::DEFAULT_DATE);
        $this->fbLikeUpdate                     = new \DateTime(self::DEFAULT_DATE);
        $this->gpLikeUpdate                     = new \DateTime(self::DEFAULT_DATE);
        $this->twLikeUpdate                     = new \DateTime(self::DEFAULT_DATE);
        $this->domainOverviewUpdate             = new \DateTime(self::DEFAULT_DATE);
        $this->IntoAndExternalUpdate            = new \DateTime(self::DEFAULT_DATE);
        $this->historySolomonoLinksUpdate       = new \DateTime(self::DEFAULT_DATE);
        $this->yaBlogUpdate                     = new \DateTime(self::DEFAULT_DATE);
        $this->firstCrawlDate                   = new \DateTime(self::DEFAULT_DATE); 
        $this->firstCrawlDateUpdate             = new \DateTime(self::DEFAULT_DATE); 
        $this->flowUpdate                       = new \DateTime(self::DEFAULT_DATE); 
        $this->competitorsUpdate                = new \DateTime(self::DEFAULT_DATE); 
        $this->semYadroUpdate                   = new \DateTime(self::DEFAULT_DATE);
        $this->sitereportUpdate                 = new \DateTime(self::DEFAULT_DATE);
        $this->screenShotUpdate                 = new \DateTime(self::DEFAULT_DATE);
        $this->isMetricsUpdate                  = new \DateTime(self::DEFAULT_DATE);
        $this->priceUpdate                      = new \DateTime(self::DEFAULT_DATE);
        $this->isMobileVersionUpdate            = new \DateTime(self::DEFAULT_DATE);
        $this->metaUpdate                       = new \DateTime(self::DEFAULT_DATE);
        $this->isSiteMapUpdate                  = new \DateTime(self::DEFAULT_DATE);
        $this->isRobotsUpdate                   = new \DateTime(self::DEFAULT_DATE);
        $this->isMicroDataUpdate                = new \DateTime(self::DEFAULT_DATE);
        $this->isContextAdvUpdate               = new \DateTime(self::DEFAULT_DATE);
        $this->isRedirectForMainPageUpdate      = new \DateTime(self::DEFAULT_DATE);
        $this->isNotFoundPageUpdate             = new \DateTime(self::DEFAULT_DATE);
        $this->yaNewsUpdate                     = new \DateTime(self::DEFAULT_DATE);
        $this->isCorrectAddressUpdate           = new \DateTime(self::DEFAULT_DATE);
        $this->yaUpdatableUpdate                = new \DateTime(self::DEFAULT_DATE);
        $this->isAGSUpdate                      = new \DateTime(self::DEFAULT_DATE);
        $this->isSemYadroExcelUpdate            = new \DateTime(self::DEFAULT_DATE);
        $this->createLead                       = new \DateTime(self::DEFAULT_DATE);
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
     * Set domain
     *
     * @param string $domain
     * @return Domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string 
     */
    public function getDomain()
    {
        return mb_strtolower($this->domain);
    }

    /**
     * Set statusCode
     *
     * @param integer $statusCode
     * @return Domain
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Get statusCode
     *
     * @return integer 
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set sizeDownload
     *
     * @param integer $sizeDownload
     * @return Domain
     */
    public function setSizeDownload($sizeDownload)
    {
        $this->sizeDownload = $sizeDownload;

        return $this;
    }

    /**
     * Get sizeDownload
     *
     * @return integer 
     */
    public function getSizeDownload()
    {
        return $this->sizeDownload;
    }

    /**
     * Set totalTime
     *
     * @param integer $totalTime
     * @return Domain
     */
    public function setTotalTime($totalTime)
    {
        $this->totalTime = $totalTime;

        return $this;
    }

    /**
     * Get totalTime
     *
     * @return integer 
     */
    public function getTotalTime()
    {
        return $this->totalTime;
    }

    /**
     * Set connectTime
     *
     * @param integer $connectTime
     * @return Domain
     */
    public function setConnectTime($connectTime)
    {
        $this->connectTime = $connectTime;

        return $this;
    }

    /**
     * Get connectTime
     *
     * @return integer 
     */
    public function getConnectTime()
    {
        return $this->connectTime;
    }

    /**
     * Set yaTic
     *
     * @param integer $yaTic
     * @return Domain
     */
    public function setYaTic($yaTic)
    {
        $this->yaTic = $yaTic;
        
        $this->yaBarUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get yaTic
     *
     * @return integer 
     */
    public function getYaTic()
    {
        return $this->yaTic;
    }

    /**
     * Set yaMirror
     *
     * @param string $yaMirror
     * @return Domain
     */
    public function setYaMirror($yaMirror)
    {
        $this->yaMirror = $yaMirror;
        
        $this->yaBarUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get yaMirror
     *
     * @return string 
     */
    public function getYaMirror()
    {
        return $this->yaMirror;
    }

    /**
     * Set yaCommerce
     *
     * @param boolean $yaCommerce
     * @return Domain
     */
    public function setYaCommerce($yaCommerce)
    {
        $this->yaCommerce = $yaCommerce ? true : false;
        
        $this->yaBarUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get yaCommerce
     *
     * @return boolean 
     */
    public function getYaCommerce()
    {
        return $this->yaCommerce;
    }

    
    /**
     * Set yaCatalog
     *
     * @param boolean $yaCatalog
     * @return Domain
     */
    public function setYaCatalog($yaCatalog)
    {
        $this->yaCatalog = $yaCatalog;
        
        $this->yaBarUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get yaCatalog
     *
     * @return boolean 
     */
    public function getYaCatalog()
    {
        return $this->yaCatalog;
    }    
    
    /**
     * Set yaBarUpdate
     *
     * @param \DateTime $yaBarUpdate
     * @return Domain
     */
    public function setYaBarUpdate(\DateTime $yaBarUpdate)
    {
        $this->yaBarUpdate = $yaBarUpdate;

        return $this;
    }

    /**
     * Get yaBarUpdate
     *
     * @return \DateTime 
     */
    public function getYaBarUpdate()
    {
        return $this->yaBarUpdate;
    }

    /**
     * Set yaTheme
     *
     * @param \Calc\ApiBundle\Entity\YaTheme $yaTheme
     * @return Domain
     */
    public function setYaTheme(\Calc\ApiBundle\Entity\YaTheme $yaTheme = null)
    {
        $this->yaTheme = $yaTheme;

        return $this;
    }

    /**
     * Get yaTheme
     *
     * @return \Calc\ApiBundle\Entity\YaTheme 
     */
    public function getYaTheme()
    {
        return $this->yaTheme;
    }

    /**
     * Set alexaUpdate
     *
     * @param \DateTime $alexaUpdate
     * @return Domain
     */
    public function setAlexaUpdate(\DateTime $alexaUpdate)
    {
        $this->alexaUpdate = $alexaUpdate;

        return $this;
    }

    /**
     * Get alexaUpdate
     *
     * @return \DateTime 
     */
    public function getAlexaUpdate()
    {
        return $this->alexaUpdate;
    }

    /**
     * Set bouncePercent
     *
     * @param string $bouncePercent
     * @return Domain
     */
    public function setBouncePercent($bouncePercent)
    {
        $this->bouncePercent = $bouncePercent;
        
        $this->alexaUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get bouncePercent
     *
     * @return string 
     */
    public function getBouncePercent()
    {
        return $this->bouncePercent;
    }

    /**
     * Set timeOnSite
     *
     * @param integer $timeOnSite
     * @return Domain
     */
    public function setTimeOnSite($timeOnSite)
    {
        $this->timeOnSite = $timeOnSite;
        
        $this->alexaUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get timeOnSite
     *
     * @return integer 
     */
    public function getTimeOnSite()
    {
        return $this->timeOnSite;
    }

    /**
     * Set ruAlexa
     *
     * @param integer $ruAlexa
     * @return Domain
     */
    public function setRuAlexa($ruAlexa)
    {
        $this->ruAlexa = $ruAlexa;
        
        $this->alexaUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get ruAlexa
     *
     * @return integer 
     */
    public function getRuAlexa()
    {
        return $this->ruAlexa;
    }

    /**
     * Set pageviewsPerVisitor
     *
     * @param string $pageviewsPerVisitor
     * @return Domain
     */
    public function setPageviewsPerVisitor($pageviewsPerVisitor)
    {
        $this->pageviewsPerVisitor = $pageviewsPerVisitor;
        
        $this->alexaUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get pageviewsPerVisitor
     *
     * @return string 
     */
    public function getPageviewsPerVisitor()
    {
        return $this->pageviewsPerVisitor;
    }

    /**
     * Set rankAlexa
     *
     * @param integer $rankAlexa
     * @return Domain
     */
    public function setRankAlexa($rankAlexa)
    {
        $this->rankAlexa = $rankAlexa;
        
        $this->alexaUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get rankAlexa
     *
     * @return integer 
     */
    public function getRankAlexa()
    {
        return $this->rankAlexa;
    }

    /**
     * Set dmoz
     *
     * @param boolean $dmoz
     * @return Domain
     */
    public function setDmoz($dmoz)
    {
        $this->dmoz = $dmoz;
        
        $this->dmozUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get dmoz
     *
     * @return boolean 
     */
    public function getDmoz()
    {
        return $this->dmoz;
    }

    /**
     * Set dmozUpdate
     *
     * @param \DateTime $dmozUpdate
     * @return Domain
     */
    public function setDmozUpdate(\DateTime $dmozUpdate)
    {
        $this->dmozUpdate = $dmozUpdate;

        return $this;
    }

    /**
     * Get dmozUpdate
     *
     * @return \DateTime 
     */
    public function getDmozUpdate()
    {
        return $this->dmozUpdate;
    }

    /**
     * Set domainCreationDate
     *
     * @param \DateTime $domainCreationDate
     * @return Domain
     */
    public function setDomainCreationDate($domainCreationDate)
    {
        $this->domainCreationDate = $domainCreationDate;
        
        $this->domainCreationDateUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get domainCreationDate
     *
     * @return \DateTime 
     */
    public function getDomainCreationDate()
    {
        return $this->domainCreationDate;
    }
    
    /**
     * Get domainAge
     *
     * @return \DateTime 
     */
    public function getDomainAge()
    {
        $diff = $this->domainCreationDate->diff(new \DateTime());
        
        return [
            'y' => $diff->y,
            'm' => $diff->m,
            'd' => $diff->d,
            'days' => $diff->days,
            'string' => $this->yearText($diff->y)   . ' ' . $this->monthText($diff->m),
        ];
    }
    
    private function yearText($year)
    {
        $m = substr($year,-1,1);
        $l = substr($year,-2,2);

        return $year. ' ' .((($m==1)&&($l!=11))?'год':((($m==2)&&($l!=12)||($m==3)&&($l!=13)||($m==4)&&($l!=14))?'года':'лет'));
    }
    
    private function monthText($month)
    {
        $m = substr($month,-1,1);
        $l = substr($month,-2,2);

        return $month. ' ' .((($m==1)&&($l!=11))?'месяц':((($m==2)&&($l!=12)||($m==3)&&($l!=13)||($m==4)&&($l!=14))?'месяца':'месяцев'));
    }

    /**
     * Set domainCreationDateUpdate
     *
     * @param \DateTime $domainCreationDateUpdate
     * @return Domain
     */
    public function setDomainCreationDateUpdate(\DateTime $domainCreationDateUpdate)
    {
        $this->domainCreationDateUpdate = $domainCreationDateUpdate;

        return $this;
    }

    /**
     * Get domainCreationDateUpdate
     *
     * @return \DateTime 
     */
    public function getDomainCreationDateUpdate()
    {
        return $this->domainCreationDateUpdate;
    }

    /**
     * Set gIndex
     *
     * @param integer $gIndex
     * @return Domain
     */
    public function setGIndex($gIndex)
    {
        $this->gIndex = $gIndex;
        
        $this->gIndexUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get gIndex
     *
     * @return integer 
     */
    public function getGIndex()
    {
        return $this->gIndex;
    }

    /**
     * Set gIndexUpdate
     *
     * @param \DateTime $gIndexUpdate
     * @return Domain
     */
    public function setGIndexUpdate(\DateTime $gIndexUpdate)
    {
        $this->gIndexUpdate = $gIndexUpdate;

        return $this;
    }

    /**
     * Get gIndexUpdate
     *
     * @return \DateTime 
     */
    public function getGIndexUpdate()
    {
        return $this->gIndexUpdate;
    }

    /**
     * Set gExtraIndex
     *
     * @param integer $gExtraIndex
     * @return Domain
     */
    public function setGExtraIndex($gExtraIndex)
    {
        $this->gExtraIndex = $gExtraIndex;
        
        $this->gExtraIndexUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get gExtraIndex
     *
     * @return integer 
     */
    public function getGExtraIndex()
    {
        return $this->gExtraIndex;
    }

    /**
     * Set gExtraIndexUpdate
     *
     * @param \DateTime $gExtraIndexUpdate
     * @return Domain
     */
    public function setGExtraIndexUpdate(\DateTime $gExtraIndexUpdate)
    {
        $this->gExtraIndexUpdate = $gExtraIndexUpdate;

        return $this;
    }

    /**
     * Get gExtraIndexUpdate
     *
     * @return \DateTime 
     */
    public function getGExtraIndexUpdate()
    {
        return $this->gExtraIndexUpdate;
    }

    /**
     * Set gMention
     *
     * @param integer $gMention
     * @return Domain
     */
    public function setGMention($gMention)
    {
        $this->gMention = $gMention;
        
        $this->gMentionUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get gMention
     *
     * @return integer 
     */
    public function getGMention()
    {
        return $this->gMention;
    }

    /**
     * Set gMentionUpdate
     *
     * @param \DateTime $gMentionUpdate
     * @return Domain
     */
    public function setGMentionUpdate(\DateTime $gMentionUpdate)
    {
        $this->gMentionUpdate = $gMentionUpdate;

        return $this;
    }

    /**
     * Get gMentionUpdate
     *
     * @return \DateTime 
     */
    public function getGMentionUpdate()
    {
        return $this->gMentionUpdate;
    }

    /**
     * Set gPicture
     *
     * @param integer $gPicture
     * @return Domain
     */
    public function setGPicture($gPicture)
    {
        $this->gPicture = $gPicture;
        
        $this->gPictureUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get gPicture
     *
     * @return integer 
     */
    public function getGPicture()
    {
        return $this->gPicture;
    }

    /**
     * Set gPpictureUpdate
     *
     * @param \DateTime $gPictureUpdate
     * @return Domain
     */
    public function setGPictureUpdate(\DateTime $gPictureUpdate)
    {
        $this->gPictureUpdate = $gPictureUpdate;

        return $this;
    }

    /**
     * Get gPpictureUpdate
     *
     * @return \DateTime 
     */
    public function getGPictureUpdate()
    {
        return $this->gPictureUpdate;
    }

    /**
     * Set mailruCat
     *
     * @param boolean $mailruCat
     * @return Domain
     */
    public function setMailruCat($mailruCat)
    {
        $this->mailruCat = $mailruCat;
        
        $this->mailruCatUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get mailruCat
     *
     * @return boolean 
     */
    public function getMailruCat()
    {
        return $this->mailruCat;
    }

    /**
     * Set mailruCatUpdate
     *
     * @param \DateTime $mailruCatUpdate
     * @return Domain
     */
    public function setMailruCatUpdate(\DateTime $mailruCatUpdate)
    {
        $this->mailruCatUpdate = $mailruCatUpdate;

        return $this;
    }

    /**
     * Get mailruCatUpdate
     *
     * @return \DateTime 
     */
    public function getMailruCatUpdate()
    {
        return $this->mailruCatUpdate;
    }

    /**
     * Set ramblerCat
     *
     * @param boolean $ramblerCat
     * @return Domain
     */
    public function setRamblerCat($ramblerCat)
    {
        $this->ramblerCat = $ramblerCat;
        
        $this->ramblerCatUpdate =  new \DateTime();

        return $this;
    }

    /**
     * Get ramblerCat
     *
     * @return boolean 
     */
    public function getRamblerCat()
    {
        return $this->ramblerCat;
    }

    /**
     * Set ramblerCatUpdate
     *
     * @param \DateTime $ramblerCatUpdate
     * @return Domain
     */
    public function setRamblerCatUpdate(\DateTime $ramblerCatUpdate)
    {
        $this->ramblerCatUpdate = $ramblerCatUpdate;

        return $this;
    }

    /**
     * Get ramblerCatUpdate
     *
     * @return \DateTime 
     */
    public function getRamblerCatUpdate()
    {
        return $this->ramblerCatUpdate;
    }

    /**
     * Set yaIndex
     *
     * @param integer $yaIndex
     * @return Domain
     */
    public function setYaIndex($yaIndex)
    {
        $this->yaIndex = $yaIndex;
        
        $this->yaIndexAndVirusUpdate =  new \DateTime();

        return $this;
    }

    /**
     * Get yaIndex
     *
     * @return integer 
     */
    public function getYaIndex()
    {
        return $this->yaIndex;
    }

    /**
     * Set yaVirus
     *
     * @param boolean $yaVirus
     * @return Domain
     */
    public function setYaVirus($yaVirus)
    {
        $this->yaVirus = $yaVirus;
        
        $this->yaIndexAndVirusUpdate =  new \DateTime();

        return $this;
    }

    /**
     * Get yaVirus
     *
     * @return boolean 
     */
    public function getYaVirus()
    {
        return $this->yaVirus;
    }

    /**
     * Set yaIndexAndVirusUpdate
     *
     * @param \DateTime $yaIndexAndVirusUpdate
     * @return Domain
     */
    public function setYaIndexAndVirusUpdate(\DateTime $yaIndexAndVirusUpdate)
    {
        $this->yaIndexAndVirusUpdate = $yaIndexAndVirusUpdate;

        return $this;
    }

    /**
     * Get yaIndexAndVirusUpdate
     *
     * @return \DateTime 
     */
    public function getYaIndexAndVirusUpdate()
    {
        return $this->yaIndexAndVirusUpdate;
    }

    /**
     * Set yaLastUpdate
     *
     * @param \DateTime $yaLastUpdate
     * @return Domain
     */
    public function setYaLastUpdate($yaLastUpdate)
    {
        $this->yaLastUpdate = $yaLastUpdate;
        
        $this->yaLastUpdateUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get yaLastUpdate
     *
     * @return \DateTime 
     */
    public function getYaLastUpdate()
    {
        return $this->yaLastUpdate;
    }
    
    public function getYaLastUpdateToDiff()
    {
        $diff = $this->yaLastUpdate->diff(new \DateTime());
         
        return  [
            'date' => $this->yaLastUpdate->format('d.m.Y'),
            'diff' =>  [
                'y' => $diff->y,
                'm' => $diff->m,
                'd' => $diff->d,
                'days' => $diff->days,
                'string' => $this->yearText($diff->y)   . ' ' . $this->monthText($diff->m),
            ]
        ];
    }
    /**
     * Set yaLastUpdateUpdate
     *
     * @param \DateTime $yaLastUpdateUpdate
     * @return Domain
     */
    public function setYaLastUpdateUpdate(\DateTime $yaLastUpdateUpdate)
    {
        $this->yaLastUpdateUpdate = $yaLastUpdateUpdate;

        return $this;
    }

    /**
     * Get yaLastUpdateUpdate
     *
     * @return \DateTime 
     */
    public function getYaLastUpdateUpdate()
    {
        return $this->yaLastUpdateUpdate;
    }

    /**
     * Set yaMention
     *
     * @param integer $yaMention
     * @return Domain
     */
    public function setYaMention($yaMention)
    {
        $this->yaMention = $yaMention;
        
        $this->yaMentionUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get yaMention
     *
     * @return integer 
     */
    public function getYaMention()
    {
        return $this->yaMention;
    }

    /**
     * Set yaMentionUpdate
     *
     * @param \DateTime $yaMentionUpdate
     * @return Domain
     */
    public function setYaMentionUpdate(\DateTime $yaMentionUpdate)
    {
        $this->yaMentionUpdate = $yaMentionUpdate;

        return $this;
    }

    /**
     * Get yaMentionUpdate
     *
     * @return \DateTime 
     */
    public function getYaMentionUpdate()
    {
        return $this->yaMentionUpdate;
    }

    /**
     * Set yaPicture
     *
     * @param integer $yaPicture
     * @return Domain
     */
    public function setYaPicture($yaPicture)
    {
        $this->yaPicture = $yaPicture;
        
        $this->yaPpictureUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get yaPicture
     *
     * @return integer 
     */
    public function getYaPicture()
    {
        return $this->yaPicture;
    }

    /**
     * Set yaPictureUpdate
     *
     * @param \DateTime $yaPictureUpdate
     * @return Domain
     */
    public function setYaPictureUpdate($yaPictureUpdate)
    {
        $this->yaPpictureUpdate = $yaPictureUpdate;

        return $this;
    }

    /**
     * Get yaPictureUpdate
     *
     * @return \DateTime 
     */
    public function getYaPictureUpdate()
    {
        return $this->yaPictureUpdate;
    }

    /**
     * Set vkLike
     *
     * @param integer $vkLike
     * @return Domain
     */
    public function setVkLike($vkLike)
    {
        $this->vkLike = $vkLike;
        
        $this->vkLikeUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get vkLike
     *
     * @return integer 
     */
    public function getVkLike()
    {
        return $this->vkLike;
    }

    /**
     * Set vkLikeUpdate
     *
     * @param \DateTime $vkLikeUpdate
     * @return Domain
     */
    public function setVkLikeUpdate(\DateTime $vkLikeUpdate)
    {
        $this->vkLikeUpdate = $vkLikeUpdate;

        return $this;
    }

    /**
     * Get vkLikeUpdate
     *
     * @return \DateTime 
     */
    public function getVkLikeUpdate()
    {
        return $this->vkLikeUpdate;
    }

    /**
     * Set fbLike
     *
     * @param integer $fbLike
     * @return Domain
     */
    public function setFbLike($fbLike)
    {
        $this->fbLike = $fbLike;
        
        $this->fbLikeUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get fbLike
     *
     * @return integer 
     */
    public function getFbLike()
    {
        return $this->fbLike;
    }

    /**
     * Set fbLikeUpdate
     *
     * @param \DateTime $fbLikeUpdate
     * @return Domain
     */
    public function setFbLikeUpdate($fbLikeUpdate)
    {
        $this->fbLikeUpdate = $fbLikeUpdate;
        
        return $this;
    }

    /**
     * Get fbLikeUpdate
     *
     * @return \DateTime 
     */
    public function getFbLikeUpdate()
    {
        return $this->fbLikeUpdate;
    }

    /**
     * Set gpLike
     *
     * @param integer $gpLike
     * @return Domain
     */
    public function setGpLike($gpLike)
    {
        $this->gpLike = $gpLike;
        
        $this->gpLikeUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get gpLike
     *
     * @return integer 
     */
    public function getGpLike()
    {
        return $this->gpLike;
    }

    /**
     * Set gpLikeUpdate
     *
     * @param \DateTime $gpLikeUpdate
     * @return Domain
     */
    public function setGpLikeUpdate($gpLikeUpdate)
    {
        $this->gpLikeUpdate = $gpLikeUpdate;

        return $this;
    }

    /**
     * Get gpLikeUpdate
     *
     * @return \DateTime 
     */
    public function getGpLikeUpdate()
    {
        return $this->gpLikeUpdate;
    }

    /**
     * Set twLike
     *
     * @param integer $twLike
     * @return Domain
     */
    public function setTwLike($twLike)
    {
        $this->twLike = $twLike;
        
        $this->twLikeUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get twLike
     *
     * @return integer 
     */
    public function getTwLike()
    {
        return $this->twLike;
    }

    /**
     * Set twLikeUpdate
     *
     * @param \DateTime $twLikeUpdate
     * @return Domain
     */
    public function setTwLikeUpdate($twLikeUpdate)
    {
        $this->twLikeUpdate = $twLikeUpdate;

        return $this;
    }

    /**
     * Get twLikeUpdate
     *
     * @return \DateTime 
     */
    public function getTwLikeUpdate()
    {
        return $this->twLikeUpdate;
    }

    /**
     * Set linksExternal
     *
     * @param integer $linksExternal
     * @return Domain
     */
    public function setLinksExternal($linksExternal)
    {
        $this->linksExternal = $linksExternal;
        
        $this->IntoAndExternalUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get linksExternal
     *
     * @return integer 
     */
    public function getLinksExternal()
    {
        return $this->linksExternal;
    }

    /**
     * Set domainsExternal
     *
     * @param integer $domainsExternal
     * @return Domain
     */
    public function setDomainsExternal($domainsExternal)
    {
        $this->domainsExternal = $domainsExternal;
        
        $this->IntoAndExternalUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get domainsExternal
     *
     * @return integer 
     */
    public function getDomainsExternal()
    {
        return $this->domainsExternal;
    }

    /**
     * Set linksInto
     *
     * @param integer $linksInto
     * @return Domain
     */
    public function setLinksInto($linksInto)
    {
        $this->linksInto = $linksInto;
        
        $this->IntoAndExternalUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get linksInto
     *
     * @return integer 
     */
    public function getLinksInto()
    {
        return $this->linksInto;
    }

    /**
     * Set domainsInto
     *
     * @param integer $domainsInto
     * @return Domain
     */
    public function setDomainsInto($domainsInto)
    {
        $this->domainsInto = $domainsInto;
        
        $this->IntoAndExternalUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get domainsInto
     *
     * @return integer 
     */
    public function getDomainsInto()
    {
        return $this->domainsInto;
    }

    /**
     * Set IntoAndExternalUpdate
     *
     * @param \DateTime $intoAndExternalUpdate
     * @return Domain
     */
    public function setIntoAndExternalUpdate(\DateTime $intoAndExternalUpdate)
    {
        $this->IntoAndExternalUpdate = $intoAndExternalUpdate;

        return $this;
    }
    
    /**
     * Get externalUpdate
     *
     * @return \DateTime 
     */
    public function getIntoAndExternalUpdate()
    {
        return $this->IntoAndExternalUpdate;
    }

    /**
     * Set HistorySolomonoLinksUpdate
     *
     * @param \DateTime $historySolomonoLinksUpdate
     * @return Domain
     */
    public function setHistorySolomonoLinksUpdate(\DateTime $historySolomonoLinksUpdate)
    {
        $this->historySolomonoLinksUpdate = $historySolomonoLinksUpdate;

        return $this;
    }

    /**
     * Get HistorySolomonoLinksUpdate
     *
     * @return \DateTime 
     */
    public function getHistorySolomonoLinksUpdate()
    {
        return $this->historySolomonoLinksUpdate;
    }

    /**
     * Add HistorySolomonoLinks
     *
     * @param \Calc\ApiBundle\Entity\HistorySolomonoLinks $historySolomonoLinks
     * @return Domain
     */
    public function addHistorySolomonoLink(\Calc\ApiBundle\Entity\HistorySolomonoLinks $historySolomonoLinks)
    {
        $this->historySolomonoLinks[] = $historySolomonoLinks;
        
        $historySolomonoLinks->setDomain($this);
        $this->historySolomonoLinksUpdate = new \DateTime();

        return $this;
    }

    /**
     * Remove HistorySolomonoLinks
     *
     * @param \Calc\ApiBundle\Entity\HistorySolomonoLinks $historySolomonoLinks
     */
    public function removeHistorySolomonoLink(\Calc\ApiBundle\Entity\HistorySolomonoLinks $historySolomonoLinks)
    {
        $this->historySolomonoLinks->removeElement($historySolomonoLinks);
    }

    /**
     * Get HistorySolomonoLinks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHistorySolomonoLinks()
    {
        return $this->historySolomonoLinks;
    }

    /**
     * Set yaBlog
     *
     * @param integer $yaBlog
     * @return Domain
     */
    public function setYaBlog($yaBlog)
    {
        $this->yaBlog = $yaBlog;
        
        $this->yaBlogUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get yaBlog
     *
     * @return integer 
     */
    public function getYaBlog()
    {
        return $this->yaBlog;
    }

    /**
     * Set yaBlogUpdate
     *
     * @param \DateTime $yaBlogUpdate
     * @return Domain
     */
    public function setYaBlogUpdate($yaBlogUpdate)
    {
        $this->yaBlogUpdate = $yaBlogUpdate;

        return $this;
    }

    /**
     * Get yaBlogUpdate
     *
     * @return \DateTime 
     */
    public function getYaBlogUpdate()
    {
        return $this->yaBlogUpdate;
    }

    /**
     * Set firstCrawlDate
     *
     * @param \DateTime $firstCrawlDate
     * @return Domain
     */
    public function setFirstCrawlDate($firstCrawlDate)
    {
        $this->firstCrawlDate = $firstCrawlDate;
        
        $this->firstCrawlDateUpdate = new \DateTime(); 

        return $this;
    }

    /**
     * Get firstCrawlDate
     *
     * @return \DateTime 
     */
    public function getFirstCrawlDate()
    {
        return $this->firstCrawlDate;
    }

    /**
     * Set firstCrawlDateUpdate
     *
     * @param \DateTime $firstCrawlDateUpdate
     * @return Domain
     */
    public function setFirstCrawlDateUpdate($firstCrawlDateUpdate)
    {
        $this->firstCrawlDateUpdate = $firstCrawlDateUpdate;

        return $this;
    }

    /**
     * Get firstCrawlDateUpdate
     *
     * @return \DateTime 
     */
    public function getFirstCrawlDateUpdate()
    {
        return $this->firstCrawlDateUpdate;
    }

    /**
     * Set CitationFlow
     *
     * @param integer $citationFlow
     * @return Domain
     */
    public function setCitationFlow($citationFlow)
    {
        $this->citationFlow = $citationFlow;
        
        $this->flowUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get CitationFlow
     *
     * @return integer 
     */
    public function getCitationFlow()
    {
        return $this->citationFlow;
    }

    /**
     * Set TrustFlow
     *
     * @param integer $trustFlow
     * @return Domain
     */
    public function setTrustFlow($trustFlow)
    {
        $this->trustFlow = $trustFlow;
        
        $this->flowUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get TrustFlow
     *
     * @return integer 
     */
    public function getTrustFlow()
    {
        return $this->trustFlow;
    }

    /**
     * Set flowUpdate
     *
     * @param \DateTime $flowUpdate
     * @return Domain
     */
    public function setFlowUpdate($flowUpdate)
    {
        $this->flowUpdate = $flowUpdate;

        return $this;
    }

    /**
     * Get flowUpdate
     *
     * @return \DateTime 
     */
    public function getFlowUpdate()
    {
        return $this->flowUpdate;
    }


    /**
     * Add competitorsWithMeInYandex
     *
     * @param \Calc\ApiBundle\Entity\Domain $competitorsWithMeInYandex
     * @return Domain
     */
    public function addCompetitorsWithMeInYandex(\Calc\ApiBundle\Entity\Domain $competitorsWithMeInYandex)
    {
        $this->competitorsWithMeInYandex[] = $competitorsWithMeInYandex;

        return $this;
    }

    /**
     * Remove competitorsWithMeInYandex
     *
     * @param \Calc\ApiBundle\Entity\Domain $competitorsWithMeInYandex
     */
    public function removeCompetitorsWithMeInYandex(\Calc\ApiBundle\Entity\Domain $competitorsWithMeInYandex)
    {
        $this->competitorsWithMeInYandex->removeElement($competitorsWithMeInYandex);
    }

    /**
     * Get competitorsWithMeInYandex
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompetitorsWithMeInYandex()
    {
        return $this->competitorsWithMeInYandex;
    }

    /**
     * Add competitors
     *
     * @param \Calc\ApiBundle\Entity\Domain $competitors
     * @return Domain
     */
    public function addCompetitor(\Calc\ApiBundle\Entity\Domain $competitors)
    {
        $this->competitors[] = $competitors;
        $this->competitorsUpdate  = new \DateTime();

        return $this;
    }

    /**
     * Remove competitors
     *
     * @param \Calc\ApiBundle\Entity\Domain $competitors
     */
    public function removeCompetitor(\Calc\ApiBundle\Entity\Domain $competitors)
    {
        $this->competitors->removeElement($competitors);
    }

    /**
     * Get Competitors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompetitors()
    {
        return $this->competitors;
    }

    /**
     * Set competitorsUpdate
     *
     * @param \DateTime $competitorsUpdate
     * @return Domain
     */
    public function setCompetitorsUpdate(\DateTime $competitorsUpdate)
    {
        $this->competitorsUpdate = $competitorsUpdate;

        return $this;
    }

    /**
     * Get competitorsUpdate
     *
     * @return \DateTime 
     */
    public function getCompetitorsUpdate()
    {
        return $this->competitorsUpdate;
    }

    /**
     * Set semYadroUpdate
     *
     * @param \DateTime $semYadroUpdate
     * @return Domain
     */
    public function setSemYadroUpdate($semYadroUpdate)
    {
        $this->semYadroUpdate = $semYadroUpdate;

        return $this;
    }

    /**
     * Get semYadroUpdate
     *
     * @return \DateTime 
     */
    public function getSemYadroUpdate()
    {
        return $this->semYadroUpdate;
    }

    /**
     * Add semYadro
     *
     * @param \Calc\ApiBundle\Entity\SemYadro $semYadro
     * @return Domain
     */
    public function addSemYadro(\Calc\ApiBundle\Entity\SemYadro $semYadro)
    {
        $semYadro->setDomain($this);
        
        $this->semYadro[] = $semYadro;

        return $this;
    }

    /**
     * Remove semYadro
     *
     * @param \Calc\ApiBundle\Entity\SemYadro $semYadro
     */
    public function removeSemYadro(\Calc\ApiBundle\Entity\SemYadro $semYadro)
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
     * Set title
     *
     * @param string $title
     * @return Domain
     */
    public function setTitle($title)
    {
        $this->title = $title;

        $this->metaUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Domain
     */
    public function setDescription($description)
    {
        $this->description = $description;

        $this->metaUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Domain
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Set created Pre Persist
     *
     * @return Domain
     * @ORM\PrePersist
     */
    public function setCreatedPrePersist()
    {
        $this->created = new \DateTime();

        return $this;
    }
    
    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set sitereportProjectId
     *
     * @param integer $sitereportProjectId Sitereport Project ID
     * @return Domain
     */
    public function setSitereportProjectId($sitereportProjectId)
    {
        $this->sitereportProjectId = $sitereportProjectId;

        $this->sitereportUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get sitereportProjectId
     *
     * @return integer Sitereport Project ID
     */
    public function getSitereportProjectId()
    {
        return $this->sitereportProjectId;
    }

    /**
     * Set salesProjectId
     *
     * @param integer $salesProjectId
     * @return Domain
     */
    public function setSalesProjectId($salesProjectId)
    {
        $this->salesProjectId = $salesProjectId;

        return $this;
    }

    /**
     * Get salesProjectId
     *
     * @return integer 
     */
    public function getSalesProjectId()
    {
        return $this->salesProjectId;
    }

    /**
     * Add sales
     *
     * @param \Calc\ApiBundle\Entity\Sales $sales
     * @return Domain
     */
    public function addSale(\Calc\ApiBundle\Entity\Sales $sales)
    {
        $this->sales[] = $sales;

        return $this;
    }

    /**
     * Remove sales
     *
     * @param \Calc\ApiBundle\Entity\Sales $sales
     */
    public function removeSale(\Calc\ApiBundle\Entity\Sales $sales)
    {
        $this->sales->removeElement($sales);
    }

    /**
     * Get sales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSales()
    {
        return $this->sales;
    }

    /**
     * Add badge
     *
     * @param \Calc\ApiBundle\Entity\Badge $badge
     * @return Domain
     */
    public function addBadge(\Calc\ApiBundle\Entity\Badge $badge)
    {
        $this->badge[] = $badge;

        return $this;
    }

    /**
     * Remove badge
     *
     * @param \Calc\ApiBundle\Entity\Badge $badge
     */
    public function removeBadge(\Calc\ApiBundle\Entity\Badge $badge)
    {
        $this->badge->removeElement($badge);
    }

    /**
     * Get badge
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * Add sessionId
     *
     * @param \Calc\ApiBundle\Entity\SessionId $sessionId
     * @return Domain
     */
    public function addSessionId(\Calc\ApiBundle\Entity\SessionId $sessionId)
    {
        $this->sessionId[] = $sessionId;

        return $this;
    }

    /**
     * Remove sessionId
     *
     * @param \Calc\ApiBundle\Entity\SessionId $sessionId
     */
    public function removeSessionId(\Calc\ApiBundle\Entity\SessionId $sessionId)
    {
        $this->sessionId->removeElement($sessionId);
    }

    /**
     * Get sessionId
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Add sessionCompetitors
     *
     * @param \Calc\ApiBundle\Entity\SessionCompetitors $sessionCompetitors
     * @return Domain
     */
    public function addSessionCompetitor(\Calc\ApiBundle\Entity\SessionCompetitors $sessionCompetitors)
    {
        $this->sessionCompetitors[] = $sessionCompetitors;

        return $this;
    }

    /**
     * Remove sessionCompetitors
     *
     * @param \Calc\ApiBundle\Entity\SessionCompetitors $sessionCompetitors
     */
    public function removeSessionCompetitor(\Calc\ApiBundle\Entity\SessionCompetitors $sessionCompetitors)
    {
        $this->sessionCompetitors->removeElement($sessionCompetitors);
    }

    /**
     * Get sessionCompetitors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSessionCompetitors()
    {
        return $this->sessionCompetitors;
    }

    /**
     * Set sitereportUpdate
     *
     * @param \DateTime $sitereportUpdate
     * @return Domain
     */
    public function setSitereportUpdate($sitereportUpdate)
    {
        $this->sitereportUpdate = $sitereportUpdate;

        return $this;
    }

    /**
     * Get sitereportUpdate
     *
     * @return \DateTime 
     */
    public function getSitereportUpdate()
    {
        return $this->sitereportUpdate;
    }

    /**
     * Add domainDictionary
     *
     * @param \Calc\ApiBundle\Entity\DomainDictionary $domainDictionary
     * @return Domain
     */
    public function addDomainDictionary(\Calc\ApiBundle\Entity\DomainDictionary $domainDictionary)
    {
        $this->domainDictionary[] = $domainDictionary;

        return $this;
    }

    /**
     * Remove domainDictionary
     *
     * @param \Calc\ApiBundle\Entity\DomainDictionary $domainDictionary
     */
    public function removeDomainDictionary(\Calc\ApiBundle\Entity\DomainDictionary $domainDictionary)
    {
        $this->domainDictionary->removeElement($domainDictionary);
    }

    /**
     * Get domainDictionary
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDomainDictionary()
    {
        return $this->domainDictionary;
    }

    /**
     * Set isLive
     *
     * @param boolean $isLive
     * @return Domain
     */
    public function setIsLive($isLive)
    {
        $this->isLive = $isLive;

        return $this;
    }

    /**
     * Get isLive
     *
     * @return boolean 
     */
    public function getIsLive()
    {
        return $this->isLive;
    }

    /**
     * Set screenShotUpdate
     *
     * @param \DateTime $screenShotUpdate
     * @return Domain
     */
    public function setScreenShotUpdate($screenShotUpdate)
    {
        $this->screenShotUpdate = $screenShotUpdate;

        return $this;
    }

    /**
     * Get screenShotUpdate
     *
     * @return \DateTime 
     */
    public function getScreenShotUpdate()
    {
        return $this->screenShotUpdate;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Domain
     */
    public function setPrice($price)
    {
        $this->price = $price;

        $this->priceUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set priceUpdate
     *
     * @param string $priceUpdate
     * @return Domain
     */
    public function setPriceUpdate($priceUpdate)
    {
        $this->priceUpdate = $priceUpdate;

        return $this;
    }

    /**
     * Get priceUpdate
     *
     * @return \DateTime
     */
    public function getPriceUpdate()
    {
        return $this->priceUpdate;
    }

    /**
     * Set isSemYadro
     *
     * @param boolean $isSemYadro
     *
     * @return Domain
     */
    public function setIsSemYadro($isSemYadro)
    {
        $this->isSemYadro = $isSemYadro;

        return $this;
    }

    /**
     * Get isSemYadro
     *
     * @return boolean
     */
    public function getIsSemYadro()
    {
        return $this->isSemYadro;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Domain
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set stage
     *
     * @param string $stage
     *
     * @return Domain
     */
    public function setStage($stage)
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * Get stage
     *
     * @return string
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Set textStage
     *
     * @param string $textStage
     *
     * @return Domain
     */
    public function setTextStage($textStage)
    {
        $this->textStage = $textStage;

        return $this;
    }

    /**
     * Get textStage
     *
     * @return string
     */
    public function getTextStage()
    {
        return $this->textStage;
    }

    /**
     * Set pagesCount
     *
     * @param integer $pagesCount
     *
     * @return Domain
     */
    public function setPagesCount($pagesCount)
    {
        $this->pagesCount = $pagesCount;

        return $this;
    }

    /**
     * Get pagesCount
     *
     * @return integer
     */
    public function getPagesCount()
    {
        return $this->pagesCount;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Domain
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set linkTextReport
     *
     * @param string $linkTextReport
     *
     * @return Domain
     */
    public function setLinkTextReport($linkTextReport)
    {
        $this->linkTextReport = $linkTextReport;

        return $this;
    }

    /**
     * Get linkTextReport
     *
     * @return string
     */
    public function getLinkTextReport()
    {
        return $this->linkTextReport;
    }

    /**
     * Set isTop
     *
     * @param boolean $isTop
     *
     * @return Domain
     */
    public function setIsTop($isTop)
    {
        $this->isTop = $isTop;

        return $this;
    }

    /**
     * Get isTop
     *
     * @return boolean
     */
    public function getIsTop()
    {
        return $this->isTop;
    }

    /**
     * Set isCreateExcel
     *
     * @param boolean $isCreateExcel
     *
     * @return Domain
     */
    public function setIsCreateExcel($isCreateExcel)
    {
        $this->isCreateExcel = $isCreateExcel;

        return $this;
    }

    /**
     * Get isCreateExcel
     *
     * @return boolean
     */
    public function getIsCreateExcel()
    {
        return $this->isCreateExcel;
    }

    /**
     * Set isWordsPrice
     *
     * @param boolean $isWordsPrice
     *
     * @return Domain
     */
    public function setIsWordsPrice($isWordsPrice)
    {
        $this->isWordsPrice = $isWordsPrice;

        return $this;
    }

    /**
     * Get isWordsPrice
     *
     * @return boolean
     */
    public function getIsWordsPrice()
    {
        return $this->isWordsPrice;
    }

    /**
     * Set domainOverviewUpdate
     *
     * @param \DateTime $domainOverviewUpdate
     *
     * @return Domain
     */
    public function setDomainOverviewUpdate($domainOverviewUpdate)
    {
        $this->domainOverviewUpdate = $domainOverviewUpdate;

        return $this;
    }

    /**
     * Get domainOverviewUpdate
     *
     * @return \DateTime
     */
    public function getDomainOverviewUpdate()
    {
        return $this->domainOverviewUpdate;
    }

    /**
     * Set domainOverview
     *
     * @param \Calc\ApiBundle\Entity\DomainOverview $domainOverview
     *
     * @return Domain
     */
    public function setDomainOverview(\Calc\ApiBundle\Entity\DomainOverview $domainOverview = null)
    {
        $this->domainOverview = $domainOverview;

        $this->domainOverviewUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get domainOverview
     *
     * @return \Calc\ApiBundle\Entity\DomainOverview
     */
    public function getDomainOverview()
    {
        return $this->domainOverview;
    }

    /**
     * Set isGMetrics
     *
     * @param boolean $isGMetrics
     *
     * @return Domain
     */
    public function setIsGMetrics($isGMetrics)
    {
        $this->isGMetrics = $isGMetrics;

        $this->isMetricsUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isGMetrics
     *
     * @return boolean
     */
    public function getIsGMetrics()
    {
        return $this->isGMetrics;
    }

    /**
     * Set isYMetrics
     *
     * @param boolean $isYMetrics
     *
     * @return Domain
     */
    public function setIsYMetrics($isYMetrics)
    {
        $this->isYMetrics = $isYMetrics;

        $this->isMetricsUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isYMetrics
     *
     * @return boolean
     */
    public function getIsYMetrics()
    {
        return $this->isYMetrics;
    }

    /**
     * Set isMetricsUpdate
     *
     * @param \DateTime $isMetricsUpdate
     *
     * @return Domain
     */
    public function setIsMetricsUpdate($isMetricsUpdate)
    {
        $this->isMetricsUpdate = $isMetricsUpdate;

        return $this;
    }

    /**
     * Get isMetricsUpdate
     *
     * @return \DateTime
     */
    public function getIsMetricsUpdate()
    {
        return $this->isMetricsUpdate;
    }

    /**
     * Set isMobileVersion
     *
     * @param boolean $isMobileVersion
     *
     * @return Domain
     */
    public function setIsMobileVersion($isMobileVersion)
    {
        $this->isMobileVersion = $isMobileVersion;

        $this->isMobileVersionUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isMobileVersion
     *
     * @return boolean
     */
    public function getIsMobileVersion()
    {
        return $this->isMobileVersion;
    }

    /**
     * Set isMobileVersionUpdate
     *
     * @param \DateTime $isMobileVersionUpdate
     *
     * @return Domain
     */
    public function setIsMobileVersionUpdate($isMobileVersionUpdate)
    {
        $this->isMobileVersionUpdate = $isMobileVersionUpdate;

        return $this;
    }

    /**
     * Get isMobileVersionUpdate
     *
     * @return \DateTime
     */
    public function getIsMobileVersionUpdate()
    {
        return $this->isMobileVersionUpdate;
    }

    /**
     * Set metaUpdate
     *
     * @param \DateTime $metaUpdate
     *
     * @return Domain
     */
    public function setMetaUpdate($metaUpdate)
    {
        $this->metaUpdate = $metaUpdate;

        return $this;
    }

    /**
     * Get metaUpdate
     *
     * @return \DateTime
     */
    public function getMetaUpdate()
    {
        return $this->metaUpdate;
    }

    /**
     * Set isRobots
     *
     * @param boolean $isRobots
     *
     * @return Domain
     */
    public function setIsRobots($isRobots)
    {
        $this->isRobots = $isRobots;

        $this->isRobotsUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isRobots
     *
     * @return boolean
     */
    public function getIsRobots()
    {
        return $this->isRobots;
    }

    /**
     * Set isRobotsUpdate
     *
     * @param \DateTime $isRobotsUpdate
     *
     * @return Domain
     */
    public function setIsRobotsUpdate($isRobotsUpdate)
    {
        $this->isRobotsUpdate = $isRobotsUpdate;

        return $this;
    }

    /**
     * Get isRobotsUpdate
     *
     * @return \DateTime
     */
    public function getIsRobotsUpdate()
    {
        return $this->isRobotsUpdate;
    }

    /**
     * Set isSiteMap
     *
     * @param boolean $isSiteMap
     *
     * @return Domain
     */
    public function setIsSiteMap($isSiteMap)
    {
        $this->isSiteMap = $isSiteMap;

        $this->isSiteMapUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isSiteMap
     *
     * @return boolean
     */
    public function getIsSiteMap()
    {
        return $this->isSiteMap;
    }

    /**
     * Set isSiteMapUpdate
     *
     * @param \DateTime $isSiteMapUpdate
     *
     * @return Domain
     */
    public function setIsSiteMapUpdate($isSiteMapUpdate)
    {
        $this->isSiteMapUpdate = $isSiteMapUpdate;

        return $this;
    }

    /**
     * Get isSiteMapUpdate
     *
     * @return \DateTime
     */
    public function getIsSiteMapUpdate()
    {
        return $this->isSiteMapUpdate;
    }

    /**
     * Set isMicroData
     *
     * @param boolean $isMicroData
     *
     * @return Domain
     */
    public function setIsMicroData($isMicroData)
    {
        $this->isMicroData = $isMicroData;

        $this->isMicroDataUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isMicroData
     *
     * @return boolean
     */
    public function getIsMicroData()
    {
        return $this->isMicroData;
    }

    /**
     * Set isMicroDataUpdate
     *
     * @param \DateTime $isMicroDataUpdate
     *
     * @return Domain
     */
    public function setIsMicroDataUpdate($isMicroDataUpdate)
    {
        $this->isMicroDataUpdate = $isMicroDataUpdate;

        return $this;
    }

    /**
     * Get isMicroDataUpdate
     *
     * @return \DateTime
     */
    public function getIsMicroDataUpdate()
    {
        return $this->isMicroDataUpdate;
    }

    /**
     * Set notProjectId
     *
     * @param boolean $notProjectId
     *
     * @return Domain
     */
    public function setNotProjectId($notProjectId)
    {
        $this->notProjectId = $notProjectId;

        $this->sitereportUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get notProjectId
     *
     * @return boolean
     */
    public function getNotProjectId()
    {
        return $this->notProjectId;
    }

    /**
     * Set isContextAdv
     *
     * @param boolean $isContextAdv
     *
     * @return Domain
     */
    public function setIsContextAdv($isContextAdv)
    {
        $this->isContextAdv = $isContextAdv;

        $this->isContextAdvUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isContextAdv
     *
     * @return boolean
     */
    public function getIsContextAdv()
    {
        return $this->isContextAdv;
    }

    /**
     * Set isContextAdvUpdate
     *
     * @param \DateTime $isContextAdvUpdate
     *
     * @return Domain
     */
    public function setIsContextAdvUpdate($isContextAdvUpdate)
    {
        $this->isContextAdvUpdate = $isContextAdvUpdate;

        return $this;
    }

    /**
     * Get isContextAdvUpdate
     *
     * @return \DateTime
     */
    public function getIsContextAdvUpdate()
    {
        return $this->isContextAdvUpdate;
    }

    /**
     * Set isRedirectForMainPage
     *
     * @param boolean $isRedirectForMainPage
     *
     * @return Domain
     */
    public function setIsRedirectForMainPage($isRedirectForMainPage)
    {
        $this->isRedirectForMainPage = $isRedirectForMainPage;

        $this->isRedirectForMainPageUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isRedirectForMainPage
     *
     * @return boolean
     */
    public function getIsRedirectForMainPage()
    {
        return $this->isRedirectForMainPage;
    }

    /**
     * Set isRedirectForMainPageUpdate
     *
     * @param \DateTime $isRedirectForMainPageUpdate
     *
     * @return Domain
     */
    public function setIsRedirectForMainPageUpdate($isRedirectForMainPageUpdate)
    {
        $this->isRedirectForMainPageUpdate = $isRedirectForMainPageUpdate;

        return $this;
    }

    /**
     * Get isRedirectForMainPageUpdate
     *
     * @return \DateTime
     */
    public function getIsRedirectForMainPageUpdate()
    {
        return $this->isRedirectForMainPageUpdate;
    }

    /**
     * Set isNotFoundPage
     *
     * @param boolean $isNotFoundPage
     *
     * @return Domain
     */
    public function setIsNotFoundPage($isNotFoundPage)
    {
        $this->isNotFoundPage = $isNotFoundPage;

        $this->isNotFoundPageUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isNotFoundPage
     *
     * @return boolean
     */
    public function getIsNotFoundPage()
    {
        return $this->isNotFoundPage;
    }

    /**
     * Set isNotFoundPageUpdate
     *
     * @param \DateTime $isNotFoundPageUpdate
     *
     * @return Domain
     */
    public function setIsNotFoundPageUpdate($isNotFoundPageUpdate)
    {
        $this->isNotFoundPageUpdate = $isNotFoundPageUpdate;

        return $this;
    }

    /**
     * Get isNotFoundPageUpdate
     *
     * @return \DateTime
     */
    public function getIsNotFoundPageUpdate()
    {
        return $this->isNotFoundPageUpdate;
    }

    /**
     * Set yaNews
     *
     * @param integer $yaNews
     *
     * @return Domain
     */
    public function setYaNews($yaNews)
    {
        $this->yaNews = $yaNews;

        $this->yaNewsUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get yaNews
     *
     * @return integer
     */
    public function getYaNews()
    {
        return $this->yaNews;
    }

    /**
     * Set yaNewsUpdate
     *
     * @param \DateTime $yaNewsUpdate
     *
     * @return Domain
     */
    public function setYaNewsUpdate($yaNewsUpdate)
    {
        $this->yaNewsUpdate = $yaNewsUpdate;

        return $this;
    }

    /**
     * Get yaNewsUpdate
     *
     * @return \DateTime
     */
    public function getYaNewsUpdate()
    {
        return $this->yaNewsUpdate;
    }

    /**
     * Set isCorrectAddress
     *
     * @param boolean $isCorrectAddress
     *
     * @return Domain
     */
    public function setIsCorrectAddress($isCorrectAddress)
    {
        $this->isCorrectAddress = $isCorrectAddress;

        $this->isCorrectAddressUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isCorrectAddress
     *
     * @return boolean
     */
    public function getIsCorrectAddress()
    {
        return $this->isCorrectAddress;
    }

    /**
     * Set isCorrectAddressUpdate
     *
     * @param \DateTime $isCorrectAddressUpdate
     *
     * @return Domain
     */
    public function setIsCorrectAddressUpdate($isCorrectAddressUpdate)
    {
        $this->isCorrectAddressUpdate = $isCorrectAddressUpdate;

        return $this;
    }

    /**
     * Get isCorrectAddressUpdate
     *
     * @return \DateTime
     */
    public function getIsCorrectAddressUpdate()
    {
        return $this->isCorrectAddressUpdate;
    }

    /**
     * Set yaUpdatable
     *
     * @param \DateTime $yaUpdatable
     *
     * @return Domain
     */
    public function setYaUpdatable($yaUpdatable)
    {
        $this->yaUpdatable = $yaUpdatable;

        return $this;
    }

    /**
     * Get yaUpdatable
     *
     * @return \DateTime
     */
    public function getYaUpdatable()
    {
        return $this->yaUpdatable;
    }

    /**
     * Set yaUpdatableUpdate
     *
     * @param \DateTime $yaUpdatableUpdate
     *
     * @return Domain
     */
    public function setYaUpdatableUpdate($yaUpdatableUpdate)
    {
        $this->yaUpdatableUpdate = $yaUpdatableUpdate;

        return $this;
    }

    /**
     * Get yaUpdatableUpdate
     *
     * @return \DateTime
     */
    public function getYaUpdatableUpdate()
    {
        return $this->yaUpdatableUpdate;
    }

    /**
     * Set isAGS
     *
     * @param integer $isAGS
     *
     * @return Domain
     */
    public function setIsAGS($isAGS)
    {
        $this->isAGS = $isAGS;

        $this->isAGSUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isAGS
     *
     * @return integer
     */
    public function getIsAGS()
    {
        return $this->isAGS;
    }

    /**
     * Set isAGSUpdate
     *
     * @param \DateTime $isAGSUpdate
     *
     * @return Domain
     */
    public function setIsAGSUpdate($isAGSUpdate)
    {
        $this->isAGSUpdate = $isAGSUpdate;

        return $this;
    }

    /**
     * Get isAGSUpdate
     *
     * @return \DateTime
     */
    public function getIsAGSUpdate()
    {
        return $this->isAGSUpdate;
    }

    /**
     * Set pdfReportLink
     *
     * @param string $pdfReportLink
     *
     * @return Domain
     */
    public function setPdfReportLink($pdfReportLink)
    {
        $this->pdfReportLink = $pdfReportLink;

        return $this;
    }

    /**
     * Get pdfReportLink
     *
     * @return string
     */
    public function getPdfReportLink()
    {
        return $this->pdfReportLink;
    }

    /**
     * Set isSemYadroExcel
     *
     * @param boolean $isSemYadroExcel
     *
     * @return Domain
     */
    public function setIsSemYadroExcel($isSemYadroExcel)
    {
        $this->isSemYadroExcel = $isSemYadroExcel;

        $this->isSemYadroExcelUpdate = new \DateTime();

        return $this;
    }

    /**
     * Get isSemYadroExcel
     *
     * @return boolean
     */
    public function getIsSemYadroExcel()
    {
        return $this->isSemYadroExcel;
    }

    /**
     * Set isSemYadroExcelUpdate
     *
     * @param \DateTime $isSemYadroExcelUpdate
     *
     * @return Domain
     */
    public function setIsSemYadroExcelUpdate($isSemYadroExcelUpdate)
    {
        $this->isSemYadroExcelUpdate = $isSemYadroExcelUpdate;

        return $this;
    }

    /**
     * Get isSemYadroExcelUpdate
     *
     * @return \DateTime
     */
    public function getIsSemYadroExcelUpdate()
    {
        return $this->isSemYadroExcelUpdate;
    }

    /**
     * Set isSemanticSitereport
     *
     * @param boolean $isSemanticSitereport
     *
     * @return Domain
     */
    public function setIsSemanticSitereport($isSemanticSitereport)
    {
        $this->isSemanticSitereport = $isSemanticSitereport;

        return $this;
    }

    /**
     * Get isSemanticSitereport
     *
     * @return boolean
     */
    public function getIsSemanticSitereport()
    {
        return $this->isSemanticSitereport;
    }

    /**
     * Set isLongTail
     *
     * @param boolean $isLongTail
     *
     * @return Domain
     */
    public function setIsLongTail($isLongTail)
    {
        $this->isLongTail = $isLongTail;

        return $this;
    }

    /**
     * Get isLongTail
     *
     * @return boolean
     */
    public function getIsLongTail()
    {
        return $this->isLongTail;
    }

    /**
     * Set createLead
     *
     * @param \DateTime $createLead
     *
     * @return Domain
     */
    public function setCreateLead($createLead)
    {
        $this->createLead = $createLead;

        return $this;
    }

    /**
     * Get createLead
     *
     * @return \DateTime
     */
    public function getCreateLead()
    {
        return $this->createLead;
    }
}
