<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Products model.
 * 
 * @category   Model
 * @author     Gerona, John Michael D.
 * @copyright  (c) 2011 DCDGLP
 */
class Model_Product extends ORM {

        protected $_table_name  = 'product_tb';
        protected $_primary_key = 'product_id';
       
        protected  $_has_many = array(
            'productprice' => array(
                'model' => 'productprice',
                'foreign_key' => 'product_id'
            ),
            'poitems' => array(
                'model' => 'poitem',
                'foreign_key' => 'po_item_id'
            ),
            'productstocks' => array(
                'model' => 'productstock',
                'foreign_key' => 'product_id'
            )
        );

        protected $_belongs_to = array(
            'materialcategory' => array(
                'model' => 'materialcategory',
                'foreign_key' => 'material_category_id'
            )  
        );
        
        public function get_pk() {
            return 'PROD' . $this->pk();
        }
        
}