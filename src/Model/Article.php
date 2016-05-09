<?php

namespace Model;

require_once "User.php";
require_once "Map.php";
class Article
{
    const IS_SECRET = 1;
    const IS_NOT_SECRET = 0;
    /**
     * @var User
     */
    private $user;
    /**
     * @var Map
     */
    private $map;

    /**
     * @var int
     */
    private $date;
    /**
     * @var string
     */
    private $subject;
    /**
     * @var string
     */
    private $content;
    /**
     * @var int
     */
    private $secret;

    private $weather;

    /**
     * Article constructor.
     * @param string $subject
     * @param string $content
     * @param int $secret
     */
    public function __construct($subject, $content, $secret)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->secret = $secret;
    }


    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Map
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param Map $map
     */
    public function setMap($map)
    {
        $this->map = $map;
    }

    /**
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
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

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param mixed $secret
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }

    /**
     * @return mixed
     */
    public function getWeather()
    {
        return $this->weather;
    }

    /**
     * @param mixed $weather
     */
    public function setWeather($weather)
    {
        $this->weather = $weather;
    }


}