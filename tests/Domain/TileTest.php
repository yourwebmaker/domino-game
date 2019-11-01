<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;

final class TileTest extends TestCase
{
    /**
     * @test
     */
    public function flip() : void
    {
        $tile = new Tile(0, 1);
        $tile->flip();

        self::assertEquals(1, $tile->topEnd());
        self::assertEquals(0, $tile->bottomEnd());
    }

    /**
     * @test
     */
    public function equals() : void
    {
        self::assertTrue(Tile::fromString('1:2')->equals(Tile::fromString('1:2')));
        self::assertTrue(Tile::fromString('1:2')->equals(Tile::fromString('2:1')));
        self::assertTrue(Tile::fromString('2:1')->equals(Tile::fromString('2:1')));
        self::assertTrue(Tile::fromString('2:1')->equals(Tile::fromString('1:2')));
    }

    /**
     * @test
     */
    public function canConnectToEnd() : void
    {
        $tile = Tile::fromString('0:1');
        self::assertTrue($tile->canConnectToEnd(1));
        self::assertFalse($tile->canConnectToEnd(2));
    }
}
