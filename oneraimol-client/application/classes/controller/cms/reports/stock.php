<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Controller for Stocks Report functionality of
 * Report module.
 *  
 * @category   Controller
 * @author     Laban, John Emmanuel B.
 * @copyright  (c) 2011 DCDGLP
 */
    class Controller_Cms_Reports_Stock extends Controller_Cms_Reports {
        /**
         * @var ORM customer Holds the customer record from the DB.
         * @access private
         */
        private $materialstocklevel;  
        
        /**
         * Automatically executed before the controller action.
         * Page initialization takes place here.
         * 
         * @param boolean $ssl_required The HTTP request. Whether unsecured or secured HTTP.
         */
        public function before($ssl_required = FALSE) {
            parent::before($ssl_required);
            
            $this->leftSelection = $this->config['msg']['leftselection']['stock'];
            
        }

        public function action_generatepdf() {
            require Kohana::find_file('vendor/dompdf', 'dompdf/dompdf_config.inc');
            
            $this->materialstocklevel = ORM::factory('materialstocklevel')
                            //->where('um_id' ,'=', Helper_Helper::decrypt($record))
                            ->find_all();  
            
            $html = View::factory('cms/reports/inventory/stock/formreport')
                           ->set('materialstocklevel', $this->materialstocklevel);      
            
            $html->render();

            $dompdf = new DOMPDF();
            $dompdf->load_html($html);
            $dompdf->set_paper("a4", "portrait");
            $dompdf->render();
            $dompdf->stream("sample.pdf", array('Attachment' => 0));
        }
    }
    