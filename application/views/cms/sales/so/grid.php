<script src="<?php echo $base_url . $config['js'] ?>/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo $base_url . $config['js'] ?>/cms/sales/so.js" type="text/javascript"></script>

    <?php if(isset($pageSelectionLabel)) : ?>
        <p><?php echo $pageSelectionLabel ?></p>
    <?php endif ?>
        <div id="msg"></div>
        <?php echo isset($success) ? '<span class="success">Account successfully ' . $success . '</span>' : ''; ?>
        
                <div class="span-24 last" id="formMenu">
                	<ul>
                    	<li><a href="<?php echo $base_url ?>cms/sales/so/add">add</a></li>
                        <li><a href="javascript:void(0)" onclick="enable_customer()">enable</a></li>
                        <li><a href="javascript:void(0)" onclick="disable_customer()">disable</a></li>
                        <li><a href="javascript:void(0)" onclick="delete_customer()">delete</a></li>
                    </ul>
                </div>
                <table class="fullWidth">
                    <tbody>
                    	<tr>
                            <th style="width:2%"><input type="checkbox" onclick="check_all(this);"/></th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Company</th>
                            <th style="width:6%">&nbsp;</th>
                        </tr>
                        <?php $record_count = 0;?>
                        <?php foreach($salesorder as $result) :?>
                            <?php $record_count++;?>
                        <tr>
                            <td><input class="id" name="id[]" type="checkbox" value ="<?php echo Helper_Helper::encrypt($result->customer_id); ?>" id="chk<?php echo $result->customer_id ?>"/></td>
                            <td style="color: <?php echo $result->color_status(); ?>; font-weight: bold;">
                                <?php echo $result->status(); ?>
                            </td>
                            <td><?php echo $result->full_name() ?></td>
                            <td><?php echo $result->username ?></td>
                            <td><?php echo $result->company ?></td> 
                            <td><a href="<?php echo $base_url ?>cms/accounts/customer/edit/<?php echo Helper_Helper::encrypt($result->customer_id)?>">Edit</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php if($record_count == 0) : ?>
                            <tr><td colspan="6" style="text-align: center; font-style: italic">No records found.</td></tr>
                        <?php endif ?>
                    </tbody>
                </table>