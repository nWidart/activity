<?php namespace Nwidart\Activity;

interface EventFactoryInterface
{
    public function make($eventType);
}