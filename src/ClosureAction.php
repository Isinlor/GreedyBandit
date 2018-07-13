<?php

namespace Isinlor\GreedyBandit;

use Isinlor\GreedyBandit\Contract\Action;

/**
 * TODO: Add documentation.
 *
 * @author Tomasz Darmetko <tomasz.darmetko@gmail.com>
 */
class ClosureAction implements Action
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var \Closure
     */
    private $closure;

    /**
     * ClosureAction constructor.
     *
     * @param string $id
     * @param \Closure $closure
     */
    public function __construct(string $id, \Closure $closure)
    {
        $this->id = $id;
        $this->closure = $closure;
    }

    /**
     * TODO: Provide documentation.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * TODO: Provide documentation.
     *
     * @return mixed
     */
    public function execute()
    {
        return ($this->closure)();
    }

}