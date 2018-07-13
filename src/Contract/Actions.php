<?php

namespace Isinlor\GreedyBandit\Contract;

/**
 * TODO: Add documentation.
 *
 * @author Tomasz Darmetko <tomasz.darmetko@gmail.com>
 */
interface Actions
{
    /**
     * TODO: Provide documentation.
     *
     * @return string[]
     */
    public function getAllIds(): array;

    /**
     * TODO: Provide documentation.
     *
     * @param string $id
     *
     * @return Action
     */
    public function getOneById(string $id): Action;
}