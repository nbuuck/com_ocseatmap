<?php
/*
 * The MIT License
 *
 * Copyright 2014 nbuuck.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

defined('_JEXEC') or die('Restricted access');
?>
<style type="text/css">
    tr.seats{
        height:10px;
    }
    td.seat{
        border:1px solid black;
        width:10px;
    }
    td.seat-player{
        background-color:orange;
    }
    td.seat-vip{
        background-color:purple;
    }
</style>

<?php
$SeatMap = $this->SeatMap;
?>
<h3><?= $SeatMap->Name ?></h3>
<table style="border-width:1px; border-style: solid;">
    <tbody>
        <?php
        for ($y = 0; $y < $SeatMap->SizeY; $y++) {
            print '<tr class="seats">'."\n";
            for ($x = 0; $x < $SeatMap->SizeX; $x++) {
                print "\t".'<td id="cell-' . $x . "-" . $y . '" class="seat';
                foreach ($this->Seats as $seat) {
                    if ($seat->PositionX == $x && $seat->PositionY == $y) {
                        if ($seat->SeatTypeName == "Player") {
                            echo ' seat-vip';
                            break;
                        }
                        if ($seat->SeatTypeName == "VIP") {
                            echo ' seat-player';
                            break;
                        }
                    }
                }
                print '"></td>'."\n";
            }
            print "</tr>\n";
        }
        ?>
    </tbody>
</table>