<?php


namespace Blog\Blog\Model\Post;


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
        \Blog\Blog\Model\ResourceModel\Post\CollectionFactory $collectionFactory,
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
        $baseurl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collectionFactory->create();
        foreach ($items as $page) {
            $this->loadedData[$page->getId()] = $page->getData();
//            $temp = $page->getData();
//            if ($temp['thumbnail']):
//                $img = [];
//                $img[0]['thumbnail'] = $temp['thumbnail'];
//                $img[0]['url'] = $baseurl . 'blog/' . $temp['thumbnail'];
//                $temp['logo'] = $img;
//            endif;
        }
        $data = $this->dataPersistor->get('blog_post');
//        var_dump($data);
        if (!empty($data)) {
            $page = $this->collectionFactory->create();
            $page = $this->setData($data);
            $this->loadedData[$page->getId()] = $page->getData();
            $this->dataPersistor->clear('blog_post');
        }
//        else {
//            if ($items):
//                if ($page->getData('thumbnail') != null) {
//                    $t2[$page->getId()] = $temp;
//                    return $t2;
//                } else {
//                    return $this->loadedData;
//                }
//            endif;
//        }
//        var_dump($this->loadedData);die;
        return $this->loadedData;
    }

    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        return null;
    }

    protected function _afterLoad()
    {
        $entityMetadata = $this->metadataPool->getMetadata(PostInterface::class);
        $this->performAfterLoad('blog_post', $entityMetadata->getLinkField());
        $this->_previewFlag = false;

        return parent::_afterLoad();
    }
}