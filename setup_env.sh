#!/bin/sh

{
  echo "APP_NAME='$APP_NAME'"
  echo "APP_ENV='$APP_ENV'"
  echo "APP_KEY='$APP_KEY'"
  echo "APP_URL='$APP_URL'"
  echo "APP_DEBUG='$APP_DEBUG'"
  echo "DB_CONNECTION='$DB_CONNECTION'"
  echo "DB_DATABASE='$DB_DATABASE'"
  echo "DB_HOST='$DB_HOST'"
  echo "DB_PASSWORD='$DB_PASSWORD'"
  echo "DB_PORT='$DB_PORT'"
  echo "DB_USERNAME='$DB_USERNAME'"
} >> .env
