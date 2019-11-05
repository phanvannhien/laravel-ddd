<?php
declare(strict_types=1);

namespace Fractal\Article\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Fractal\Article\Domain\Model\Article\Article;
use Fractal\Article\Domain\Model\Article\ArticleRepository;

class DoctrineArticleRepository extends EntityRepository implements ArticleRepository
{
    public function getAllArticle()
    {
        return $this->findAll();
    }



    public function getArticle(int $id ): Article
    {
        $article = $this->findOneBy(['id' => $id]);

        if (null === $article) {
            throw new \InvalidArgumentException('Invalid user id');
        }

        return $article;
    }
}
