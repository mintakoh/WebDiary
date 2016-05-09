<?php

namespace Model;


class Map
{
    /**
     * @var int
     */
    private $longitute;
    /**
     * @var int
     */
    private $latitute;

    /**
     * Map constructor.
     * @param int $longitute
     * @param int $latitute
     */
    public function __construct($longitute, $latitute)
    {
        $this->longitute = $longitute;
        $this->latitute = $latitute;
    }

    /**
     * @return int
     */
    public function getLongitute()
    {
        return $this->longitute;
    }

    /**
     * @param int $longitute
     */
    public function setLongitute($longitute)
    {
        $this->longitute = $longitute;
    }

    /**
     * @return int
     */
    public function getLatitute()
    {
        return $this->latitute;
    }

    /**
     * @param int $latitute
     */
    public function setLatitute($latitute)
    {
        $this->latitute = $latitute;
    }
}