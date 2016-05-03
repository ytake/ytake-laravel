<?php

/**
 * Class MigrationTrait
 */
trait MigrationTrait
{
    /**
     * @return \Illuminate\Database\Schema\Builder
     */
    protected function getSchemaBuilder()
    {
        return $this->connectionInstance()->getSchemaBuilder();
    }

    /**
     * @return \Illuminate\Database\Connection
     */
    protected function connectionInstance()
    {
        return app('db')->connection($this->getConnection());
    }

    /**
     * scheme down
     */
    public function down()
    {
        $this->disableForeignKeyCheck();
        $this->getSchemaBuilder()->drop($this->table);
        $this->enableForeignKeyCheck();
    }

    /**
     * @return bool|null
     */
    protected function disableForeignKeyCheck()
    {
        switch (app('db')->getDriverName()) {
            case "sqlite":
                return app('db')->statement('PRAGMA foreign_keys = OFF');
                break;
            case "mysql":
                return app('db')->statement('SET FOREIGN_KEY_CHECKS = 0');
                break;
            default:
                return null;
                break;
        }
    }

    /**
     * @return bool|null
     */
    protected function enableForeignKeyCheck()
    {
        switch (app('db')->getDriverName()) {
            case "sqlite":
                return app('db')->statement('PRAGMA foreign_keys = ON');
                break;
            case "mysql":
                return app('db')->statement('SET FOREIGN_KEY_CHECKS = 1');
                break;
            default:
                return null;
                break;
        }
    }
}