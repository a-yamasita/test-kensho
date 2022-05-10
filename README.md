# テストの作成

## 前提
- docker-compose と mkcert が使えること

## 再現方法
- .env.template を .env としてコピー、必要事項を記入
- APP_FQDN と GATS_FQDN を適当に決めて hosts に 127.0.0.1 で書く
- mkcert {APP_FQDN} と mkcert {GATS_FQDN} を実施、rp/certs に生成された鍵を配置
- docker-compose build して docker-compose up
- docker-compose exec app ash し、php artisan key:generate する
- php artisan migrate する
- php artisan test する

## この検証環境について

- / へのアクセス (https://api.test-kensho) 時、app/Http/HogeController.php の get() が呼ばれる
- get() 内で app/Services/HogeService.php 内の App\Services\HogeService::get() が呼ばれる
- App\Services\HogeService::get() では単純な配列を返している（何らかの API を想定）
- Laravel では Controller で配列を返すと JSON での応答になるので、application/json として画面にそのまま表示される

テストとしては
- テスト開始時にデータベースに値を投入
- アクセスしたときに正しい JSON を返すかどうか
- 単体関数が正しい値を返すかどうか

# その他

## ログ周りのパーミッションの問題

app 配下で sudo chmod -R 777 storage を実施。
storage 配下に laravel.log が出力されて、そこが動作ユーザで書き込み不可だとエラーになる。