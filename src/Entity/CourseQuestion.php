<?php

namespace App\Entity;

use App\Repository\CourseQuestionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseQuestionRepository::class)]
class CourseQuestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $question_text;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $question_response;

    #[ORM\Column(type: 'array', nullable: true)]
    private $tags = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestionText(): ?string
    {
        return $this->question_text;
    }

    public function setQuestionText(string $question_text): self
    {
        $this->question_text = $question_text;

        return $this;
    }

    public function getQuestionResponse(): ?string
    {
        return $this->question_response;
    }

    public function setQuestionResponse(?string $question_response): self
    {
        $this->question_response = $question_response;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }
}
