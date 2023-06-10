<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

final class RoverTest extends TestCase
{
    private Rover $rover;
    private MockObject $mockGrid;

    /**
     * @throws MockObject\Exception
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    protected function setUp(): void
    {
        $this->mockGrid = $this->createMock(Grid::class);
        $this->rover = new Rover($this->mockGrid);
    }

    public function testMovingForward()
    {
        $dummyCell = new GridCell(2, 3);
        $this->mockGrid->method("getNextPosition")->willReturn($dummyCell);

        $newCell = $this->rover->moveForward();

        $this->assertSame($dummyCell->x, $newCell->x);
        $this->assertSame($dummyCell->y, $newCell->y);
    }

    public function testStartingHeading()
    {
        $this->assertSame(Direction::North, $this->rover->heading);
    }

    public function testTurningClockwise()
    {
        $newHeading = $this->rover->turnClockwise();
        $this->assertSame(Direction::East, $newHeading);

        $newHeading = $this->rover->turnClockwise();
        $this->assertSame(Direction::South, $newHeading);

        $newHeading = $this->rover->turnClockwise();
        $this->assertSame(Direction::West, $newHeading);

        $newHeading = $this->rover->turnClockwise();
        $this->assertSame(Direction::North, $newHeading);
    }

    public function testTurningCounterClockwise()
    {
        $newHeading = $this->rover->turnCounterClockwise();
        $this->assertSame(Direction::West, $newHeading);

        $newHeading = $this->rover->turnCounterClockwise();
        $this->assertSame(Direction::South, $newHeading);

        $newHeading = $this->rover->turnCounterClockwise();
        $this->assertSame(Direction::East, $newHeading);

        $newHeading = $this->rover->turnCounterClockwise();
        $this->assertSame(Direction::North, $newHeading);
    }
}