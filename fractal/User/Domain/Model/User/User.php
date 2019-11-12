<?php
namespace Fractal\User\Domain\Model\User;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="Fractal\User\Infrastructure\Persistence\Doctrine\DoctrineUserRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="users")
 */
class User implements \Illuminate\Contracts\Auth\Authenticatable
{
    use \LaravelDoctrine\ORM\Auth\Authenticatable;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $email;

     /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     * @var datetime
     */
    private $created_at;

     /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     * @var datetime
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="Fractal\Article\Domain\Model\Article\Article", mappedBy="user")
     * @var ArrayCollection
     */
    private $articles;

    public function __construct(
        string $name,
        string $email,
        string $password,
        string $remember_token = null,
        ArrayCollection $articles = null
    ) {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setRememberToken($remember_token);
        if (!$articles) {
            $this->setArticles(new ArrayCollection());
        } else {
            $this->setArticles($articles);
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRememberToken(): string
    {
        return $this->remember_token;
    }
    
    public function getArticles() 
    {
        return $this->articles;
    }

    public function changeEmail(string $email)
    {
        $this->setEmail($email);
    }

    public function changeArticles(ArrayCollection $articles)
    {
        $this->setArticles($articles);
    }

    public function changePassword(string $password)
    {
        $this->setPassword($password);
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getId();
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail()
        ];
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function setArticles(ArrayCollection $articles) {
        $this->articles = $articles;
    }

}