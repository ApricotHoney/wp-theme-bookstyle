#!/bin/bash

# WordPressのDocker環境を起動するスクリプト
cd "$(dirname "$0")"
docker-compose up -d
echo "WordPress環境が起動しました。http://localhost:8080 にアクセスしてください。"
echo "管理画面は http://localhost:8080/wp-admin/ です。"
