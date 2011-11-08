<?php
class Model_Pbt extends ORM {

        protected $_table_name  = 'production_batch_ticket_tb';
        protected $_primary_key = 'pbt_id';
     
        protected $_has_many = array(
            'pbtitems' => array(
                'model' => 'pbtitem',
                'foreign_key' => 'pbt_item_id'
            )
        );
        
        protected $_belongs_to = array(
            'pwoitems' => array(
                'model' => 'pwoitem',
                'foreign_key' => 'pwo_item_id'
            ),
            'formulas' => array(
                'model' => 'formula',
                'foreign_key' => 'formula_id'
            ),
            'productionstaff' => array(
                'model' => 'staff',
                'foreign_key' => 'production_staff_approved'
            ),
            'qa' => array(
                'model' => 'staff',
                'foreign_key' => 'qa_approved'
            ),
            'chemist' => array(
                'model' => 'staff',
                'foreign_key' => 'chemist_approved'
            ),
            'qahead' => array(
                'model' => 'staff',
                'foreign_key' => 'qa_head_approved'
            )
        );
}