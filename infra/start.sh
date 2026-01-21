#!/bin/bash

# エラーハンドリング: エラーが発生したら停止
set -e

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"
cd "$DIR"

echo "=== Bookstyle V4 Docker Environment Setup ==="

# Check for incompatible phpmyadmin image and remove it
if docker images --format "{{.Repository}}:{{.Tag}}" | grep -q "phpmyadmin/phpmyadmin:latest"; then
    echo "Checking for potentially incompatible phpmyadmin image..."
    # 簡易チェック: inspectでArchitectureを確認しようとすると複雑になるため、
    # ユーザーが困っているので安全側倒してlatestがあれば消す、または特定バージョンを使う方針にする。
    # ここでは、docker-composeでバージョン固定をしたので、古いlatestが邪魔しないように念のため警告または削除を試みる。
    echo "Removing potentially incompatible 'latest' image if present..."
    docker rmi phpmyadmin/phpmyadmin:latest 2>/dev/null || true
fi

echo "Starting Docker containers..."
# --build をつけて変更を確実に反映
docker-compose up -d --build

# DBのヘルスチェック待機
echo "Waiting for Database to be ready..."
until docker exec bookstyle_db mysqladmin ping -h localhost -u wordpress -pwordpress --silent > /dev/null 2>&1; do
    echo -n "."
    sleep 2
done
echo " Database is ready!"

echo "Waiting for WordPress..."
# HTTPステータス確認 (200, 301, 302あたりが返ればOK)
until curl -s -o /dev/null -w "%{http_code}" http://localhost:8000 | grep -qE "200|301|302"; do
    echo -n "."
    sleep 2
done
echo " WordPress is ready!"

echo "========================================"
echo "Access Information:"
echo "WordPress:  http://localhost:8000"
echo "phpMyAdmin: http://localhost:8080"
echo "========================================"
echo "To stop: cd v4/infra && docker-compose down"
