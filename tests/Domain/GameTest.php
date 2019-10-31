<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
    /** @var Game */
    private $game;

    protected function setUp() : void
    {
        $stock = new FixedStock();
        $alice = new Player('Alice', $stock);

        $bob        = new Player('Bob', $stock);
        $this->game = new Game(new PlayerList([$alice, $bob]), $stock);
    }

    /**
     * @test
     */
    public function gameStartsWithARandomTile() : void
    {
        self::assertEquals(2, $this->game->lineOfPlay()->count());
    }

    //The game ends when one player wins by playing their last tile.

    /**
     * Game starting with first tile: <4:1>
    Alice plays <0:4> to connect to tile <4:1> on the board
    Board is now: <0:4> <4:1>
    Bob plays <0:5> to connect to tile <0:4> on the board
    Board is now: <5:0> <0:4> <4:1>
    Alice plays <1:1> to connect to tile <1:4> on the board
    Board is now: <5:0> <0:4> <4:1> <1:1>
    Bob can't play, drawing tile <1:6>
    Bob plays <1:6> to connect to tile <1:1> on the board
    Board is now: <5:0> <0:4> <4:1> <1:1> <1:6>
    Alice plays <6:6> to connect to tile <1:6> on the board
    Board is now: <5:0> <0:4> <4:1> <1:1> <1:6> <6:6>
    Bob plays <4:6> to connect to tile <6:6> on the board
    Board is now: <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4>
    Alice plays <5:5> to connect to tile <0:5> on the board
    Board is now: <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4>
    Bob plays <3:4> to connect to tile <4:6> on the board
    Board is now: <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3>
    Alice plays <0:3> to connect to tile <3:4> on the board
    Board is now: <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3> <3:0>
    Bob can't play, drawing tile <1:5>
    Bob plays <1:5> to connect to tile <5:5> on the board
    Board is now: <1:5> <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3> <3:0>
    Alice plays <0:2> to connect to tile <0:3> on the board
    Board is now: <1:5> <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3> <3:0> <0:2>
    Bob plays <2:3> to connect to tile <0:2> on the board
    Board is now: <1:5> <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3> <3:0> <0:2> <2:3>
    Alice plays <0:1> to connect to tile <1:5> on the board
    Board is now: <0:1> <1:5> <5:5> <5:0> <0:4> <4:1> <1:1> <1:6> <6:6> <6:4> <4:3> <3:0> <0:2> <2:3>
    Player Alice has won!
     */
}
