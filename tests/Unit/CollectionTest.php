<?php

namespace Spatie\LaravelRay\Tests\Unit;

use Spatie\LaravelRay\Tests\Concerns\MatchesOsSafeSnapshots;
use Spatie\LaravelRay\Tests\TestCase;

class CollectionTest extends TestCase
{
    use MatchesOsSafeSnapshots;

    /** @test */
    public function it_has_a_chainable_collection_macro_to_send_things_to_ray()
    {
        $array = ['a', 'b', 'c'];

        $newArray = collect($array)->ray()->toArray();

        $this->assertEquals($newArray, $array);

        $this->assertCount(1, $this->client->sentPayloads());
    }
}
