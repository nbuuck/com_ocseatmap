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

<?php foreach($this->SeatMaps as $row): 
    print_r($row); ?>
    <table style="border-width:1px; border-style: solid;">
        <tbody>
            <?php for($y=0; $y < $row->SizeY; $y++){ ?>
            <tr class="seats">
                <?php for($x=0; $x < $row->SizeX; $x++){
                    $isPlayer = false;
                    $isVIP = false;
                    foreach($row->Seats as $seat)
                    {
                        if($seat->PositionX == $x
                            && $seat->PositionY == $y)
                        {
                            if($seat->SeatTypeName == "Player"){
                                $isPlayer = true;
                                break;
                            }
                            if($seat->SeatTypeName == "VIP"){
                                $isVIP = true;
                                break;
                            }
                        }
                    }
                    echo "<td class=\"seat";
                    if($isVIP){
                        echo " seat-vip";
                    }elseif($isPlayer){
                        echo " seat-player";
                    }
                    echo "\"></td>";
                } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>                
<?php endforeach;