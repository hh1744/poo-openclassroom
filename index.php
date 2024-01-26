<?php

const RESULT_WINNER = 1;
const RESULT_LOSER = -1;
const RESULT_DRAW = 0;
const RESULT_POSSIBILITIES = [RESULT_WINNER, RESULT_LOSER, RESULT_DRAW];

class Encounter{



    public function probabilityAgainst(int $levelPlayerOne, int $againstLevelPlayerTwo) : float
    {
        return 1/(1+(10 ** (($againstLevelPlayerTwo - $levelPlayerOne)/400)));
    }

    public function setNewLevel(int &$levelPlayerOne, int $againstLevelPlayerTwo, int $playerOneResult)
    {
        if (!in_array($playerOneResult, RESULT_POSSIBILITIES)) {
            trigger_error(sprintf('Invalid result. Expected %s',implode(' or ', RESULT_POSSIBILITIES)));
        }

        $levelPlayerOne += (int) (32 * ($playerOneResult - $this->probabilityAgainst($levelPlayerOne, $againstLevelPlayerTwo)));
    }
}

$obj = new Encounter();

$greg = 400;
$jade = 800;

echo sprintf(
        'Greg a %.2f%% chance de gagner face a Jade',
        $obj->probabilityAgainst($greg, $jade)*100
    ).PHP_EOL.'<br/>';

// Imaginons que greg l'emporte tout de m�me.
$obj->setNewLevel($greg, $jade, RESULT_WINNER);
$obj->setNewLevel($jade, $greg, RESULT_LOSER);

echo sprintf(
    'les niveaux des joueurs ont evolues vers %s pour Greg et %s pour Jade',
    $greg,
    $jade
);

exit(0);