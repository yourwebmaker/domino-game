<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;

final class TileTest extends TestCase
{
    /**
     * @param array<int> $tileEnds
     * @param array<int> $anotherTileEnds
     *
     * @test
     * @dataProvider connectProvider
     */
    public function canConnect(array $tileEnds, array $anotherTileEnds) : void
    {
        $tile        = new Tile($tileEnds[0], $tileEnds[1]);
        $anotherTile = new Tile($anotherTileEnds[0], $anotherTileEnds[1]);

        self::assertTrue($anotherTile->canConnectWith($tile));
    }

    /**
     * @test
     */
    public function cannotConnect() : void
    {
        $tile        = new Tile(0, 1);
        $anotherTile = new Tile(5, 3);

        self::assertFalse($anotherTile->canConnectWith($tile));
    }

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
     * @return array<array<int>>
     */
    public function connectProvider() : array
    {
        return [
            //created by me
            [[4, 1], [0, 4]],
            [[0, 0], [0, 1]],
            [[0, 1], [0, 2]],
            [[0, 1], [1, 2]],
            [[1, 0], [0, 1]],
            [[0, 1], [1, 5]],
            //copied from the description
            [[1, 5], [5, 5]],
            [[5, 0], [0, 4]],
            [[4, 1], [1, 1]],
            [[1, 1], [1, 6]],
            [[6, 6], [6, 4]],
            [[4, 3], [3, 0]],
            [[3, 0], [0, 2]],
            [[0, 2], [2, 3]],
        ];
    }
}
