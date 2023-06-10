<?php

enum Direction
{
    case North;
    case East;
    case South;
    case West;


    function getNextDirectionClockwise(): Direction
    {
        return match ($this) {
            Direction::North => Direction::East,
            Direction::East => Direction::South,
            Direction::South => Direction::West,
            Direction::West => Direction::North,
        };

    }

    function getNextDirectionCounterClockwise(): Direction
    {
        return match ($this) {
            Direction::North => Direction::West,
            Direction::East => Direction::North,
            Direction::South => Direction::East,
            Direction::West => Direction::South,
        };
    }
}