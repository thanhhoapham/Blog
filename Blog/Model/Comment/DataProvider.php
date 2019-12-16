<?php


namespace Blog\Blog\Model\Comment;

use Blog\Blog\Model\Comment;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;

class DataProvider extends \Magento\Ui\DataProvider\ModifierPoolDataProvider
{
    protected $collectionFactory;
    protected $dataPersistor;
    protected $loadedData;
    public $_storeManager;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Blog\Blog\Model\ResourceModel\Comment\CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null)
    {
        $this->collectionFactory = $collectionFactory;
        $this->dataPersistor = $dataPersistor;
        $this->meta = $this->prepareMeta($this->meta);
        $this->_storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);

    }

    public function prepareMeta(array $meta)
    {
        return $meta;
    }

    public function getMeta()
    {
        return parent::getMeta();
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collectionFactory->create();
        foreach ($items as $page) {
            $this->loadedData[$page->getId()] = $page->getData();
        }
        $data = $this->dataPersistor->get('blog_comment');
//        var_dump($data);
        if (!empty($data)) {
            $page = $this->collectionFactory->create();
            $page = $this->setData($data);
            $this->loadedData[$page->getId()] = $page->getData();
            $this->dataPersistor->clear('blog_comment');
        }
        return $this->loadedData;
    }

    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        return null;
    }

    protected function _afterLoad()
    {
        $entityMetadata = $this->metadataPool->getMetadata(CommentInterface::class);
        $this->performAfterLoad('blog_comment', $entityMetadata->getLinkField());
        $this->_previewFlag = false;

        return parent::_afterLoad();
    }
}