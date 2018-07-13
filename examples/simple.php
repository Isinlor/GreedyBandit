<?php

use Isinlor\GreedyBandit\Actions;
use Isinlor\GreedyBandit\ClosureAction;
use Isinlor\GreedyBandit\EpsilonGreedyAgent;
use Isinlor\GreedyBandit\GreedyEstimator;

require_once __DIR__ . "/../vendor/autoload.php";

$action1 = new ClosureAction(1, function () {
    return random_int(0, 10);
});

$action2 = new ClosureAction(2, function () {
    return random_int(1, 10);
});

$actions = new Actions([
    $action1,
    $action2,
]);

$estimator = new GreedyEstimator($actions, 10);

$agent = new EpsilonGreedyAgent(0.01, $estimator, $actions);

$rewards = [];
$count = array_combine($actions->getAllIds(), array_fill(0, count($actions->getAllIds()), 0));
for ($i = 0; $i < 10000; $i++) {
    $action = $agent->getAction();
    $reward = $action->execute();

    $count[$action->getId()]++;
    $rewards[] = $reward;
    // echo "Step:" . str_pad($i, 4, ' ') . " action: {$action->getId()}, reward: $reward\n";

    $estimator->record($action, $reward);
}

ksort($count);
print_r($count);
$avgReward = array_sum($rewards) / count($rewards);
echo "Average reward: $avgReward";