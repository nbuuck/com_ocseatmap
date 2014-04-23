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
<table>
    <tbody>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Size</th>
        </tr>
        <?php foreach($this->SeatMaps as $row): ?>
        <tr>
            <td><?php echo $row->ID; ?></td>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $row->SizeX.",".$row->SizeY; ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <table style="border-width:1px; border-style: solid;">
                    <tbody>
                        <?php for($y=0; $y < $row->SizeY; $y++){ ?>
                        <tr>
                            <?php for($x=0; $x < $row->SizeX; $x++){
                                echo "<td style=\"width:12px;\">";
                                $found = false;
                                foreach($row->Seats as $seat)
                                {
                                    if($seat->PositionX == $x
                                        && $seat->PositionY == $y)
                                    {
                                        echo substr($seat->SeatTypeName,0,1);
                                        $found = true;
                                    }
                                }
                                if(!$found){ echo "X"; }
                                echo "</td>";
                            } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>                
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>