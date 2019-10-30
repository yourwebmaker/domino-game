<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
    //The 28 tiles are shuffled face down and form the stock. Each player draws seven tiles.

    //Pick a random tile to start the line of play.

    //The players alternately extend the line of play with one tile at one of its two ends;

    //A tile may only be placed next to another tile, if their respective values on the
    //connecting ends are identical.

    //If a player is unable to place a valid tile, they must keep on pulling tiles from the stock
    //until they can.

    //The game ends when one player wins by playing their last tile.
}