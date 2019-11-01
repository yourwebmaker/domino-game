<?php

declare(strict_types=1);

require_once __DIR__ . '/../../../vendor/autoload.php';

use eCurring\DominoGame\Domain\Game;
use eCurring\DominoGame\Domain\Player;
use eCurring\DominoGame\Domain\PlayerList;
use eCurring\DominoGame\Domain\RandomStock;

$stock = new RandomStock();
$alice = new Player('Alice', $stock);
$bob   = new Player('Bob', $stock);
$game  = new Game(new PlayerList([$alice, $bob]), $stock);
$game->start($alice);

foreach ($game->events() as $event) {
    echo $event . "\n";
}
