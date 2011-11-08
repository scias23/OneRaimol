<?php
class Model_Formula extends ORM {

        protected $_table_name  = 'formula_tb';
        protected $_primary_key = 'formula_id';
        
        protected $_has_many = array(
            'productionbatchtickets' => array(
                'model' => 'pbt',
                'foreign_key' => 'pbt_id'
            )
        );
        
        protected $_belongs_to = array(
            'poitems' => array(
                'model' => 'poitem',
                'foreign_key' => 'po_item_id'
            )  
        );
        
}