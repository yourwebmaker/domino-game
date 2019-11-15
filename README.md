# domino-game
Coding assessment for eCurring

#### Install and Run
- `composer install` to install
- `php src/UserInterface/CLI/main.php` to execute the program
- `vendor/bin/phpunit tests` to run the tests

### Solution 
- Stock is an interface, so whenever I need to simulate and test a game play I can do it via implementing the stock Interface 
with a fixed list of Tiles
- Recursion + Circular Linked List was used to alternate between players. It'possible to add more players.
- Usage of Domain events was made in order to reduce the coupling between Domain logic and Console output. You can see it 
on the `main.php` file. 
- None of the classes can exists in an invalid state.
- None of the classes have more than 90 lines, which is a good metric for code quality.
- Check the docblock of each class where I describe the responsibility of each one. 

#### What can be improved?
- Replace counts, etc... by collections
- Remove duplication on Stock classes
- Create tests with just a few tiles on Stock
- Update to use PHP 7.4
- Html output
- Add PHPStan

### Class diagram
##### Initial Idea
<img src="docs/initial-class-diagram.png"  alt="Class diagram"/>

##### Final Result
<img src="docs/final-class-diagram.png"  alt="Class diagram"/>
