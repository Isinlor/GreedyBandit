<?php

namespace Isinlor\GreedyBandit\Contract;

/**
 * TODO: Add documentation.
 *
 * @author Tomasz Darmetko <tomasz.darmetko@gmail.com>
 */
interface GreedyEstimator extends Estimator
{
    /**
     * TODO: Provide documentation.
     *
     * @return Action
     */
    public function getBestAction(): Action;
}