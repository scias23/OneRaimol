<li><a href="<?php echo $base_url . $moduleURL ?>/po" <?php if(isset($leftSelection) && $leftSelection == 'po') echo 'class="selected"'?>>purchase order</a></li>
                    <li><a href="<?php echo $base_url . $moduleURL ?>/so" <?php if(isset($leftSelection) && $leftSelection == 'so') echo 'class="selected"'?>>sales order</a></li>
                    <li><a href="<?php echo $base_url . $moduleURL ?>/dr" <?php if(isset($leftSelection) && $leftSelection == 'dr') echo 'class="selected"'?>>delivery receipt</a></li>