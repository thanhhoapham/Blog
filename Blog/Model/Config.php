<?php


namespace Blog\Blog\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    public function __construct(
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
    }
    public function getBlogTitle($store = null)
    {
        return $this->scopeConfig->getValue(
            'blog_config/general/menu_title',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $store
            );
    }
    public function isDisplayInMenu()
    {
        return $this->scopeConfig->getValue('blog_config/general/state_dropdown',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
    }
}