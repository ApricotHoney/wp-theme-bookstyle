#!/bin/bash

# WordPressのDocker環境を停止するスクリプト
cd "$(dirname "$0")"
docker-compose down
echo "WordPress環境を停止しました。"
