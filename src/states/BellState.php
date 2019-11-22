<?php

namespace App\states;

// BEGIN (write your solution here)
class BellState
{
    private $bell;

    public function __construct($bell)
    {
        $this->bell = $bell;
    }

    public function clickMode()
    {
        $this->bell->setState(ClockState::class);
    }

    public function clickH()
    {
        return false;//deactivated then bell call
    }

    public function clickM()
    {
        return false;//deactivated then bell call
    }

    public function tick()
    {
        if ($this->bell->getMinutes() === 59) {
            $this->bell->minutes = 0;
            if ($this->bell->getHours() === 23) {
                $this->bell->hours = 0;
            } else {
                $this->bell->clickH();
            }
        } else {
            $this->bell->clickM();
        }

        //off bell signal
        $this->bell->setState(ClockState::class);
    }

    public function getCurrentMode()
    {
        return 'bell';
    }
}
// END

/*
<?php

namespace App\states;

// BEGIN
class BellState implements State
{
    private $clock;
    private $mode = 'bell';
    private $nextStateClass = ClockState::class;

    public function __construct($clock)
    {
        $this->clock = $clock;
    }

    public function getNextStateClassName()
    {
        return $this->nextStateClass;
    }

    public function getModeName()
    {
        return $this->mode;
    }

    public function tick()
    {
        $this->clock->setNextState();
    }

    public function incrementH()
    {
        return false;
    }

    public function incrementM()
    {
        return false;
    }
}
// END
*/