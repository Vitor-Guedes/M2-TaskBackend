<?php

namespace Hibridi\Seo\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\App\ObjectManager;
use Magento\Cms\Model\Page;

class SeoLanguage extends Template
{
    /** @var Page $_cmsPage */
    protected $_cmsPage;

    public function __construct(Context $context, array $data = [], Page $page)
    {
        parent::__construct($context, $data);
        $this->_cmsPage = $page;
    }

    /**
     * @return array
     */
    public function getAllCodes()
    {
        $scopeConfig = ObjectManager::getInstance()->get(
            'Magento\Framework\App\Config\ScopeConfigInterface'
        );

        $locale = [];
        if (count($this->_cmsPage->getStoreId()) > 1) {
            /** @var array $storeIds */
            $storeIds = $this->_cmsPage->getStoreId();
            foreach ($storeIds as $storeId) {
                $code = $scopeConfig->getValue(
                    'general/locale/code',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
                    $storeId
                );
                $locale[] = $this->formatCode($code);
            }
        }

        return $locale;
    }

    /**
     * @param string $code
     */
    public function formatCode(string $code)
    {
        $code = str_replace("_", "-", $code);
        return strtolower($code);
    }

    /**
     * @return string
     */
    public function getCurrentUrl()
    {
        return $this->getRequest()->getUriString();
    }
}