<?php

interface Observer {
    public function update($pedido);
}

class WhatsAppNotifier implements Observer {
    public function update($pedido) {
        // Simular envio via WhatsApp
        $mensagem = "Pedido #" . $pedido->getId() . " finalizado. Total: R$ " . number_format($pedido->getTotal(), 2);
        // Aqui seria a integração real com WhatsApp API
        echo "Enviando WhatsApp: $mensagem\n";
    }
}

class PedidoSubject {
    private $observers = [];

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function notify($pedido) {
        foreach ($this->observers as $observer) {
            $observer->update($pedido);
        }
    }
}

?>