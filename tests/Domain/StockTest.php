<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;

final class StockTest extends TestCase
{
    /** @var Stock */
    private $stock;

    protected function setUp() : void
    {
        $this->stock = new Stock();
    }

    /**
     * @test
     */
    public function shouldCreate28Tiles() : void
    {
        $tiles = $this->stock->tiles();
        self::assertCount(28, $tiles);
        self::assertContainsOnlyInstancesOf(Tile::class, $tiles);
    }

    /**
     * @test
     */
    public function drawTilesReturn7Tiles() : void
    {
        $drawnTiles = $this->stock->drawTiles();
        self::assertCount(7, $drawnTiles);
    }

    /**
     * @test
     */
    public function drawTilesReducesTheAmountOfTilesToMinus7Tiles() : void
    {
        $this->stock->drawTiles();

        $remainingTiles = $this->stock->tiles();
        self::assertCount(21, $remainingTiles);
    }
}
