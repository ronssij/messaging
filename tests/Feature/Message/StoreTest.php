<?php

namespace Tests\Feature\Message;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class StoreTest extends TestCase
{
    // use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function validateRequiredFields()
    {
        $this->postJson(route('message.store', [
            'conversation_id' => null,
        ]))
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonStructure([ 'errors' =>  ['message', 'conversation_id']])
        ->assertSee('The message field is required. (and 1 more error)');

    }

    /** @test */
    public function inContextWelcomeMessage()
    {
        $this->postJson(route('message.store', [
            'conversation_id' => '1234ABC',
            'message' => 'Hi, I am CJ'
        ]))
        ->assertStatus(Response::HTTP_CREATED)
        ->assertSee('Welcome to StationFive');

        $this->postJson(route('message.store', [
            'conversation_id' => '1234ABC',
            'message' => 'Hi!, I am CJ'
        ]))
        ->assertStatus(Response::HTTP_CREATED)
        ->assertSee('Welcome to StationFive');

        $this->postJson(route('message.store', [
            'conversation_id' => '1234ABC',
            'message' => 'Hello, I am CJ'
        ]))
        ->assertStatus(Response::HTTP_CREATED)
        ->assertSee('Welcome to StationFive');

        $this->postJson(route('message.store', [
            'conversation_id' => '1234ABC',
            'message' => 'Hello!!, I am CJ'
        ]))
        ->assertStatus(Response::HTTP_CREATED)
        ->assertSee('Welcome to StationFive');

    }

    /** @test */
    public function inContextGoodbyeMessage()
    {
        $this->postJson(route('message.store', [
            'conversation_id' => '1234ABC',
            'message' => 'Bye, I\m going home now'
        ]))
        ->assertStatus(Response::HTTP_CREATED)
        ->assertSee('Thank you, see you around');

        $this->postJson(route('message.store', [
            'conversation_id' => '1234ABC',
            'message' => 'Bye!!, I\m going home now'
        ]))
        ->assertStatus(Response::HTTP_CREATED)
        ->assertSee('Thank you, see you around');

        $this->postJson(route('message.store', [
            'conversation_id' => '1234ABC',
            'message' => 'Goodbye, Have a great time'
        ]))
        ->assertStatus(Response::HTTP_CREATED)
        ->assertSee('Thank you, see you around');

        $this->postJson(route('message.store', [
            'conversation_id' => '1234ABC',
            'message' => 'Goodbye!!, Have a great time'
        ]))
        ->assertStatus(Response::HTTP_CREATED)
        ->assertSee('Thank you, see you around');
    }

    /** @test */
    public function validateInvalidFormatMessage()
    {
        $this->postJson(route('message.store', [
            'conversation_id' => '1234ABC',
            'message' => 'Byeeeee, I\m going home now'
        ]))
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertSee('Sorry I don\'t understand.', false);

        $this->postJson(route('message.store', [
            'conversation_id' => '1234ABC',
            'message' => 'Helo0o, I\m going home now'
        ]))
        ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ->assertSee('Sorry I don\'t understand.', false);
    }
}
