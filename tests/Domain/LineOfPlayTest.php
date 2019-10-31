<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;

class LineOfPlayTest extends TestCase
{
    /**
     * @test
     */
    public function connect() : void
    {
        $lineOfPlay = new LineOfPlay(Tile::fromString('4:1'));
        $lineOfPlay->connect(Tile::fromString('0:4'));
        $lineOfPlay->connect(Tile::fromString('0:5'));
        $lineOfPlay->connect(Tile::fromString('1:1'));
        $lineOfPlay->connect(Tile::fromString('1:6'));
        $lineOfPlay->connect(Tile::fromString('6:6'));
        $lineOfPlay->connect(Tile::fromString('4:6'));

        self::assertEquals('<5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4>', (string) $lineOfPlay);
    }
}
