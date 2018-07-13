<?php

namespace Isinlor\GreedyBandit\Contract;

/**
 * TODO: Add documentation.
 *
 * @author Tomasz Darmetko <tomasz.darmetko@gmail.com>
 */
interface RandomActionSelector
{
    /**
     * TODO: Provide documentation.
     *
     * @return Action
     */
    public function getRandom(): Action;
}