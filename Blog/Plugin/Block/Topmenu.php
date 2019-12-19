<?php


namespace Blog\Blog\Plugin\Block;

use Magento\Framework\Data\Tree\NodeFactory;
use Blog\Blog\Model\Config;

class Topmenu
{
    /**
     * @var NodeFactory
     */
    protected $nodeFactory;
    protected $config;
    public function __construct(
        NodeFactory $nodeFactory,
        Config $config
    )
    {
        $this->nodeFactory = $nodeFactory;
        $this->config = $config;
    }

    /**
     *
     * Inject node into menu.
     **/
    public function beforeGetHtml(
        \Magento\Theme\Block\Html\Topmenu $subject,
        $outermostClass = '',
        $childrenWrapClass = '',
        $limit = 0
    )
    {
        $node = $this->nodeFactory->create(
            [
                'data' => $this->getNodeAsArray(),
                'idField' => 'id',
                'tree' => $subject->getMenu()->getTree()
            ]
        );
        $subject->getMenu()->addChild($node);
    }

    /**
     *
     * Build node
     **/
    protected function getNodeAsArray()
    {
        if(!$this->config->isDisplayInMenu()) {
            return null;
        }
        return [
            'name' => __($this->config->getBlogTitle()),
            'id' => 'blog',
            'url' => '/blog/post',
            'has_active' => true,
            'is_active' => true
        ];
    }
}