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
        $this->findAll();
    }


    public function ofId(int $id ): Article
    {
        $article = $this->find($id);

        if (null === $article) {
            throw new \InvalidArgumentException('Invalid user id');
        }

        return $article;
    }
}
