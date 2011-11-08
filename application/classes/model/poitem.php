<?php
class Model_Poitem extends ORM {

        protected $_table_name  = 'purchase_order_item_tb';
        protected $_primary_key = 'po_item_id';
       
        protected $_has_many = array(
            'formulas' => array(
                'model' => 'formula',
                'foreign_key' => 'formula_id'
            ),
            'pwoitems' => array(
                'model' => 'pwoitem',
                'foreign_key' => 'pwo_item_id'
            ),
            'soitems' => array(
                'model' => 'soitem',
                'foreign_key' => 'so_item_id'
            )
        );
        
        protected $_belongs_to = array(
            'unitmaterials' => array(
                'model' => 'unitmaterialtype',
                'foreign_key' => 'unit_material'
            ),
            'purchaseorders' => array(
                'model' => 'po',
                'foreign_key' => 'po_id'
            )
        );
}