# domino-game
Coding assessment for eCurring

#### Install and Run
- `composer install` to install
- `vendor/bin/phpunit tests` to run the tests and see the result on CLI

### Class diagram

<img src="docs/class-diagram.png"  alt="Class diagram"/>

#### todo
- Create tests with just a few tiles on Stock
- Replace echoes with Domain events
- Create App layer
- Remove duplication on Stock classes
- Update class diagram With PHPStorm
    - Explain concepts used on solution
    - Model, View Model, Events, Low Coupling
- Update to use PHP 7.4
- Drop Tile::canConnectWith and add tests on canConnectToEnd