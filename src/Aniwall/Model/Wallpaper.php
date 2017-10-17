<?php

namespace Aniwall\Model;

class Wallpaper
{

    /**
     * @var string
     */
    public $fullImage;

    /**
     * @var Tag[]
     */
    public $tags;

    /**
     * @var string
     */
    public $category;

    /**
     * @var string
     */
    public $size;

    /**
     * @var int
     */
    public $view;

    /**
     * @var int
     */
    public $width;

    /**
     * @var int
     */
    public $height;

    /**
     * @return string
     */
    public function getFullImage(): string
    {
        return $this->fullImage;
    }

    /**
     * @param string $fullImage
     */
    public function setFullImage(string $fullImage)
    {
        $this->fullImage = $fullImage;
    }

    /**
     * @return Tag[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param Tag[] $tags
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size)
    {
        $this->size = $size;
    }

    /**
     * @return int
     */
    public function getView(): int
    {
        return $this->view;
    }

    /**
     * @param int $view
     */
    public function setView(int $view)
    {
        $this->view = $view;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
    }
}