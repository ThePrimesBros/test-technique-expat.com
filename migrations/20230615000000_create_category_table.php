<?php

use Phinx\Migration\AbstractMigration;

class CreateCategoryTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('category');
        $table->addColumn('name', 'string', ['limit' => 255])
            ->create();
    }
}
