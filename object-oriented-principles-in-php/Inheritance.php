<?php

class Collection
{
    protected $items;
    public function __construct(array $items)
    {
        $this->items = $items;
    }
    // Il metodo pr filtrare l'array è lo stesso per ogni tipo di collection
    // ma nella collection specifica lo specializzo con un metodo specifico e una chiave specifica
    public function sum($key)
    {
        return array_sum(array_column($this->items, $key));
    }
}
class VideoCollection extends Collection
{
    public function length()
    {
        return $this->sum('length');
    }
}
class ImageCollection extends Collection
{
    public function size()
    {
        return $this->sum('size');
    }
}

class Video
{
    public $title;
    public $length;
    public function __construct($title, $length)
    {
        $this->title = $title;
        $this->length = $length;
    }
}
class Image
{
    public $title;
    public $size;
    public function __construct($title, $size)
    {
        $this->title = $title;
        $this->size = $size;
    }
}

$videoCollection = new VideoCollection([
    new Video('Video 1', 100),
    new Video('Video 1', 200),
    new Video('Video 1', 300)
]);

$imageCollection = new ImageCollection([
    new Image('Foto 1', 100),
    new Image('Foto 1', 800),
    new Image('Foto 1', 500),
]);

var_dump($videoCollection->length());
var_dump($imageCollection->size());
