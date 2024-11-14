public function up()
{
  schema::create('contacts', function (Blueprint $table) { //schema::create()メソッドで新しいテーブルを作成します
    $table->id(); // id();は自動インクリメントされる整数型のIDを一意な値で識別する
    $table->string('name'); 
    $table->string('email');
    $table->text('message');
    $table->timestamps(); // create_atとupdate_atというカラムを生成し、作成された日と更新された日を自動的に管理します
  });
}

public function down() // Laravelのdownメソッドはロールバック時に実行される処理を記載する
{
  schema::dropIfexists('contacts'); // 指定したtableが存在すれば削除するという処理を行う'contacts'が存在する場合 php artisan migrate:rollback
}


