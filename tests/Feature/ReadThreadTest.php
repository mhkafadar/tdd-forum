<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function a_user_can_see_all_threads()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }
    /** @test */
    public function a_user_can_see_single_thread()
    {
        $this->get('/threads/' . $this->thread->id)        
            ->assertSee($this->thread->title);
    }    
    /** @test */
    public function a_user_can_see_replies_that_are_associated_with_a_thread()
    {
        $reply = factory('App\Reply')
            ->create(['thread_id' => $this->thread->id]);
        $this->get('/threads/' . $this->thread->id)
            ->assertSee($reply->body);      
    }        
}
