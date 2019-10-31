<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;

final class TileTest extends TestCase
{
    public function testCanConnect() : void
    {
        $tile = new Tile(0, 1);

        $anotherTile = new Tile(0, 1);
        $anotherTile->canConnectWith($anotherTile);
    }
    //tiles can connect
}
