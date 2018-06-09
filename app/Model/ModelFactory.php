<?php
declare(strict_types = 1);

namespace App\Model;

use Illuminate\Contracts\Container\Container;

/**
 * Class ModelFactory
 *
 * @package App\Model
 */
class ModelFactory
{
    /**
     * @var Container
     */
    private $container;
    
    /**
     * ModelFactory constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    
    /**
     * @param string $alias
     *
     * @return mixed
     */
    public function getModel(string $alias)
    {
        return $this->container->make($alias);
    }
}