<?php

namespace Core;

class FlashMessage
{
    const INFO    = 'i';
    const SUCCESS = 's';
    const WARNING = 'w';
    const ERROR   = 'e';

    const defaultType = self::INFO;

    public function info($msg) {
        Session::push('msg_info', $msg);
    }

    public function success($msg) {
        Session::push('msg_success', $msg);
    }

    public function error($msg) {
        Session::push('msg_error', $msg);
    }

    public function getMessages() {
        return [
            'error' => Session::pull('msg_error')
        ];
    }

    public function hasError() {
        return count(Session::get('msg_error')) > 0;
    }

}