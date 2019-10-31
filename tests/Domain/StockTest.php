<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;

final class StockTest extends TestCase
{
    /**
     * @test
     */
    public function shouldCreate28Tiles() : void
    {
        $stock = new Stock();
        $tiles = $stock->tiles();

        self::assertCount(28, $tiles);
        self::assertContainsOnlyInstancesOf(Tile::class, $tiles);
    }

    public function shouldCreateUniqueTiles() : void
    {

    }
}