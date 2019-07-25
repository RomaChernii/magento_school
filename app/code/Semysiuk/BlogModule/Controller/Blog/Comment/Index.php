<?php

namespace Semysiuk\BlogModule\Controller\Blog\Comment;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Semysiuk\BlogModule\Model\CommentFactory;
use Semysiuk\BlogModule\Api\CommentRepositoryInterface;


class Index extends Action
{
    const COMMENT_SUCCESS_URL = "semysiuk_blogmodule/blog_post/view";

    protected $commentFactory;

    protected $commentRepository;

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

//    public function __construct(
//        Context $context,
//        CommentFactory $commentFactory,
//        CommentRepositoryInterface $commentRepository
//    ){
//        $this->commentFactory = $commentFactory;
//        $this->commentRepository = $commentRepository;
//        parent::__construct($context);
//    }

    public function execute()
    {
        //echo "Hello World from Home";

        $data =  $this->getRequest()->getPostValue();
//
//        print_r($data);

        //$model = $this->commentFactory->create();
        //$model->setData($data);

        //$this->commentRepository->save($model);

        //exit();

        $resultRedirect = $this->resultRedirectFactory->create();

//        $data = $this->getRequest()->getPostValue();
//
//        if ($data)
//        {
//            $model = $this->commentFactory->create();
//
//            $model->setData($data);
//
//            v
//        }

        $resultRedirect->setPath(static::COMMENT_SUCCESS_URL, ['id' => $data->getPostId()]);
//
        return $resultRedirect;
    }
}
