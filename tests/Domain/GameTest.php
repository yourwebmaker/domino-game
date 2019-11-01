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
        $stock      = new RandomStock();
        $alice      = new Player('Alice', $stock);
        $bob        = new Player('Bob', $stock);
        $this->game = new Game(new PlayerList([$alice, $bob]), $stock);
    }

    /**
     * @test
     */
    public function gameStartsWithARandomTile() : void
    {
        self::assertEquals(1, $this->game->lineOfPlay()->count());
    }
}
