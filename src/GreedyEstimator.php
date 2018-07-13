<?php

namespace Isinlor\GreedyBandit;

use Isinlor\GreedyBandit\Contract\Action;
use Webmozart\Assert\Assert;

/**
 * TODO: Add documentation.
 *
 * @author Tomasz Darmetko <tomasz.darmetko@gmail.com>
 */
class GreedyEstimator implements Contract\GreedyEstimator
{

    /**
     * @var Contract\Actions
     */
    private $actions;

    /**
     * @var float[]
     */
    private $actionsValues;

    /**
     * @var int[]
     */
    private $actionsRecordCounts;

    /**
     * GreedyEstimator constructor.
     *
     * @param Contract\Actions $actions
     * @param float $defaultValue
     */
    public function __construct(Contract\Actions $actions, float $defaultValue = 0)
    {

        Assert::notEmpty($actions->getAllIds());

        $this->actions = $actions;

        $defaults = array_fill(0, count($actions->getAllIds()), $defaultValue);
        $this->actionsValues = array_combine(
            $actions->getAllIds(),
            $defaults
        );
        $this->actionsRecordCounts = array_combine(
            $actions->getAllIds(),
            $defaults
        );

    }

    /**
     * TODO: Provide documentation.
     *
     * Based on "Reinforcement Learning: Introduction" page 24.
     *
     * @param Action $action
     * @param int $reward
     *
     * @return void
     */
    public function record(Action $action, int $reward): void
    {
        $recordCount =& $this->actionsRecordCounts[$action->getId()];
        $actionValue =& $this->actionsValues[$action->getId()];

        $recordCount++;
        $actionValue += (1 / $recordCount) * ($reward - $actionValue);
    }

    /**
     * TODO: Provide documentation.
     *
     * @return Action
     */
    public function getBestAction(): Action
    {
        $bestActionsIds = array_keys($this->actionsValues, max($this->actionsValues));
        $randomBestActionId = $bestActionsIds[random_int(0, count($bestActionsIds) - 1)];

        return $this->actions->getOneById($randomBestActionId);
    }

}