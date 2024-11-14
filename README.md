https://readouble.com/laravel/11.x/ja/installation.html 参考

1, Laravelアプリケーションの前にphp, conposer, laravelインストーラーがinstallされているか
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows'))

2, 上記のコマンドを実行後、ターミナルセッションを再起動

3, すでにphp, composerがinstallされている場合はcomposer経由でlaravelのinstall
composer global requier laravel/installer
