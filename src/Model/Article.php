<?php

namespace Model;

use Model\Receipt;
use Model\User;
use Model\Map;

class Article
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var User
     */
    private $user;
    /**
     * @var Map
     */
    private $map;

    /**
     * @var Receipt[]
     */
    private $receipts = [];

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
     * @param User $user
     * @param int $date
     * @param string $subject
     * @param string $content
     * @param int $secret
     */
    public function __construct(User $user, $date, $subject, $content, $secret)
    {
        $this->user = $user;
        $this->date = $date;
        $this->subject = $subject;
        $this->content = $content;
        $this->secret = $secret;
    }

    /**
     * @return \Model\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \Model\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \Model\Map
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param \Model\Map $map
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

    /**
     * @return \Model\Receipt
     */
    public function getReceipts()
    {
        return $this->receipts;
    }

    /**
     * @param \Model\Receipt $receipts
     */
    public function setReceipts($receipts)
    {
        $this->receipts = $receipts;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function addReceipt(Receipt $receipt)
    {
        $this->receipts[] = $receipt;
    }

    public function deleteAllReceipt()
    {
        $this->receipts = [];
    }
}