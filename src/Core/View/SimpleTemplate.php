<?php
namespace Core\View;

use Core\IoC;

class SimpleTemplate
{
    /**
     * @var string
     */
    protected $path;

    /**
     * View constructor.
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function render($template, array $values = [])
    {
        $message = IoC::resolve('message');

        ob_start();
        extract($values);

        /** @var \Core\Message\FlashMessage $message */
        $messages = $message->getMessages();

        if (!file_exists("{$this->path}/{$template}.php")) {
            echo "TEMPLATE FILE NOT EXIST";
            exit();
        }

        require "{$this->path}/{$template}.php";
        $contents = ob_get_contents();
        ob_end_clean();

        echo $contents;
    }
}