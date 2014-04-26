<?php

defined('_JEXEC') or die('Restricted access');
?>
<style type="text/css">
    table.seatmap {
        border-width:1px;
        border-style: solid;
        background-image: url('/images/<?= $this->BackgroundImageURL ?>');
        background-repeat: no-repeat;
    }
    tr.seats{
        height:13px;
    }
    td.seat{
        //border:1px solid black;
        width:10px;
    }
    td.seat-player{
        border:1px solid black;
        background-color:orange;
    }
    td.seat-player-occupied{
        background-color:red;
    }
    td.seat-vip{
        border:1px solid black;
        background-color:purple;
    }
    td.seat-vip-occupied{
        background-color:red;
    }
</style>

<?php
$SeatMap = $this->SeatMap;
$Seats = $this->Seats;

function getSeatType($x, $y, $seats) {
    foreach ($seats as $seat) {
        if ($seat->PositionX == $x && $seat->PositionY == $y) {
            return $seat->SeatTypeName;
        }
    }
    return "";
}
?>
<h3><?= $SeatMap->Name ?></h3>
<table class="seatmap">
    <tbody>
<?php
for ($y = 0; $y < $SeatMap->SizeY; $y++) {
    print '<tr class="seats">' . "\n";
    for ($x = 0; $x < $SeatMap->SizeX; $x++) {
        $type = getSeatType($x, $y, $Seats);
        $classes = "seat";
        $title = "";
        switch ($type) {
            case 'VIP':
                $classes .= " seat-vip hasTip";
                $title = "Seat $x,$y::Type: $type";
                break;
            case 'Player':
                $classes .= " seat-player hasTip";
                $title = "Seat $x,$y::Type: $type";
                break;
        }
        print "\t<td id=\"seat-$x-$y\"" .
                " title=\"$title\" class=\"$classes\"></td>\n";
    }
    print "</tr>\n";
}
JHtml::_('behavior.tooltip', '.hasTip', $null);
?>
    </tbody>
</table>
