<?php

class Grid
{
    private array $cells;
    private int $maxY;
    private int $maxX;

    function __construct(array $cells)
    {
        $this->cells = $cells;
        $this->maxY = $this->getMaxY();
        $this->maxX = $this->getMaxX();
    }

    public function getNextPosition(int $currentX, int $currentY, Direction $currentDirection): GridCell
    {
        $newCell = new GridCell($currentX, $currentY);

        switch($currentDirection) {
            case Direction::North:
            {
                $newCell->y = $this->getNewYPositionNorth($currentY);
                break;
            }
            case Direction::South:
            {
                $newCell->y = $this->getNewYPositionSouth($currentY);
                break;
            }
            case Direction::East:
            {
                $newCell->x = $this->getNewXPositionEast($currentX);
                break;
            }
            case Direction::West:
            {
                $newCell->x = $this->getNewXPositionWest($currentX);
                break;
            }
        }

        return $newCell;
    }

    private function getNewYPositionNorth(int $currentY): int
    {
        if ($currentY == $this->maxY)
        {
            return 0;
        }

        return $currentY + 1;
    }

    private function getNewYPositionSouth(int $currentY): int
    {
        if ($currentY == 0)
        {
            return $this->maxY;
        }

        return $currentY - 1;
    }

    private function getNewXPositionEast(int $currentX): int
    {
        if ($currentX == $this->maxX)
        {
            return 0;
        }

        return $currentX + 1;
    }

    private function getNewXPositionWest(int $currentX): int
    {
        if ($currentX == 0)
        {
            return $this->maxX;
        }

        return $currentX - 1;
    }

    private function getMaxX(): int
    {
        $maxX = 0;
        foreach($this->cells as $cells)
        {
            if ($cells->x > $maxX)
            {
                $maxX = $cells->x;
            }
        }

        return $maxX;
    }

    private function getMaxY(): int
    {
        $maxY = 0;
        foreach($this->cells as $cells)
        {
            if ($cells->y > $maxY)
            {
                $maxY = $cells->y;
            }
        }

        return $maxY;
    }
}