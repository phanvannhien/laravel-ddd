<?php
declare(strict_types=1);

namespace Fractal\Article\Infrastructure\Http\Controller;

use Fractal\Share\Http\DomainController;
use Illuminate\Http\Request;

use Fractal\Article\Domain\Model\Article\ArticleRepository;

class ArticleController extends DomainController{
    public function getAllArticle( ArticleRepository $repo  ){
       
        dd( $repo->getAllArticle() );
    }
    public function getArticle(  ArticleRepository $repo , $id ){
       
        dd( $repo->getArticle( (int)$id ) );
    }

}