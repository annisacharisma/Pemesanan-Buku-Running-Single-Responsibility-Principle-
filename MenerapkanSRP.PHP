<?php
//class book bertanggung jawab untuk merepresentasikan entitas buku
class Book {
    private $title;
    private $author;
    private $price;

    public function __construct($title, $author, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPrice() {
        return $this->price;
    }
}

//Class Order bertanggung jawab untuk merepresentasikan pemesanan buku
class Order {
    private $book;
    private $quantity;

    public function __construct(Book $book, $quantity) {
        $this->book = $book;
        $this->quantity = $quantity;
    }

    public function getBook() {
        return $this->book;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function calculateTotalPrice() {
        return $this->book->getPrice() * $this->quantity;
    }
}

//Class OrderPrinter bertanggung jawab untuk mencetak rincian pesanan
class OrderPrinter {
    public function printOrderDetails(Order $order) {
        echo "Book Title: " . $order->getBook()->getTitle() . "\n";
        echo "Author: " . $order->getBook()->getAuthor() . "\n";
        echo "Quantity: " . $order->getQuantity() . "\n";
        echo "Total Price: Rp" . $order->calculateTotalPrice() . "\n";
    }
}

//Class OrderRepository bertanggung jawab untuk menyimpan dan mengelola data pesanan
class OrderRepository {
    private $orders = [];

    public function saveOrder(Order $order) {
        $this->orders[] = $order;
    }

    public function getAllOrders() {
        return $this->orders;
    }
}

$book = new Book("Rich Dad Poor Dad", " Robert T. Kiyosaki and Sharon Lechter", 68000);
$order = new Order($book, 2);
$orderPrinter = new OrderPrinter();
$orderPrinter->printOrderDetails($order);
$orderRepository = new OrderRepository();
$orderRepository->saveOrder($order);
?>
