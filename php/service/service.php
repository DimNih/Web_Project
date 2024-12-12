<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
require dirname(__DIR__) . '/vendor/autoload.php';

class Chat implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {
        echo "Koneksi baru! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo "Pesan dari {$from->resourceId}: {$msg}\n";
        // Kirim pesan ke semua klien yang terhubung
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        echo "Koneksi {$conn->resourceId} telah terputus\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Terjadi kesalahan: {$e->getMessage()}\n";
        $conn->close();
    }
}

$app = new Ratchet\App('localhost', 8080);
$app->route('/chat', new Chat, ['*']);
$app->run();
