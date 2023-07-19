<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $course_time;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $cource_price;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $cource_total_read;

    #[ORM\Column(type: 'boolean')]
    private $featured_cource;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0', nullable: true)]
    private $discount_price;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $enable_discount;

    #[ORM\Column(type: 'text', nullable: true)]
    private $long_description;

    #[ORM\ManyToOne(targetEntity: CourseLanguage::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $course_language;

    #[ORM\ManyToOne(targetEntity: CourseLevel::class, inversedBy: 'courses')]
    #[ORM\JoinColumn(nullable: false)]
    private $course_level;

    #[ORM\ManyToOne(targetEntity: Category::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $course_category;

    #[ORM\Column(type: 'string', length: 255,nullable: true)]
    private $course_image;

    #[ORM\Column(type: 'string', length: 255,nullable: true)]
    private $course_url_video;

    #[ORM\Column(type: 'string', length: 255,nullable: true)]
    private $course_video;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: CourseChapter::class)]
    private $courseChapters;

    #[ORM\ManyToOne(targetEntity: Instructor::class, inversedBy: 'course')]
    private $instructor;

    #[ORM\ManyToMany(targetEntity: Student::class, mappedBy: 'courses')]
    private Collection $students;

    public function __construct()
    {
        $this->courseChapters = new ArrayCollection();
        $this->students = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCourseTime(): ?string
    {
        return $this->course_time;
    }

    public function setCourseTime(string $course_time): self
    {
        $this->course_time = $course_time;

        return $this;
    }

    public function getCourcePrice(): ?string
    {
        return $this->cource_price;
    }

    public function setCourcePrice(string $cource_price): self
    {
        $this->cource_price = $cource_price;

        return $this;
    }

    public function getCourceTotalRead(): ?int
    {
        return $this->cource_total_read;
    }

    public function setCourceTotalRead(?int $cource_total_read): self
    {
        $this->cource_total_read = $cource_total_read;

        return $this;
    }

    public function getFeaturedCource(): ?bool
    {
        return $this->featured_cource;
    }

    public function setFeaturedCource(bool $featured_cource): self
    {
        $this->featured_cource = $featured_cource;

        return $this;
    }

    public function getDiscountPrice(): ?string
    {
        return $this->discount_price;
    }

    public function setDiscountPrice(?string $discount_price): self
    {
        $this->discount_price = $discount_price;

        return $this;
    }

    public function getEnableDiscount(): ?bool
    {
        return $this->enable_discount;
    }

    public function setEnableDiscount(?bool $enable_discount): self
    {
        $this->enable_discount = $enable_discount;

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->long_description;
    }

    public function setLongDescription(?string $long_description): self
    {
        $this->long_description = $long_description;

        return $this;
    }

    public function getCourseLanguage(): ?CourseLanguage
    {
        return $this->course_language;
    }

    public function setCourseLanguage(?CourseLanguage $course_language): self
    {
        $this->course_language = $course_language;

        return $this;
    }

    public function getCourseLevel(): ?CourseLevel
    {
        return $this->course_level;
    }

    public function setCourseLevel(?CourseLevel $course_level): self
    {
        $this->course_level = $course_level;

        return $this;
    }

    public function getCourseCategory(): ?Category
    {
        return $this->course_category;
    }

    public function setCourseCategory(?Category $course_category): self
    {
        $this->course_category = $course_category;

        return $this;
    }

    public function getCourseImage(): ?string
    {
        return $this->course_image;
    }

    public function setCourseImage(string $course_image): self
    {
        $this->course_image = $course_image;

        return $this;
    }

    public function getCourseUrlVideo(): ?string
    {
        return $this->course_url_video;
    }

    public function setCourseUrlVideo(string $course_url_video): self
    {
        $this->course_url_video = $course_url_video;

        return $this;
    }

    public function getCourseVideo(): ?string
    {
        return $this->course_video;
    }

    public function setCourseVideo(string $course_video): self
    {
        $this->course_video = $course_video;

        return $this;
    }

    /**
     * @return Collection|CourseChapter[]
     */
    public function getCourseChapters(): Collection
    {
        return $this->courseChapters;
    }

    public function addCourseChapter(CourseChapter $courseChapter): self
    {
        if (!$this->courseChapters->contains($courseChapter)) {
            $this->courseChapters[] = $courseChapter;
            $courseChapter->setCourse($this);
        }

        return $this;
    }

    public function removeCourseChapter(CourseChapter $courseChapter): self
    {
        if ($this->courseChapters->removeElement($courseChapter)) {
            // set the owning side to null (unless already changed)
            if ($courseChapter->getCourse() === $this) {
                $courseChapter->setCourse(null);
            }
        }

        return $this;
    }

    public function getInstructor(): ?Instructor
    {
        return $this->instructor;
    }

    public function setInstructor(?Instructor $instructor): self
    {
        $this->instructor = $instructor;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): static
    {
        if (!$this->students->contains($student)) {
            $this->students->add($student);
            $student->addCourse($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): static
    {
        if ($this->students->removeElement($student)) {
            $student->removeCourse($this);
        }

        return $this;
    }
}
