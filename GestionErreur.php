<?php

class GestionErreur
{
    public function sendMessage(int $var)
    {
        if($var > 5)
            throw new Exception('Trop court', '13');
    }

    public function sendMail()
    {
        try {
            $this->sendMessage(10);
        } catch (Exception $e) {
            echo $e->getCode() . ' => ' . $e->getMessage();
        }
    }
}

(new GestionErreur())->sendMail();