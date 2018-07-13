<?php

/**
 * Setup default console arguments. Each argument can be overwritten manually from console.
 * More info: http://kahlan.readthedocs.io/en/latest/config-file/
 */

/** @var \Kahlan\Cli\CommandLine $args */
$args = $this->commandLine();

// Set Fast fail option to 1 - fail on first issue
$args->option('ff', 'default', 1);
$args->option('reporter', 'default', 'verbose');
