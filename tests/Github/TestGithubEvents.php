<?php

class TestGithubEvents extends GithubBaseTest
{
    /** @test */
    public function shouldReturnAnArray()
    {
        $activities = $this->activity->forUser('nwidart')->activities();

        $this->assertInternalType('array', $activities);
    }

    /** @test */
    public function shouldReturnArrayFiveElements()
    {
        $activities = $this->activity->forUser('nwidart')->activities();

        $this->assertEquals(5, count($activities));
    }
}