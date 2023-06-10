<?php
use PHPUnit\Framework\TestCase;
//require('src/GridFactory.php');
//require('src/GridCell.php');

final class GridFactoryTest extends TestCase
{
    private array $cells;
    private int $width = 2;
    private int $height = 3;

    protected function setUp(): void
    {
        $this->cells = GridFactory::GenerateGridCells($this->width, $this->height);
    }

    public function testCellCountForGrid()
    {
        $this->assertsame($this->width * $this->height, count($this->cells));
    }

    public function testMaxWidth()
    {
        $maxWidth = 0;

        foreach($this->cells as $cell)
        {
            if ($cell->x > $maxWidth)
            {
                $maxWidth = $cell->x;
            }
        }

        $this->assertSame($this->width -1, $maxWidth);
    }

    public function testMaxHeight()
    {
        $maxHeight = 0;

        foreach($this->cells as $cell)
        {
            if ($cell->y > $maxHeight)
            {
                $maxHeight = $cell->y;
            }
        }

        $this->assertSame($this->height -1, $maxHeight);
    }

    public function testAllCellsAreUnique()
    {
        $this->assertTrue(count($this->cells) == count(array_unique($this->cells, SORT_REGULAR)));
    }

    public function testExpectedCellsExist()
    {
        for($x = 0; $x < $this->width; $x++)
        {
            for($y = 0; $y < $this->height; $y++)
            {
                $this->assertSame(1,
                    count(
                        array_filter($this->cells, fn($cell) => (($cell->x == $x) && ($cell->y == $y)))
                    )
                );
            }
        }
    }
}