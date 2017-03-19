<?php

class View
    implements Iterator
{
    protected $data = [];
    const PATH =  __DIR__.'/../views/';

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function render($template)
    {
        foreach ($this->data as $key => $val) {
            $$key = $val;
        }
        ob_start();
        include self::PATH . $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    public function current()
    {
        $data = current($this->data);
        echo "текущий: $data\n";
        return $data;
    }

    public function next()
    {
        $data = next($this->data);
        echo "следующий: $data\n";
        return $data;
    }

    public function key()
    {
        $data = key($this->data);
        echo "ключ: $data\n";
        return $data;
    }

    public function valid()
    {
        $key = key($this->data);
        $data = ($key !== NULL && $key !== FALSE);
        echo "верный: $$data\n";
        return $data;
    }

    public function rewind()
    {
        echo "перемотка в начало\n";
        reset($this->data);
    }
}

