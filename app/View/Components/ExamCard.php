<?php

namespace App\View\Components;

use App\Models\Exam;
use Illuminate\View\Component;

class ExamCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $exam;
    public function __construct(Exam $exam)
    {
        $this->exam = $exam;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.exam-card');
    }
}
