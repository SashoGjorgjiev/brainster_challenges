<?php


interface Printable 
{
    public function printInfo();
    public function sneakpeek();
    public function fullinfo();
}



class Furniture {
    private $width;
    private $length;
    private  $height;
    private $is_for_seating;
    private $is_for_sleeping;

public function __construct($width,$height,$length)
{
$this->width = $width;
$this->height = $height;
$this->length = $length;
}

public function getIsForSeat()
{
    return $this->is_for_seating;
}

public function setIsForSeat($is_for_seating)
{
    $this->is_for_seating = $is_for_seating;
}

public function getIsForSleep()
{
    return $this->is_for_sleeping;
}

public function setIsForSleep($is_for_sleeping)
{
     $this->is_for_sleeping = $is_for_sleeping;
}

public function area()
{
    return $this->width * $this->length;
}

public function volume()
{
    return $this->area() * $this->height;
}
protected function getWidth()
{
    return $this->width;
}
public function getLength()
{
    return $this->length;
}
public function getHeight()
{
    return $this->height;
}
public function printInfo()
{
    echo $this->getClassName() . ", " .  ($this->getIsForSleep() ? "for sleeping" : "sitting only") . ", " . $this->area() . "cm2" . "<br>";
}

public function sneakpeek()
{
    echo $this->getClassName() ;
}

public function fullinfo()
{
    echo $this->getClassName() . ", " . ($this->getIsForSleep() ? "for sleeping" : "sitting only") . ", " . $this->area() . "cm2, " . "<br>";
    echo "width: " . $this->getWidth() . "cm, length: " . $this->getLength() . "cm, height: " . $this->getHeight() . "cm" . "<br>";
}

private function getClassName()
{
    return get_class($this);
}

}

$furniture = new Furniture(5,3,2);
$furniture->setIsForSeat(true);
$furniture->setIsForSleep(true);

echo "Area:" . $furniture->area() . "<br>";
echo "Volume:" . $furniture->volume() . "<br>";
echo "Is for seating:" . ($furniture->getIsForSeat() ? "Yes" : "No") . "<br>";
echo "Is for sleeping:" . ($furniture->getIsForSleep() ? "Yes" : "No") . "<br>";


echo "<hr>";

class Sofa extends Furniture  implements Printable
{
public $seats;
public $armrests;
public $length_opened;

public function __construct($width, $height, $length, $seats, $armrests, $length_opened)
{
    parent::__construct($width,$height,$length);
    $this->seats = $seats;
    $this->armrests = $armrests;
    $this->length_opened = $length_opened;
}

public function getSeats()
{
    return $this->seats;
}
public function setSeats($seats)
{
     $this->seats = $seats;
}

public function getArmrests()
{
    return $this->armrests;
}

public function setArmrests($armrests)
{
    $this->armrests = $armrests;
}

public function getLengthOpened()
{
    return $this->length_opened;
}
public function setLengthOpened($length_opened)
{
  $this->length_opened = $length_opened;
}

public function area_opened()
{
    if ($this->getIsForSleep()) {
        return " This sofa is for sleeping it has {$this->getWidth()} width * {$this->getLengthOpened()} length opened" ;
    } else {
        return "This sofa is for sitting only,it has {$this->getArmrests()} armrest and {$this->getSeats()} seats ";
    }
}

}
$sofa = new Sofa(80, 30, 20, 3, 2, 180);
$sofa->setIsForSleep(false);
echo $sofa->area() . "<br>";
echo $sofa->volume(). "<br>";
echo $sofa->area_opened(). "<br>";

$sofa->setIsForSleep(true);
$sofa->setLengthOpened(220);
echo $sofa->area_opened(). "<br>";
echo "<hr>";

class Bench extends Sofa implements Printable {
    public function __construct($width, $height, $length, $seats, $armrests, $length_opened)
    {
        parent::__construct($width, $height, $length, $seats, $armrests, $length_opened);
    }
}

class Chair extends Furniture implements Printable {
    public function __construct($width, $height, $length)
    {
        parent::__construct($width, $height, $length);
    }
}


$bench = new Bench(120, 40, 150, 2, 0, 0);
$chair = new Chair(60, 80, 60);
$sofa->printInfo() ;
$sofa->sneakpeek() ;
$sofa->fullinfo() ;

$bench->printInfo() ;
$bench->sneakpeek() ;
$bench->fullinfo() ;

$chair->printInfo();
$chair->sneakpeek();
$chair->fullinfo();