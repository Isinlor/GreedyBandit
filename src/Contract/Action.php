<?php

namespace Isinlor\GreedyBandit\Contract;

/**
 * TODO: Add documentation.
 *
 * @author Tomasz Darmetko <tomasz.darmetko@gmail.com>
 */
interface Action
{
    /**
     * TODO: Provide documentation.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * TODO: Provide documentation.
     *
     * @return mixed
     */
    public function execute();
}