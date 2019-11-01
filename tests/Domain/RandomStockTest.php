<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;

final class RandomStockTest extends TestCase
{
    /** @var RandomStock */
    private $stock;

    protected function setUp() : void
    {
        $this->stock = new RandomStock();
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
        $amount     = 7;
        $drawnTiles = $this->stock->drawTiles($amount);
        self::assertCount($amount, $drawnTiles);
    }

    /**
     * @test
     */
    public function drawTilesReducesTheAmountOfTilesToMinus7Tiles() : void
    {
        $amount = 7;
        $this->stock->drawTiles($amount);

        $remainingTiles = $this->stock->tiles();
        self::assertCount(21, $remainingTiles);
    }
}
