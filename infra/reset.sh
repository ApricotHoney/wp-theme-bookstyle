#!/bin/bash

# WordPressのDocker環境をリセットするスクリプト（データベースも削除）
cd "$(dirname "$0")"
docker-compose down -v
echo "WordPress環境をリセットしました。データベースも削除されています。"
echo "環境を再度起動するには ./start.sh を実行してください。"
