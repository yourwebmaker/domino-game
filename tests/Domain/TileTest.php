<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;

final class TileTest extends TestCase
{
    /**
     * @test
     */
    public function canConnect() : void
    {
        $tile = new Tile(0, 1);

        $anotherTile = new Tile(0, 2);
        $anotherTile->canConnectWith($tile);
    }

    /**
     * @test
     */
    public function cannotConnect() : void
    {

    }

    public function connectDoubles() : void
    {

    }
}
