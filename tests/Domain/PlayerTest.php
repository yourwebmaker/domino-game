<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;
use function count;

class PlayerTest extends TestCase
{
    /** @var Stock */
    private $stock;
    /** @var Player */
    private $player;

    protected function setUp() : void
    {
        $this->stock  = new FixedStock();
        $this->player = new Player('Alice', $this->stock);
    }

    /**
     * @test
     */
    public function playerGets7TilesFromStock() : void
    {
        self::assertCount(7, $this->player->tiles());
    }

    /**
     * @test
     */
    public function stockSizeShouldBeReducedWhenPlayerDraws() : void
    {
        self::assertCount(21, $this->stock->tiles());
    }

    /**
     * @test
     */
    public function playTileReduceSizeOfPlayersStock() : void
    {
        $currentCount = count($this->player->tiles());
        $this->player->playTile(Tile::fromString('0:1'), new LineOfPlay(Tile::fromString('0:0')));

        self::assertLessThan($currentCount, count($this->player->tiles()));
    }
}
