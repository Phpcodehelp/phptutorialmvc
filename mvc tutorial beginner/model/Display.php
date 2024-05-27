<?php

class Display
{
    public function createTableAllDishes($data)
    {
        $appetizers = '';
        $main = '';
        $desserts = '';
        $drinks = '';

        foreach ($data as $row) {
            $dishType = $row['type'];

            $item = '<div class="item flex-row">';
            $item .= '<div class="item flex-column">';
            $item .= '<p class="name" id="' . $dishType . '">' . $row['name'] . '</p>';
            $item .= '<p class="cost"> €' . $row['cost'] . '</p>';
            $item .= '</div>';
            $item .= '<button class="small_button" onclick="order(this)">+</button>';
            $item .= '</div>';

            switch ($dishType) {
                case "appetizers":
                    $appetizers .= $item;
                    break;
                case "main":
                    $main .= $item;
                    break;
                case "deserts":
                    $desserts .= $item;
                    break;
                case "drinks":
                    $drinks .= $item;
                    break;
                default:
                    break;
            }
        }

        $html = "<h3> Voorgerechten </h3>";
        $html .= $appetizers;

        $html .= "<h3> Hoofdgerechten </h3>";
        $html .= $main;

        $html .= "<h3> Toetjes </h3>";
        $html .= $desserts;

        $html .= "<h3> Dranken </h3>";
        $html .= $drinks;

        return $html;
    }

    public function createTableDish($con, $res, $dish)
    {
        $tableheader = false;
        $html = '<div class="flex" style="overflow-x:auto table">';
        $html .= '<table>';
        foreach ($res as $row) {
            if ($tableheader == false) {
                $html .= "<tr>";

                foreach ($row as $key => $value) {
                    $html .= "<th>{$key}</th>";
                }
                $html .= "<th> actions </th>";
                $html .= "</tr>";
                $tableheader = true;
            }

            $html .= '<tr>';

            foreach ($row as $key => $value) {
                $html .= "<td>" . $value . "</td>";
            }

            $html .= "<td style='display: flex; justify-content: space-between;'>";
            $html .= "<a href='index.php?con=" . $con . "&op=read&dish=" . $dish . "&id=" . $row['id'] . "'> <i class='fa fa-eye' style='font-size:30px; margin:1px'></i></a>";
            $html .= "<a href='index.php?con=" . $con . "&op=update&dish=" . $dish . "&id=" . $row['id'] . "'><i class='fa fa-edit' style='font-size:30px; margin:1px'></i></a>";
            $html .= "<a href='index.php?con=" . $con . "&op=delete&dish=" . $dish . "&id=" . $row['id'] . "'><i class='fa fa-trash' style='font-size:30px; margin:1px'></i></a>";
            $html .= "</td>";

            $html .= '</tr>';
        }
        $html .= "</table></div>";
        $html .= "</form";
        return $html;
    }

    public function createTable($con, $res)
    {
        $tableheader = false;
        $html = '<div class="flex" style="overflow-x:auto table">';
        $html .= '<table>';
        foreach ($res as $row) {
            if ($tableheader == false) {
                $html .= "<tr>";

                foreach ($row as $key => $value) {
                    $html .= "<th>{$key}</th>";
                }
                $html .= "<th> actions </th>";
                $html .= "</tr>";
                $tableheader = true;
            }

            $html .= '<tr>';

            foreach ($row as $key => $value) {
                $html .= "<td>" . $value . "</td>";
            }

            $html .= "<td style='display: flex; justify-content: space-between;'>";
            $html .= "<a href='index.php?con=" . $con . "&op=read&id=" . $row['id'] . "'> <i class='fa fa-eye' style='font-size:30px; margin:1px'></i></a>";
            $html .= "<a href='index.php?con=" . $con . "&op=update&id=" . $row['id'] . "'><i class='fa fa-edit' style='font-size:30px; margin:1px'></i></a>";
            $html .= "<a href='index.php?con=" . $con . "&op=delete&id=" . $row['id'] . "'><i class='fa fa-trash' style='font-size:30px; margin:1px'></i></a>";
            $html .= "</td>";

            $html .= '</tr>';
        }
        $html .= "</table></div>";
        $html .= "</form";
        return $html;
    }
}
