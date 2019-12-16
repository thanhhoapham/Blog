<?php


namespace Blog\Blog\Api\Data;


interface CommentInterface
{
    const COMMENT_ID = "comment_id";
    const COMMENT_CONTENT = "comment_content";
    const POST_ID = "post_id";

    public function getId();

    public function getCommentContent();

    public function getPostId();

    public function setCommentContent($commentContent);

    public function setPostId($postId);

}