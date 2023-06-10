<?php

class Rover
{
    public Direction $heading = Direction::North;
    private int $x = 0;
    private int $y = 0;
    private Grid $grid;

    function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    public function moveForward(): GridCell
    {
        $newCell = $this->grid->getNextPosition($this->x, $this->y, $this->heading);
        $this->x = $newCell->x;
        $this->y = $newCell->y;

        return $newCell;
    }

    public function turnClockwise(): Direction
    {
        $this->heading = $this->heading->getNextDirectionClockwise();

        return $this->heading;
    }

    public function turnCounterClockwise(): Direction
    {
        $this->heading = $this->heading->getNextDirectionCounterClockwise();

        return $this->heading;
    }
}