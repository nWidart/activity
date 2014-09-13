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
    public function shouldReturnOneElement()
    {
        $activities = $this->activity->forUser('nwidart')->activities(1);

        $this->assertEquals(1, count($activities));
    }

    /** @test */
    public function shouldReturnArrayFiveElements()
    {
        $activities = $this->activity->forUser('nwidart')->activities();

        $this->assertEquals(5, count($activities));
    }
}