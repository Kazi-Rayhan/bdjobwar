<?php

namespace App\Services;

use App\Models\Exam;

class Revaluation
{

    public static function getAnswers(Exam $exam): array
    {
        $correct_answers = [];
        foreach ($exam->questions as $question) {
            $correct_answers[$question->id] = $question->answer;
        }
        return $correct_answers;
    }

    public static function evaluate(Exam $exam, $result)
    {
        $student_answers = $result->getAnswers();
        $correct_answers = self::getAnswers($exam);
        $emptyAnswers = count(array_diff_key($correct_answers, $student_answers));
        $wrongAnswers = count(array_diff_assoc($correct_answers, $student_answers)) - $emptyAnswers;
        $correctAnswers = count($student_answers) - $wrongAnswers;
        $total_point = $correctAnswers - ($wrongAnswers * $exam->minius_mark);
        $result->update([
            'empty_answers' => $emptyAnswers,
            'wrong_answers' => $wrongAnswers,
            'total' => $total_point
        ]);
        return $result;
    }
}
