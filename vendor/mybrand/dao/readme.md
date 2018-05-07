2DO:
------
Write tests
Write tests for reuse/clear
Add incremental update
Add insertAll
Interface for trandactions and move "use" of TransactionTrait to implementation (MySQL)
Refactoring for where
Add comparation for where
Add in() for where
Add AND/OR/NOT for where
Add agregate prefix for find-fields
ApiGen
Review comments/docs
Composer

$db = new \dao\pdo\DummyDao('\dao\mysql\Table');
$table = $db->table('user');
//$table->insert(['username'=>'mendel','email'=>'mendel@zzzlab.com']);
//$table->defaultRecord(['role'=>'user'])->insert(['username'=>'mendel','email'=>'mendel@zzzlab.com']);
//$table->where(['id'=>1])->update(['username'=>'mendel','email'=>'mendel@zzzlab.com']);
//$table->update(['username'=>'mendel','email'=>'mendel@zzzlab.com']);
//$table->update(['username'=>'mendel','email'=>'mendel@zzzlab.com'], ['id'=>1]);
//$table->delete();
//$table->delete(['id'=>1]);
//$table->findAll();
//$table->findAll(['username'=>'mendel','email'=>'mendel@zzzlab.com']);
//$table->limit(10)->findAll();
//$table->limit(10)->offset(10)->findAll();
//$table->order(['username'])->findAll();
//$table->order(['!username'])->findAll();
//$table->distinct()->findAll();
//$table->fields(['username', 'email'])->findAll();
//$table->find();
//$table->find(['id'=>1]);
//$db->result = [['cnt'=>5]]; $table->count(['id'=>1]);
var_dump($db->sql,$db->parameters);


//
$db = new \dao\mysql\Dao('localhost', 'dao_db', 'do_user', 'dao_pass');
//$db = new \dao\pdo\DummyDao('\dao\mysql\Table');
$table = $db->table('user')
    ->defaultRecord(['role'=>'user'])
    ->where(['role'=>'user'])
    ->fixState();
//
//echo $table->insert(['username'=>'mendel','email'=>'m@zzzlab.com']);
//var_dump($table->find());
echo $table->count();
//$table->delete(['id'=>1]);
//var_dump($db->sql,$db->parameters);