https://readouble.com/laravel/11.x/ja/installation.html 参考

1, Laravelアプリケーションの前にphp, conposer, laravelインストーラーがinstallされているか
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows'))

2, 上記のコマンドを実行後、ターミナルセッションを再起動

3, すでにphp, composerがinstallされている場合はcomposer経由でlaravelのinstall
composer global requier laravel/installer

4, php, composer, laravelをinstallしたら新しいLaravelアプリケーションを作成する準備ができました。Laravelインストーラは、希望するテストフレームワーク、データベース、スターターキットを選択するように促します。
laravel new contact-form

5, アプリケーションを作成したら, dev Composerスクリプトを使用してLaravelのローカル開発環境, ビューワーカー, vite開発サーバーを起動する
cd cotact-form
npm install && npm run build
composer run dev      // 開発サーバーを起動するとhttp://localhost:8000からアクセス

6, Laravelフレームワークの全ての設定はconfif fileに含まれている

7, laravelロジックの一連の流れ
request-routing-validation-conatoll-view-response?

8, laravelアプリケーションを作成したら次はdatabaseに保存する
.envでは初期はsqliteを指定しているので、MySqlに変更したい場合は.envの中身を変更して適切なdatabaseを使用できるようにする
もしMySqlを使用したい場合は.envファイルのDB_*変数を以下のように変更します
DB_CONECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
