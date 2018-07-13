<?php

namespace Isinlor\GreedyBandit;

use Isinlor\GreedyBandit\Contract\Action;
use Isinlor\GreedyBandit\Contract\Agent;
use Isinlor\GreedyBandit\Contract\GreedyEstimator;
use Isinlor\GreedyBandit\Contract\RandomActionSelector;
use Webmozart\Assert\Assert;

/**
 * TODO: Add documentation.
 *
 * @author Tomasz Darmetko <tomasz.darmetko@gmail.com>
 */
class EpsilonGreedyAgent implements Agent
{

    private const EPSILON_MULTIPLIER = 10E4;

    /**
     * @var int
     */
    private $epsilon;

    /**
     * @var GreedyEstimator
     */
    private $estimator;

    /**
     * @var RandomActionSelector
     */
    private $actions;

    /**
     * EpsilonGreedyAgent constructor.
     *
     * @param float $epsilon Probability that
     * @param GreedyEstimator $estimator
     * @param RandomActionSelector $actions
     */
    public function __construct(float $epsilon, GreedyEstimator $estimator, RandomActionSelector $actions)
    {

        Assert::range($epsilon, 0, 1, "Epsilon expresses probability and must be between 0 and 1!");
        $this->epsilon = (int)($epsilon * self::EPSILON_MULTIPLIER);
        Assert::true(
            $epsilon == 0 || $epsilon == 1 || ($this->epsilon > 0 && $this->epsilon < self::EPSILON_MULTIPLIER),
            "Your epsilon: $epsilon was rounded to 0 or 1. Try lower precision."
        );

        $this->estimator = $estimator;
        $this->actions = $actions;

    }

    /**
     * TODO: Provide documentation.
     *
     * @return Action
     *
     * @throws \Exception
     */
    public function getAction(): Action
    {
        if ($this->epsilon > random_int(0, self::EPSILON_MULTIPLIER)) {
            return $this->actions->getRandom();
        }

        return $this->estimator->getBestAction();
    }

}