<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Parent controller for Signatories module.
 * All controllers for signatories module extend this controller.
 * 
 * @category   Controller
 * @filesource classes/controller/cms/signatories.php
 * @package    OneRaimol Client
 * @author     DCDGLP
 * @copyright  (c) 2011 DCDGLP
 */
    class Controller_Cms_Signatories extends Controller_Cms {
        
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
            
            $this->template->title = 'Signatories | OneRaimol';
            
            $this->template->header = View::factory('common/header')
                                        ->set('topSelection', 'signatories')
                                        ->set('imgpath', $this->config['images'])
                                        ->set('img', $this->config['msg']['crumb']['img']['signatories'])
                                        ->set('pageDesc', $this->config['msg']['crumb']['desc']['signatories'])
                                        ->set('moduleURL', Constants_ModulePath::SIGNATORIES);
            
            $this->template->leftmenu = View::factory('common/leftmenu/signatories')
                                          ->set('moduleURL', Constants_ModulePath::SIGNATORIES)
                                          ->bind('leftSelection', $this->leftSelection);
            
            $this->template->body = View::factory('common/body')
                                          ->bind('pageSelectionDesc', $this->pageSelectionDesc);
            
            $this->template->formmessages = $this->_ajax_messages('formmessages');
            
            // Flag for module access
            $accessflag = FALSE;
            
            $pos = array (
                Constants_UserType::PRESIDENT,
                Constants_UserType::SALES_COORDINATOR,
                Constants_UserType::HEAD_CHEMIST,
                Constants_UserType::GENERAL_MANAGER,
                Constants_UserType::QUALITY_ASSURANCE_HEAD,
                Constants_UserType::QUALITY_ASSURANCE,
                Constants_UserType::INVENTORY_CONTROLLER,
                Constants_UserType::ACCOUNTANT,
                Constants_UserType::LABORATORY_ANALYST,
                Constants_UserType::PRODUCT_MANAGER
                
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