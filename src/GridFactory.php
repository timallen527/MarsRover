<?php

class GridFactory
{
    public static function GenerateGridCells(int $width, int $height): array
    {
        $cells = array();

        for($x = 0; $x < $width; $x++)
        {
            for($y = 0; $y < $height; $y++)
            {
                $cells[] = new GridCell($x, $y);
            }
        }

        return $cells;
    }
}