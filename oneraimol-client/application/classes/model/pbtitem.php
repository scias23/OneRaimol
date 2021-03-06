<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Production batch ticket item model.
 * 
 * @category   Model
 * @author     Gerona, John Michael D.
 * @copyright  (c) 2011 DCDGLP
 */
class Model_Pbtitem extends ORM {

        protected $_table_name  = 'production_batch_ticket_item_tb';
        protected $_primary_key = 'pbt_item_id';
       
        protected $_belongs_to = array(
            'productionbatchtickets' => array(
                'model' => 'pbt',
                'foreign_key' => 'pbt_id'
            ),
            'formulaitems' => array(
                'model' => 'formuladetail',
                'foreign_key' => 'formula_item_id'
            ),
            'materialstocks' => array(
                'model' => 'materialstocklevel',
                'foreign_key' => 'stock_id'
            )
        );
        
}