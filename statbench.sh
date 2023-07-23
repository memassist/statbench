#!/bin/sh

win=""
if [ -x "$(command -v winpty)" ] ; then
  win="winpty"
fi

export COMPOSE_DOCKER_CLI_BUILD=1
#export DOCKER_BUILDKIT=0
export DOCKER_BUILDKIT=1

docker_compose="$win docker-compose -f docker-compose.yml"

$docker_compose build --parallel statbench

$docker_compose run --rm \
  --entrypoint="$@" \
  -u "$(id -u):$(id -g)" \
  statbench
