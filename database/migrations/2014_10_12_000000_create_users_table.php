<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable
 */
class CreateUsersTable extends Migration
{
    use MigrationTrait;

    /** @var string  */
    protected $table = 'users';

    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->getSchemaBuilder()->create($this->table, function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
