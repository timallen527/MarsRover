<?php
use PHPUnit\Framework\TestCase;

final class GridTest extends TestCase
{
    const Width = 3;
    const Height = 3;

    private Grid $grid;

    protected function setUp(): void
    {
        $this->grid = new Grid(GridFactory::GenerateGridCells(self::Width,self::Height));
    }

    public function testNextPositionHeadingNorth()
    {
        $nextPosition = $this->grid->getNextPosition(1, 1, Direction::North);

        $this->assertSame(1, $nextPosition->x);
        $this->assertSame(2, $nextPosition->y);
    }

    public function testNextPositionHeadingSouth()
    {
        $nextPosition = $this->grid->getNextPosition(1, 1, Direction::South);

        $this->assertSame(1, $nextPosition->x);
        $this->assertSame(0, $nextPosition->y);
    }

    public function testNextPositionHeadingEast()
    {
        $nextPosition = $this->grid->getNextPosition(1, 1, Direction::East);

        $this->assertSame(2, $nextPosition->x);
        $this->assertSame(1, $nextPosition->y);
    }

    public function testNextPositionHeadingWest()
    {
        $nextPosition = $this->grid->getNextPosition(1, 1, Direction::West);

        $this->assertSame(0, $nextPosition->x);
        $this->assertSame(1, $nextPosition->y);
    }

    public function testNextPositionHeadingNorthWraps()
    {
        $nextPosition = $this->grid->getNextPosition(1, 2, Direction::North);

        $this->assertSame(1, $nextPosition->x);
        $this->assertSame(0, $nextPosition->y);
    }

    public function testNextPositionHeadingSouthWraps()
    {
        $nextPosition = $this->grid->getNextPosition(1, 0, Direction::South);

        $this->assertSame(1, $nextPosition->x);
        $this->assertSame(2, $nextPosition->y);
    }

    public function testNextPositionHeadingEastWraps()
    {
        $nextPosition = $this->grid->getNextPosition(2, 1, Direction::East);

        $this->assertSame(0, $nextPosition->x);
        $this->assertSame(1, $nextPosition->y);
    }

    public function testNextPositionHeadingWestWraps()
    {
        $nextPosition = $this->grid->getNextPosition(0, 1, Direction::West);

        $this->assertSame(2, $nextPosition->x);
        $this->assertSame(1, $nextPosition->y);
    }
}