<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test storing a survey with multiple-choice type.
     */
    public function test_store_with_multiple_choice_type()
    {
        $response = $this->post('/survey', [
            'type' => 'multiple-choice',
            'answer1' => 'Answer 1',
            'answer2' => 'Answer 2',
            'answer3' => 'Answer 3',
            'answer4' => 'Answer 4',
            'answer5' => 'Answer 5',
            'answer6' => 'Answer 6',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'question' => 'Sample question',
            'time' => 10,
        ]);

        $response->assertRedirect();

        // Add additional assertions as needed
    }

    /**
     * Test storing a survey with feedback type.
     */
    public function test_store_with_feedback_type()
    {
        $response = $this->post('/survey', [
            'type' => 'feedback',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'question' => 'Sample question',
            'time' => 10,
        ]);

        $response->assertRedirect();

        // Add additional assertions as needed
    }

    /**
     * Test storing a survey with wordcloud type.
     */
    public function test_store_with_wordcloud_type()
    {
        $response = $this->post('/survey', [
            'type' => 'wordcloud',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'question' => 'Sample question',
            'time' => 10,
        ]);

        $response->assertRedirect();

        // Add additional assertions as needed
    }
}