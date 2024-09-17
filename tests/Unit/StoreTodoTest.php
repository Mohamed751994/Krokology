<?php

namespace Tests\Unit;

use App\Models\User;
#use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class StoreTodoTest extends TestCase
{

    public function testStoreSuccess()
    {
        $data = [
            'user_id' => User::first()->id,
            'title' => 'New Test Todo',
            'description' => 'Description of the new todo',
        ];
        $response = $this->post('/test/todos/store', $data);
        $response->assertRedirect();
        $response->assertSessionHas('success', 'Todo Created Successfully....');
    }

}
