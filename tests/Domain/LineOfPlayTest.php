<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;

class LineOfPlayTest extends TestCase
{
    /**
     * @test
     */
    public function connectFromExerciseDescription() : void
    {
        $lineOfPlay = new LineOfPlay(Tile::fromString('4:1'));
        $lineOfPlay->connect(Tile::fromString('0:4'));
        $lineOfPlay->connect(Tile::fromString('0:5'));
        $lineOfPlay->connect(Tile::fromString('1:1'));
        $lineOfPlay->connect(Tile::fromString('1:6'));
        $lineOfPlay->connect(Tile::fromString('6:6'));
        $lineOfPlay->connect(Tile::fromString('4:6'));
        $lineOfPlay->connect(Tile::fromString('5:5'));

        self::assertEquals('<5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4>', (string) $lineOfPlay);
    }

    /**
     * @test
     */
    public function shouldPlaceTileInTheEndOfLineInCaseItsHeadsMatchesWithBottom() : void
    {
        $lineOfPlay = new LineOfPlay(Tile::fromString('6:2'));
        $lineOfPlay->connect(Tile::fromString('2:3'));

        self::assertEquals('<6:2> <2:3>', (string) $lineOfPlay);
    }

    /**
     * @test
     */
    public function shouldPlaceTileAtBeginning() : void
    {
        $lineOfPlay = new LineOfPlay(Tile::fromString('6:2'));
        $lineOfPlay->connect(Tile::fromString('3:6'));

        self::assertEquals('<3:6> <6:2>', (string) $lineOfPlay);
    }

    /**
     * @test
     */
    public function shouldPlaceTileAtEnd() : void
    {
        $lineOfPlay = new LineOfPlay(Tile::fromString('4:4'));
        $lineOfPlay->connect(Tile::fromString('5:4'));
        $lineOfPlay->connect(Tile::fromString('0:4'));

        self::assertEquals('<5:4> <4:4> <4:0>', (string) $lineOfPlay);
    }
}
