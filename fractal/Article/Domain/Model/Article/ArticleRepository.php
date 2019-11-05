<?php
namespace Fractal\Article\Domain\Model\Article;

interface ArticleRepository{
    public function getAllArticle();
    public function getArticle(int $id);
}