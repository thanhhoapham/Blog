<?php


namespace Blog\Blog\Api\Data;


interface PostInterface
{
    const POST_ID = "post_id";
    const TITLE = "title";
    const SHORT_DESCRIPTION = "short_description";
    const POST_CONTENT = "post_content";
    const STATUS = "status";
    const THUMBNAIL = "thumbnail";
    const START_DATE = "publish_date_from";
    const FINISH_DATE = "publish_date_to";
    const POST_URL = "post_url";

    public function getId();

    public function getTitle();

    public function getShortDescription();

    public function getPostContent();

    public function getStatus();

    public function getThumbnail();

    public function getPublishDateTo();

    public function getPublishDateFrom();

    public function getPostUrl();

    public function setId($id);

    public function setTitle($title);

    public function setShortDescription($shortDescription);

    public function setPostContent($postContent);

    public function setStatus($status);

    public function setThumbnail($thumbnail);

    public function setPublishDateTo($publishDateTo);

    public function setPublishDateFrom($publishDateFrom);

    public function setPostUrl($postUrl);

}