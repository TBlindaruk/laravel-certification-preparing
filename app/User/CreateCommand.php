<?php
declare(strict_types = 1);

namespace App\User;

use App\Model\ModelFactory;
use App\Model\User;
use Illuminate\Container\Container;

/**
 * Class CreateUserCommand
 *
 * @package App\User
 */
class CreateCommand
{
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var string
     */
    private $password;
    
    /**
     * @var string
     */
    private $email;
    
    /**
     * CreateUserCommand constructor.
     *
     * @param string $name
     * @param string $password
     * @param string $email
     */
    public function __construct(string $name, string $password, string $email)
    {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }
    
    /**
     * @return User
     */
    public function execute(): User
    {
        /** @var ModelFactory $modelFactory */
        $modelFactory = Container::getInstance()->make(ModelFactory::class);
        /** @var User $user */
        $user = $modelFactory->getModel(User::class);
        $user->password = $this->password;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        
        $user->createToken('App');
        
        return $user;
    }
}
