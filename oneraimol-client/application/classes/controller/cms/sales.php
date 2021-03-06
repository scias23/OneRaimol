<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Parent controller for Sales module.
 * All controllers for sales module extend this controller.
 * 
 * @category   Controller
 * @filesource classes/controller/cms/sales.php
 * @package    OneRaimol Client
 * @author     DCDGLP
 * @copyright  (c) 2011 DCDGLP
 */
    class Controller_Cms_Sales extends Controller_Cms {
        
        /**
         * @var leftSelection The left menu indicator of "selected" CSS class of current controller/action.
         */
        protected $leftSelection;
        
        /**
         * @var pageSelectionDesc The string identifier of a displayed page. 
         */
        protected $pageSelectionDesc;
        
        /**
         * Automatically executed before the controller action.
         * Page initialization takes place here.
         * 
         * @param boolean $ssl_required The HTTP request. Whether unsecured or secured HTTP.
         */
        public function before($ssl_required = FALSE) {
            $this->template = 'common/cmschild';
            parent::before($ssl_required);
            
            $this->template->title = 'Sales | OneRaimol';
            
            $this->template->header = View::factory('common/header')
                                        ->set('topSelection', 'sales')
                                        ->set('imgpath', $this->config['images'])
                                        ->set('img', $this->config['msg']['crumb']['img']['sales'])
                                        ->set('pageDesc', $this->config['msg']['crumb']['desc']['sales'])
                                        ->set('moduleURL', Constants_ModulePath::SALES);
            
            $this->template->leftmenu = View::factory('common/leftmenu/sales')
                                          ->set('moduleURL', Constants_ModulePath::SALES)
                                          ->bind('leftSelection', $this->leftSelection);
            
            $this->template->body = View::factory('common/body')
                                          ->bind('pageSelectionDesc', $this->pageSelectionDesc);
            
            $this->template->formmessages = $this->_ajax_messages('formmessages');
            
            // Flag for module access
            $accessflag = FALSE;
            
            $pos = array (
                Constants_UserType::PRESIDENT, 
                Constants_UserType::SALES_COORDINATOR,
                Constants_UserType::GENERAL_MANAGER,
                Constants_UserType::ACCOUNTANT,
                Constants_UserType::ADMIN
                
            );
            
            foreach($pos as $position) {
                $accessflag = Helper_Helper::check_access_right($this->session->get('roles'), $position);
                if($accessflag == TRUE) break;
            }
            // Prevent access if role is not listed
            if(!$accessflag) {
                Request::current()->redirect(
                    URL::site( 'cms' , $this->_protocol )
                );
            }
        }
    }