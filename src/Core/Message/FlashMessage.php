<?php
namespace Core\Message;

use Core\Session;

class FlashMessage
{
    const INFO    = 'info';
    const SUCCESS = 'success';
    const WARNING = 'warning';
    const ERROR   = 'error';

    const defaultType = self::INFO;

    public function info($msg) {
        Session::push('flash_message', new Message(self::INFO, $msg));
    }

    public function success($msg) {
        Session::push('flash_message', new Message(self::INFO, $msg));
    }

    public function error($msg) {
        Session::push('flash_message', new Message(self::ERROR, $msg));
    }

    public function getMessages() {

        $messages = Session::pull('flash_message');
        if(!is_array($messages)) {
            $messages = [];
        }
        return $messages;
    }
}