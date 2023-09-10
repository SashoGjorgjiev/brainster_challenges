<?php

class Product
{
    public string $name;
    private float $price;
    public bool $sellingByKg;


    public function __construct(string $name,float  $price,bool $sellingByKg)
    {
$this->name = $name;
$this->price = $price;
$this->sellingByKg = $sellingByKg;
    }


    public function getPrice()
    {
        return $this->price ;
    }


}


class MarketStall 
{
    public array $products = [] ;
    public string $errorMessage = '';

    public function __construct(array $products)
    {
       foreach ($products as $name => $product) {
        if(!$product instanceof Product ){
  $this->errorMessage = "Invalid product for '$name'.";
        }  else {
            $this->products[$name] = $product; 
        }
       }
    }



    public function  addProductToMarket(string $name,Product $product)
    {
if (!isset($this->products[$name])){
    $this->products[$name] = $product;
}else {
    $this->errorMessage = "Product '$name' already exists in the market.";

}
    }


    public function getItem(string $name,int $amount)
    {
if (array_key_exists($name,$this->products)){
    $item = $this->products[$name];
    return ['amount' => $amount, 'item' => $item];
} else {
    return false;
}
    }
}

class Cart 
{
    private $cartItems = [];

    public function addToCart( $item)
    {
if($item !== false ){
    $this->cartItems[] = $item;
}
    }



public function printReceipt()
{
    if(empty($this->cartItems)){
        echo "Your cart is empty";
    }

   $recipt = "";
   $totalPrice = 0;


   foreach ($this->cartItems as $item){
    $product = $item['item'];
    $amount = $item['amount'];
    $subTotal = $product->getPrice() * $amount;
$recipt .= "{$product->name} | ";
if ($product->sellingByKg) {
    $recipt .= "$amount kgs";
} else {
    $recipt .= "$amount gunny sack" ;
}

$recipt .= " | total= $subTotal denars . '<br>'";

$totalPrice += $subTotal;
   }

   $recipt .= "Final price amount: $totalPrice denars";
return $recipt;
}

}
$orange = new Product('Orange', 35, true);
$potato = new Product('Potato', 240, false);
$nuts = new Product('Nuts', 850, true);
$kiwi = new Product('Kiwi', 670, false);
$pepper = new Product('Pepper', 330, true);
$raspberry = new Product('Raspberry', 555, false);

$marketStall1 = new MarketStall(['Orange' => $orange, 'Potato' => $potato, 'Nuts' => $nuts]);
$marketStall2 = new MarketStall(['Kiwi' => $kiwi, 'Pepper' => $pepper, 'Raspberry' => $raspberry]);

$cart = new Cart();

$cart->addToCart($marketStall1->getItem('Orange', 3));
$cart->addToCart($marketStall1->getItem('Potato', 2));
$cart->addToCart($marketStall2->getItem('Kiwi', 1));
$cart->addToCart($marketStall2->getItem('Pepper', 2));

echo $cart->printReceipt();