namespace App\Models; // codeを整理してclassの重複を避ける

use Illuminate\Database\Wloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; //modelを継承する？データベースとやり取りする

class Contact extends Model // extend modelによりContactはEloquentを継承しdatabaseとやり取りが可能になる
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'message'] // $fillableを使用することで簡単にuserから送信された情報を取得することができる []で制御をおこなう？
}


