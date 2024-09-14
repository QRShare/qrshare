<?php

namespace App\Livewire\Components;

use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class TimeDifference extends Component
{
    public string $timestamp; // Input do usuário


    #[On('change-card')]
    public function updated($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function render()
    {
        return view('livewire.components.time-difference');
    }

    public function getTimeDifference()
    {
        if ($this->timestamp) {
            // Converte o timestamp para um objeto Carbon
            $userTime = Carbon::createFromTimestamp($this->timestamp);
            $now = Carbon::now();

            // Calcula a diferença
            $years = $userTime->diffInYears($now);
            $months = $userTime->diffInMonths($now) % 12;
            $days = $userTime->diffInDays($now) % 30;
            $hours = $userTime->diffInHours($now) % 24;
            $minutes = $userTime->diffInMinutes($now) % 60;
            $seconds = $userTime->diffInSeconds($now) % 60;

            return [
                'years' => $years,
                'months' => $months,
                'days' => $days,
                'hours' => $hours,
                'minutes' => $minutes,
                'seconds' => $seconds
            ];
        }

        return [
            'years' => 0,
            'months' => 0,
            'days' => 0,
            'hours' => 0,
            'minutes' => 0,
            'seconds' => 0
        ];
    }
}
