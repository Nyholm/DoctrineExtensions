<?php

namespace Uploadable\Fixture\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @Gedmo\Uploadable(allowOverwrite=true, fileInfoProperty="fileInfo", pathMethod="getPath", callback="callbackMethod")
 */
class File
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(name="path", type="string", nullable=true)
     * @Gedmo\UploadableFilePath
     */
    private $filePath;

    private $fileInfo;

    /**
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="files")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     */
    private $article;

    public $callbackWasCalled = false;


    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function setArticle(Article $article)
    {
        $this->article = $article;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function setFileInfo($fileInfo)
    {
        $this->fileInfo = $fileInfo;
    }

    public function getFileInfo()
    {
        return $this->fileInfo;
    }

    public function callbackMethod()
    {
        $this->callbackWasCalled = true;
    }

    public function getPath()
    {
        return __DIR__.'/../../../../temp/uploadable';
    }
}
