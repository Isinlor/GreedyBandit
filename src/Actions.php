<?php

namespace Isinlor\GreedyBandit;

use \Isinlor\GreedyBandit\Contract;
use Isinlor\GreedyBandit\Contract\Action;
use Webmozart\Assert\Assert;

/**
 * TODO: Add documentation.
 *
 * @author Tomasz Darmetko <tomasz.darmetko@gmail.com>
 */
class Actions implements Contract\Actions, COntract\RandomActionSelector
{

    /**
     * @var string[]
     */
    private $ids;

    /**
     * @var Action[]
     */
    private $actions;

    /**
     * Actions constructor.
     *
     * @param Action[] $actions
     */
    public function __construct(array $actions)
    {
        Assert::allIsInstanceOf($actions, Action::class);
        Assert::notEmpty($actions, "At least one action is required!");

        $ids = array_map(
            function (Action $action): string {
                return $action->getId();
            },
            $actions
        );

        Assert::true(count($ids) === count(array_unique($ids)), "All actions must have unique ids!");

        $this->ids = $ids;
        $this->actions = array_combine($ids, $actions);
    }

    /**
     * TODO: Provide documentation.
     *
     * @return string[]
     */
    public function getAllIds(): array
    {
        return $this->ids;
    }

    /**
     * TODO: Provide documentation.
     *
     * @param string $id
     *
     * @return Action
     */
    public function getOneById(string $id): Action
    {
        return $this->actions[$id];
    }

    /**
     * TODO: Provide documentation.
     *
     * @return Action
     *
     * @throws \Exception
     */
    public function getRandom(): Action
    {
        return $this->getOneById(
            $this->ids[random_int(0, count($this->ids) - 1)]
        );
    }

}