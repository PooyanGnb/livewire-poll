<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Component;

class Polls extends Component
{
    protected $listeners = [
        'poll-created' => 'render'
    ];
    
    public function render()
    {
        // this is equivalent to title and options in creatPolls.php
        $polls = Poll::with('options.votes')->latest()->get();
        return view('livewire.polls', ['polls' => $polls]);
    }


    public function vote(Option $option)
    {
        $option->votes()->create();
    }
}
