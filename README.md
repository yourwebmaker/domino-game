# domino-game
Coding assessment for eCurring

#### Install and Run
- `composer install` to install
- `vendor/bin/phpunit tests` to run the tests and see the result on CLI

### Class diagram

##### Initial Idea

<img src="docs/initial-class-diagram.png"  alt="Class diagram"/>

##### Final Result

<img src="docs/final-class-diagram.png"  alt="Class diagram"/>

#### Todo
- Create tests with just a few tiles on Stock
- What to do in case they run out of tiles on stock?
- Replace counts, etc... by collection
- Remove duplication on Stock classes
- Explain concepts used on solution: Model, View Model, Events, Low Coupling
- Update to use PHP 7.4
- Drop Tile::canConnectWith and add tests on canConnectToEnd
- Drop unused methods (PlayerList)