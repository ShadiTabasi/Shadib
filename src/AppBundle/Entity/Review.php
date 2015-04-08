<?php
/**
 * Created by PhpStorm.
 * User: shadi
 * Date: 08/04/15
 * Time: 16:51
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Class Review
 *
 * @ORM\Entity()
 */
class Review {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Person")
     * @var Person
     * @Assert\NotBlank()
     */
    protected $author;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Document", inversedBy="reviews")
     * @var Document
     */
    protected $document;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var string
     */
    protected $content;

    /**
     * @return int
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
     * @return Person
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param Person $author
     */
    public function setAuthor(Person $author)
    {
        $this->author = $author;
    }

    /**
     * @return Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param Document $document
     */
    public function setDocument(Document $document)
    {
        $this->document = $document;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

}