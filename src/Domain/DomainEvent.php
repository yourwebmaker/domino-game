<?php

declare(strict_types=1);

namespace eCurring\DominoGame\Domain;

/**
 * Represents each move/event in the game. It's useful for separating view/logic later on.
 * By using Domain events I can have different views of the game (HTML, CLI, etc) by looping through the event stream.
 */
interface DomainEvent
{
}
