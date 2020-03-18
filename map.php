<?php

class Map
{
    private $x; //amount of columns
    private $y; //amount of rows
    private $tiles; //the map

    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        $this->createEmptyMap();
    }

    private function createEmptyMap()
    {
        $this->tiles = array();
        
        for ($row = 0; $row < $this->y; $row++) {
            for ($column = 0; $column < $this->x; $column++) {
                if ($row == 0) { //check for first row   
                    $this->tiles[$row][$column] = "Up";
                } elseif ($row == $this->y - 1) {
                    $this->tiles[$row][$column] = "Down";
                } elseif ($column == 0) {
                    $this->tiles[$row][$column] = "Left";
                } elseif ($column == $this->x - 1) {
                    $this->tiles[$row][$column] = "Right";
                } else {
                    $this->tiles[$row][$column] = 1;
                }
            }
        }
        $this->tiles[3][6]=2; // add player img
    }
    private function showImg($id, $tile)
    {
        echo "<td id='" . $id . "'>";
        switch ($tile) { // what img is it     
            case 'Up':
                echo "<img src='Images/Grass-UP.png'/>";
                break;
            case 'Down':
                echo "<img src='Images/Grass-Down.png'/>";
                break;
            case 'Left':
                echo "<img src='Images/Grass-Left.png'/>";
                break;
            case 'Right':
                echo "<img src='Images/Grass-Right.png'/>";
                break;
                case1: echo "<img src='Images/Grass.png'/>";
                break;
                case2: echo "<img src='Images/Player.png'/>";
                break;
        }
        echo "</td>";
    }
    public function Show()
    {
        echo "<table>";
        $id = 0;
        for ($row = 0; $row < $this->y; $row++) {
            echo "<tr>";
            for ($column = 0; $column < $this->x; $column++) {
                echo "<td>";
                $this->showImg($id, $this->tiles[$row][$column]);
                $id++;
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
