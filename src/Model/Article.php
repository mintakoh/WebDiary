<?php

namespace Model;

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

    /**
     * @var string
     */
    private $weather;

    /**
     * Article constructor.
     * @param User $user
     * @param int $date
     * @param string $subject
     * @param string $content
     * @param int $secret
     * @param string $weather
     */
    public function __construct(User $user, $date, $subject, $content, $secret, $weather = 'sun')
    {
        $this->user = $user;
        $this->date = $date;
        $this->subject = $subject;
        $this->content = $content;
        $this->secret = $secret;
        $this->weather = $weather;
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
        if(!$this->weather) {
            return 'sun';
        }
        return $this->weather;
    }

    public function getWeatherText()
    {
        $texts = [
            'sun' => '맑음',
            'umbrella' => '비',
            'cloudiness' => '흐림',
            'lightning' => '번개',
            'snow' => '눈'
        ];
        return $texts[$this->getWeather()];
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

    public function getSummary($cut = 100)
    {
        if(strlen($this->getSecret()) > 0) {
            return "<i class='xi-lock'></i> 비밀글은 미리보기를 제공하지 않습니다.";
        }

        $summary = mb_substr($this->content, 0, $cut, "UTF-8");
        if(mb_strlen($this->content, "UTF-8") > $cut) {
            $summary .= "...";
        }
        return $summary;
    }

    public function getTotalPrice($currency)
    {
        $totalPrices[$currency] = 0;
        foreach($this->receipts as $receipt){
            if($currency == $receipt->getCurrency())
                $totalPrices[$currency] += $receipt->getPrice();
        }
        return $totalPrices[$currency];
    }
}