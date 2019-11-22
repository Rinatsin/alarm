<?php

namespace App\states;

// BEGIN (write your solution here)
class ClockState
{
    private $clock;

    public function __construct($clock)
    {
        $this->clock = $clock;
    }

    public function clickMode()
    {
        $this->clock->setState(AlarmState::class);
    }

    public function clickH()
    {
        if ($this->clock->getHours() === 23) {
            $this->clock->hours = 0;
        } else {
            $this->clock->hours += 1;
        }
    }

    public function clickM()
    {
        if ($this->clock->getMinutes() === 59) {
            $this->clock->minutes = 0;
            if ($this->clock->getHours() === 23) {
                $this->clock->hours = 0;
            } else {
                $this->clock->hours += 1;
            }
        } else {
            $this->clock->minutes += 1;
        }
    }

    public function tick()
    {
        $this->clock->clickM();
        //Alarm bell activate
        if ($this->clock->isAlarmTime() && $this->clock->isAlarmOn()) {
            $this->clock->setState(BellState::class);
        }
    }

    public function getCurrentMode()
    {
        return 'clock';
    }
}
// END

/* teacher
<?php

namespace App\states;

// BEGIN
class ClockState implements State
{
    private $clock;
    private $mode = 'clock';
    private $timeType = 'clockTime';
    private $nextStateClass = AlarmState::class;

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

    public function incrementH()
    {
        $this->clock->incrementH($this->timeType);
    }

    public function incrementM()
    {
        $this->clock->incrementM($this->timeType);
    }

    public function tick()
    {
        if ($this->clock->isAlarmOn() && $this->clock->isAlarmTime()) {
            $this->clock->setNextState(BellState::class);
        }
    }
}
// END
*/