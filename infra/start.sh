#!/bin/bash

# WordPressのDocker環境を起動するスクリプト
cd "$(dirname "$0")"
echo "Docker環境を起動しています..."
docker-compose up -d

# MySQLが準備完了するまで待機
echo "データベースの準備が完了するまで待機しています..."
until docker exec wp_db mysqladmin ping -h localhost -u wordpress -pwordpress --silent; do
    echo "データベースの起動を待機中..."
    sleep 3
done

# WordPressが準備完了するまで待機
echo "WordPressの準備が完了するまで待機しています..."
until $(curl --output /dev/null --silent --head --fail http://localhost:8080); do
    echo "WordPressの起動を待機中..."
    sleep 3
done

# データベースのリストア
echo "データベースをリストアしています..."
cat ../database.sql | docker exec -i wp_db mysql -uwordpress -pwordpress wordpress

echo "----------------------------------------"
echo "WordPress環境が起動しました！"
echo "フロントエンド: http://localhost:8080"
echo "管理画面: http://localhost:8080/wp-admin/"
echo ""
echo "管理者ログイン情報:"
echo "ユーザー名: admin（データベースから復元された場合は異なる可能性があります）"
echo "パスワード: データベースから復元された情報をご利用ください"
echo "----------------------------------------"
