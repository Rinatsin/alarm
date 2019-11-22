<?php

namespace App\states;

// BEGIN (write your solution here)
class AlarmState
{
    private $alarm;

    public function __construct($alarm)
    {
        $this->alarm = $alarm;
    }

    public function clickMode()
    {
        $this->alarm->setState(ClockState::class);
    }

    public function clickH()
    {
        if ($this->alarm->getAlarmHours() === 23) {
            $this->alarm->alarmHours = 0;
        } else {
            $this->alarm->alarmHours += 1;
        }
    }

    public function clickM()
    {
        if ($this->alarm->getAlarmMinutes() === 59) {
            $this->alarm->alarmMinutes = 0;
        } else {
            $this->alarm->alarmMinutes += 1;
        }
    }

    public function tick()
    {
        if ($this->alarm->getMinutes() === 59) {
            $this->alarm->minutes = 0;
            if ($this->alarm->getHours() === 23) {
                $this->alarm->hours = 0;
            } else {
                $this->alarm->hours += 1;
            }
        } else {
            $this->alarm->minutes += 1;
        }
        //Alarm bell activate
        if ($this->alarm->isAlarmTime() && $this->alarm->isAlarmOn()) {
            $this->alarm->setState(BellState::class);
        }
    }

    public function getCurrentMode()
    {
        return 'alarm';
    }
}
// END

/* teacher
// BEGIN
class AlarmState implements State
{
    private $clock;
    private $mode = 'alarm';
    private $timeType = 'alarmTime';
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
        if ($this->clock->isAlarmTime() && $this->clock->isAlarmOn()) {
            $this->clock->setNextState(BellState::class);
        }
    }
}
// END
*/
