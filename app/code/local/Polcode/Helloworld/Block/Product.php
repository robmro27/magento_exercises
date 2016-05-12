<?php

class Polcode_Helloworld_Block_Product 
    extends Mage_Core_Block_Template
{
        protected $currentPage = null;
        protected $limit = 1;
        protected $size = null;
        
        protected $dateFrom = null;
        protected $dateTo = null;

        protected function _construct()
        {
            $this->currentPage = $this->getRequest()->getParam('page');
            if (!$this->currentPage) {
                $this->currentPage = 1;
            }
            
            $this->dateFrom = date('Y-m-d H:i', strtotime( $this->getRequest()->getParam('date_from')));
            $this->dateTo = date('Y-m-d H:i', strtotime($this->getRequest()->getParam('date_to')));
            
        }

        
        public function getCollection()
        {
            $collection = Mage::getModel('helloworld/product')->getCollection()
                                    ->setPageSize($this->limit)
                                    ->setCurPage($this->currentPage);
            
            if ($this->getRequest()->isGet()) {
                $collection->addFieldToFilter('order_date', array(
                    'from' => $this->dateFrom,
                    'to' => $this->dateTo,
                    'date' => true,
                ));
            }
            
            $this->size = $collection->getSize();
            
            return $collection;
        }

        
        public function isFirstPage() {
            
            if ($this->currentPage == 1) {
                return true;
            }
            return false;
            
        }
        
        public function isLastPage() {
            
            if ($this->currentPage == ceil($this->size / $this->limit ) ) {
                return true;
            }
            return false;
        }
        
        
        
        
        public function getPrevPageUrl()
        {
            $page = $this->currentPage - 1;
            return $this->getPageUrl($page);
        }
        
        
        
        
        public function getNextPageUrl()
        {
            $page = $this->currentPage + 1;
            return $this->getPageUrl($page);
        }
        
        
        
        
        public function getPageUrl($page)
        {
            $urlParams = array();
            $urlParams['_current']  = true;
            $urlParams['_escape']   = true;
            $urlParams['_use_rewrite']   = true;
            $urlParams['_query']    = ['page' => $page];
            return $this->getUrl('*/*/*', $urlParams);
        }

    
}
