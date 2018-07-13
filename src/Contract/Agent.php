<?php

namespace Isinlor\GreedyBandit\Contract;

/**
 * TODO: Add documentation.
 *
 * @author Tomasz Darmetko <tomasz.darmetko@gmail.com>
 */
interface Agent
{

    /**
     * TODO: Provide documentation.
     *
     * @return Action
     */
    public function getAction(): Action;

}