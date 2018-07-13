<?php

namespace Isinlor\GreedyBandit\Contract;

/**
 * TODO: Add documentation.
 *
 * @author Tomasz Darmetko <tomasz.darmetko@gmail.com>
 */
interface Estimator
{
    /**
     * TODO: Provide documentation.
     *
     * @param Action $action
     * @param int $reward
     *
     * @return void
     */
    public function record(Action $action, int $reward): void;
}