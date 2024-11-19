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

9, Sqlite以外のデータベースを使用する場合はdatabase変数を変更後、migrationを行う必要がある
php artisan migrate

10, Laravelのすべてのアプリケーションのエントリーポイントはpublic/index.phpファイルです
index.phpはConpsoerで生成したオートローダ定義をロードし、LaravelアプリケーションのインスタンスをBootstrap/app.phpから取得します
laravel自体が最初にとるアクションはアプリケーション/サービスコンテナのインスタンスを生成することです
Composerオートローダーのロード
php
require __DIR__.'/../vendor/autoload.php';


ディレクトリの配置について
appディレクトリはappコードのコアとなるような主要コードを置く場所

Bootstraoディレクトリ: フレームワークを手記起動処理するapp.phpファイルを設置します。このディレクトリにはルートやサービスのキャッシュファイルなど、パフォーマンスを最適化するためのフレームワークで生成されたファイルを含むcatchがあっる

configfile: configは名前の通り、アプリケーションの全設定ファイルを設置している

databaseディレクトリ: データベースのmigrateともでるファクトリ(モデルファクトリは、ダミーデータを簡単に生成するための機能です。これを使うことで、テストや開発環境で大量のデータを簡単に作成できます。)や初期値設定を配置します。

publicディレクトリ: アプリケーションへの全入口となり、オートローディングを設定するindex.phpがあります。js, cssもあります。

resourseディレクトリ: モデルファクトリは、ダミーデータを簡単に生成するための機能です。これを使うことで、テストや開発環境で大量のデータを簡単に作成できます。

routesディレクトリ
routesディレクトリに、アプリケーションのすべてのルート定義が含めます。web.phpとconsole.phpの2つのルートファイルが、デフォルトでLaravelに用意してあります。
web.phpファイルは、Laravelがwebミドルウェアグループに配置するルートを定義し、セッションの状態、CSRF保護、クッキーの暗号化を提供します。もしあなたのアプリケーションがステートレスでRESTfulなAPIを提供しないのであれば、ほとんどの場合、すべてのルートは、このweb.phpファイルで定義することでしょう。
console.phpファイルは、クロージャベースのコンソールコマンドをすべて定義する場所です。各クロージャはコマンドインスタンスと結合されるため、各コマンドのIOメソッドを操作する簡単なアプローチが可能です。このファイルはHTTPルートを定義しませんが、アプリケーションへのコンソールベースのエントリポイント(ルート)を定義しています。また、console.phpファイル中でタスクをスケジュールすることもできます。
APIルート（api.php）とブロードキャストチャンネル（channels.php）のルートファイルをオプションとして、追加インストールすることもできます。
api.phpファイルはステートレスを意図したルートを含んでいるので、これらのルートを通してアプリケーションに入るリクエストはトークンを使って認証されることを意図しており、セッション状態にアクセスすることはありません。
channels.phpファイルは、アプリケーションがサポートするすべてのイベントブロードキャストチャンネルを登録できる場所です。

storageディレクトリ
storageディレクトリには、ログ、コンパイル済みBladeテンプレート、ファイルベースのセッション、ファイルキャッシュ、およびフレームワークが作成したその他のファイルが含まれます。このディレクトリは、app、framework、logsディレクトリに分離されています。appディレクトリは、アプリケーションが作成したファイルを保存するために使用できます。frameworkディレクトリは、フレームワークが作成したファイルとキャッシュを保存するために使用します。最後に、logsディレクトリにはアプリケーションのログファイルを保存しています。
storage/app/publicディレクトリは、プロファイルアバターなど、一般にアクセス可能である必要のあるユーザー生成ファイルを保存するために使用します。このディレクトリを指すシンボリックリンクをpublic/storageに作成する必要があります。php artisan storage:link Artisanコマンドを使用してリンクを作成できます。

HTML	PHP	Laravel	Web
inputタグ	配列	requestオブジェクト	ステートレスサーバ
hidden属性	連想配列	session	アーキテクチャスタイル
Formタグ	多次元配列	bladeテンプレート	REST
多次元連想配列	CRUD処理	Cookie
ループ処理	Eloquent (ORM)	セッション状態
多重ループ処理	Collection	HTTP
array~~関数	Modelオブジェクト	HTTPメソッド
各種の条件分岐	リファレンス渡し	オブジェクト指向
flag指定	ドット記法	
真偽値	MVC+Route	
Laravel Collective	
Formファサード	
デバック方

