<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Represents a document "metadata"
 *  @ORM\Entity()
 *
 * @author Hugues Maignol <hugues.maignol@kitpages.fr>
 */
class Document
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(name="title", type="string")
     *
     * @var string
     */
    protected $title;

    /**
     * @ORM\Column(name="created_date", type="datetime")
     *
     * @var string
     * @var \DateTime
     */
    protected $created;

    /**
     * @ORM\Column(name="updated_date", type="datetime")
     *
     * @var \DateTime
     */
    protected $updated;

    /**
     * @ORM\Column(name="summary", type="string")
     *
     * @var string
     */
    protected $summary;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Person")
     * @
     * @var Person
     */
    protected $author;

    /**
     * @ORM\Column(name="reference", type="string", unique = true )
     *
     * @var string
     */
    protected $reference;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
    }

    /**
     * Getter de id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Setter for id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Getter de title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Setter for title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Getter de created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Setter for created
     *
     * @param \DateTime $created
     *
     * @return self
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Getter de updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Setter for updated
     *
     * @param \DateTime $updated
     *
     * @return self
     */
    public function setUpdated(\DateTime $updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Getter de summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Setter for summary
     *
     * @param string $summary
     *
     * @return self
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Getter de author
     *
     * @return Person
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Setter for author
     *
     * @param Person $author
     *
     * @return self
     */
    public function setAuthor(Person $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Getter de reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Setter for reference
     *
     * @param string $reference
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }


}
