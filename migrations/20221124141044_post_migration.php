<?php
declare(strict_types=1);

use Phinx\Db\Action\AddColumn;
use Phinx\Migration\AbstractMigration;

final class PostMigration extends AbstractMigration
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
    
    public function up(): void{
        $this->table('Post')->addColumn('author_id', 'intenger')->update();
    }

    public function change(): void{
        $table = $this->table('Post');
        $table->addColumn('author', 'string')
        ->addColumn('title', 'string')
        ->addColumn('body', 'string')
        ->addColumn('createdAt', 'string')
        ->addColumn('videoUrl', 'string')
        ->create();
    }
}
