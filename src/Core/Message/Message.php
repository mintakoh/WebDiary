<?php
namespace Core\Message;


class Message
{

    protected $type;

    protected $text;

    /**
     * Message constructor.
     * @param $type
     * @param $text
     */
    public function __construct($type, $text)
    {
        $this->type = $type;
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    
}