<?php

namespace Model\Migration;

use Model\Database;

class  CreateTaskTableMigration
{
    public function __construct(
        protected Database $db
    ){
    }

    public function up():void   //для добаваления чего в БД
    {
        $this->db->connection()->query('create table if not exists tasks (
    id int auto_increment primary key,
    name varchar(255) not null,
    description text null,
    dueDate datetime not null,
    status int not null default 0,
    createdAt datetime not null default now(),
    executedAt datetime null
)');
    }
    public function down():void  // для отмены изменений из БД
    {
        $this->db->connection()->query('drop table if exists tasks');
    }
}
