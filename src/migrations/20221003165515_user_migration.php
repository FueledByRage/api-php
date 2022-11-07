<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UserMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void{
        $table = $this->table('User');
        $table->addColumn('username', 'string', ['limit' => 10, 'unique' => true])
        ->addColumn('email', 'string', ['limit' => 20, 'unique' => true])
        ->addColumn('pass', 'string', ['limit' => 15])
        ->addColumn('about', 'string', ['limit' => 200])
        ->addColumn('profileUrl', 'string')
        ->create();
    }
}