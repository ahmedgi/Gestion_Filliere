<?php

namespace AppBundle\Entity;
use AppBundle\Entity\Categorie;
use AppBundle\Entity\Service;
use AppBundle\Entity\Intervention;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Archive;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="Designation", type="string", length=255)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="Marque", type="string", length=255)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="Modele", type="string", length=255)
     */
    private $modele;

    /**
     * @var string
     *
     * @ORM\Column(name="NumSerie", type="string", length=255)
     */
    private $numSerie;

    /**
     * @var string
     *
     * @ORM\Column(name="Societe", type="string", length=255)
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="Num_Inventaire", type="string", length=255)
     */
    private $Num_Inventaire;

    /**
     * @var string
     *
     * @ORM\Column(name="Source_de_Financement", type="string", length=255)
     */
    private $Source_de_Financement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Acquisition", type="datetimetz")
     */
    private $Date_Acquisition;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateService", type="datetimetz")
     */
    private $DateService;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=255)
     */
    private $Etat;
    
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */
    private $BonLivraison;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="Articles")
     * @ORM\JoinColumn(name="Categorie_id", referencedColumnName="id")
     */
    private $Categorie;

    /**
     * @ORM\ManyToOne(targetEntity="Hopitale", inversedBy="Articles")
     * @ORM\JoinColumn(name="Hopitale_id", referencedColumnName="id")
     */
    private $Hopitale;

    /**
     * @ORM\ManyToOne(targetEntity="Service", inversedBy="Articles")
     * @ORM\JoinColumn(name="Service_id", referencedColumnName="id")
     */
    private $Service;

    /**
     * @ORM\OneToMany(targetEntity="Archive", mappedBy="Article")
     */
    private $Archives;

    public function __construct()
    {
        $this->Archives = new ArrayCollection();
    }

    /**
     * @ORM\OneToOne(targetEntity="Intervention", mappedBy="Article")
     * @ORM\JoinColumn(name="Intervention_id", referencedColumnName="id")
     */
    private $intervention;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Article
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Article
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set modele
     *
     * @param string $modele
     *
     * @return Article
     */
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get modele
     *
     * @return string
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set numSerie
     *
     * @param string $numSerie
     *
     * @return Article
     */
    public function setNumSerie($numSerie)
    {
        $this->numSerie = $numSerie;

        return $this;
    }

    /**
     * Get numSerie
     *
     * @return string
     */
    public function getNumSerie()
    {
        return $this->numSerie;
    }

    /**
     * Set societe
     *
     * @param string $societe
     *
     * @return Article
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return string
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set bonLivraison
     *
     * @param string $bonLivraison
     *
     * @return Article
     */
    public function setBonLivraison($bonLivraison)
    {
        $this->BonLivraison = $bonLivraison;

        return $this;
    }

    /**
     * Get bonLivraison
     *
     * @return string
     */
    public function getBonLivraison()
    {
        return $this->BonLivraison;
    }

    /**
     * Set categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Article
     */
    public function setCategorie($categorie = null)
    {
        $this->Categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return Categorie
     */
    public function getCategorie()
    {
        return $this->Categorie;
    }

    /**
     * Set numInventaire
     *
     * @param string $numInventaire
     *
     * @return Article
     */
    public function setNumInventaire($numInventaire)
    {
        $this->Num_Inventaire = $numInventaire;

        return $this;
    }

    /**
     * Get numInventaire
     *
     * @return string
     */
    public function getNumInventaire()
    {
        return $this->Num_Inventaire;
    }

    /**
     * Set dateAcquisition
     *
     * @param \DateTime $dateAcquisition
     *
     * @return Article
     */
    public function setDateAcquisition($dateAcquisition)
    {
        $this->Date_Acquisition = $dateAcquisition;

        return $this;
    }

    /**
     * Get dateAcquisition
     *
     * @return \DateTime
     */
    public function getDateAcquisition()
    {
        return $this->Date_Acquisition;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Article
     */
    public function setEtat($etat)
    {
        $this->Etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->Etat;
    }


    /**
     * Set dateService
     *
     * @param \DateTime $dateService
     *
     * @return Article
     */
    public function setDateService($dateService)
    {
        $this->DateService = $dateService;

        return $this;
    }

    /**
     * Get dateService
     *
     * @return \DateTime
     */
    public function getDateService()
    {
        return $this->DateService;
    }

    /**
     * Add archive
     *
     * @param \AppBundle\Entity\Archive $archive
     *
     * @return Article
     */
    public function addArchive(\AppBundle\Entity\Archive $archive)
    {
        $this->Archives[] = $archive;

        return $this;
    }

    /**
     * Remove archive
     *
     * @param \AppBundle\Entity\Archive $archive
     */
    public function removeArchive(\AppBundle\Entity\Archive $archive)
    {
        $this->Archives->removeElement($archive);
    }

    /**
     * Get archives
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArchives()
    {
        return $this->Archives;
    }

    /**
     * Set service
     *
     * @param \AppBundle\Entity\Service $service
     *
     * @return Article
     */
    public function setService(\AppBundle\Entity\Service $service = null)
    {
        $this->Service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \AppBundle\Entity\Service
     */
    public function getService()
    {
        return $this->Service;
    }

    /**
     * Set sourceDeFinancement
     *
     * @param string $sourceDeFinancement
     *
     * @return Article
     */
    public function setSourceDeFinancement($sourceDeFinancement)
    {
        $this->Source_de_Financement = $sourceDeFinancement;

        return $this;
    }

    /**
     * Get sourceDeFinancement
     *
     * @return string
     */
    public function getSourceDeFinancement()
    {
        return $this->Source_de_Financement;
    }

    /**
     * Set hopitale
     *
     * @param \AppBundle\Entity\Hopitale $hopitale
     *
     * @return Article
     */
    public function setHopitale(\AppBundle\Entity\Hopitale $hopitale = null)
    {
        $this->Hopitale = $hopitale;

        return $this;
    }

    /**
     * Get hopitale
     *
     * @return \AppBundle\Entity\Hopitale
     */
    public function getHopitale()
    {
        return $this->Hopitale;
    }

    /**
     * Set intervention
     *
     * @param \AppBundle\Entity\Intervention $intervention
     *
     * @return Article
     */
    public function setIntervention(\AppBundle\Entity\Intervention $intervention = null)
    {
        $this->intervention = $intervention;

        return $this;
    }

    /**
     * Get intervention
     *
     * @return \AppBundle\Entity\Intervention
     */
    public function getIntervention()
    {
        return $this->intervention;
    }
}
