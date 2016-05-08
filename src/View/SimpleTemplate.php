<?php
namespace View;

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
        ob_start();
        extract($values);

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