<?php

class TestGithubEvents extends GithubBaseTest
{
    /** @test */
    public function shouldReturnAnArray()
    {
        $activities = $this->getActivities();
        dd($activities);

        $this->assertInternalType('array', $activities);
    }

    /** @test */
    public function shouldReturnOneElement()
    {
        $activities = $this->getActivities();

        $this->assertEquals(1, count($activities));
    }

    /** @test */
    public function shouldReturnArrayFiveElements()
    {
        $activities = $this->getActivities();

        $this->assertEquals(5, count($activities));
    }
}