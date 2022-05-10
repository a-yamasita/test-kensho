<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // 全部の「投稿」の配列が返るはず
        $response = $this->get('/');

        // JSON 入り配列の場合の書き方
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => [
                         'id',
                         'content',
                         'created_at',
                         'updated_at'
                     ]
                 ]);
    }
}
