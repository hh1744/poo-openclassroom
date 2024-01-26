<?php
declare(strict_types=1);

class A
{
    public function __construct(private int $peugeot = 33) { }

    public function dites33() { echo $this->peugeot; }
}


class B extends A
{
    public function __construct(private int $peugeot = 806) {
        //parent::__construct($peugeot);
    }
}


(new B)->dites33();