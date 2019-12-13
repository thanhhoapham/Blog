<?php


namespace Blog\Blog\Controller\Adminhtml\Post;


use Magento\Framework\Controller\ResultFactory;

class Upload extends \Magento\Backend\App\Action
{
    protected $imageUploader;
    /**
     * Upload constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Blog\Blog\Model\ImageUploader $imageUploader
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Blog\Blog\Model\ImageUploader $imageUploader
    )
    {
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }

    /**
     * Upload file controller action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $result = $this->imageUploader->saveFileToTmpDir('thumbnail');

            $result['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }

}