<?php

namespace Aniwall\Model;

class ListInfoWallpaper
{
    /**
     * @var InfoWallpaper[]
     */
    public $images = [];

    /**
     * @var bool
     */
    public $end;

    /**
     * @var int
     */
    public $totalPages;

    /**
     * @return InfoWallpaper[]
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param InfoWallpaper[] $images
     */
    public function setImages(array $images)
    {
        $this->images = $images;
    }

    /**
     * @param InfoWallpaper $image
     */
    public function addImages ($image)
    {
        $this->images[] = $image;
    }

    /**
     * @return bool
     */
    public function isEnd(): bool
    {
        return $this->end;
    }

    /**
     * @param bool $end
     */
    public function setEnd(bool $end)
    {
        $this->end = $end;
    }

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    /**
     * @param int $totalPages
     */
    public function setTotalPages(int $totalPages)
    {
        $this->totalPages = $totalPages;
    }
}