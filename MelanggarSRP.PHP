<?php

class BookOrder {
    private $title;
    private $author;
    private $price;
    private $quantity;
    private $orders = [];

    public function __construct($title, $author, $price, $quantity) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function calculateTotalPrice() {
        return $this->price * $this->quantity;
    }

    public function printOrderDetails() {
        echo "Book Title: " . $this->title . "\n";
        echo "Author: " . $this->author . "\n";
        echo "Quantity: " . $this->quantity . "\n";
        echo "Total Price: Rp" . $this->calculateTotalPrice() . "\n";
    }

    public function saveOrder() {
        $this->orders[] = [
            'title' => $this->title,
            'author' => $this->author,
            'price' => $this->price,
            'quantity' => $this->quantity
        ];
    }

    public function getAllOrders() {
        return $this->orders;
    }
}

$order = new BookOrder("Rich Dad Poor Dad", " Robert T. Kiyosaki and Sharon Lechter", 68000, 2);
$order->calculateTotalPrice();
$order->printOrderDetails();
$order->saveOrder();
print_r($order->getAllOrders());

?>
