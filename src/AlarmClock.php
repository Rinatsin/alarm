<?php

namespace App;

// BEGIN (write your solution here)
class AlarmClock
{
    private $state;

    public function __construct()
    {
        $this->hours = 12;
        $this->alarmHours = 6;
        $this->minutes = 0;
        $this->alarmMinutes = 0;
        $this->alarmOn = false;
        $this->setState(states\ClockState::class);
    }

    public function clickMode()
    {
        $this->state->clickMode();
    }

    public function longClickMode()
    {
        $this->alarmOn ? $this->alarmOn = false : $this->alarmOn = true;
    }

    public function clickH()
    {
        $this->state->clickH();
    }

    public function clickM()
    {
        $this->state->clickM();
    }

    public function tick()
    {
        $this->state->tick();
    }

    public function isAlarmOn()
    {
        return $this->alarmOn;
    }

    public function isAlarmTime()
    {
        return (
            $this->getHours() === $this->getAlarmHours() &&
            $this->getMinutes() === $this->getAlarmMinutes()
            );
    }

    public function getMinutes()
    {
        return $this->minutes;
    }

    public function getHours()
    {
        return $this->hours;
    }

    public function getAlarmMinutes()
    {
        return $this->alarmMinutes;
    }

    public function getAlarmHours()
    {
        return $this->alarmHours;
    }

    public function setState($className)
    {
        $this->state = new $className($this);
    }

    public function getCurrentMode()
    {
        return $this->state->getCurrentMode();
    }
}

/* teacher
// BEGIN
class AlarmClock
{
    private $clockTime = ['minutes' => 0, 'hours' => 12];
    private $alarmTime = ['minutes' => 0, 'hours' => 6];
    private $alarmOn = false;

    public function __construct()
    {
        $this->setNextState(states\ClockState::class);
    }

    public function clickMode()
    {
        $this->setNextState($this->state->getNextStateClassName());
    }

    public function longClickMode()
    {
        $this->alarmOn = !$this->alarmOn;
    }

    public function clickH()
    {
        $this->state->incrementH();
    }

    public function clickM()
    {
        $this->state->incrementM();
    }

    public function tick()
    {
        $this->incrementM('clockTime');
        if ($this->clockTime['minutes'] === 0) {
            $this->incrementH('clockTime');
        }
        $this->state->tick();
    }

    public function isAlarmOn()
    {
        return $this->alarmOn;
    }

    public function isAlarmTime()
    {
        return $this->clockTime['minutes'] === $this->alarmTime['minutes']
            && $this->clockTime['hours'] === $this->alarmTime['hours'];
    }

    public function getMinutes()
    {
        return $this->clockTime['minutes'];
    }

    public function getHours()
    {
        return $this->clockTime['hours'];
    }

    public function getAlarmMinutes()
    {
        return $this->alarmTime['minutes'];
    }

    public function getAlarmHours()
    {
        return $this->alarmTime['hours'];
    }

    public function setNextState($className = null)
    {
        $className = $className ?? $this->state->getNextStateClassName();
        $this->state = new $className($this);
    }

    public function getCurrentMode()
    {
        return $this->state->getModeName();
    }

    public function incrementH($timeType)
    {
        $hoursCount = $this->$timeType['hours'];
        $this->$timeType['hours'] = ($hoursCount + 1) % 24;
    }

    public function incrementM($timeType)
    {
        $minutesCount = $this->$timeType['minutes'];
        $this->$timeType['minutes'] = ($minutesCount + 1) % 60;
    }
}
// END
*/
