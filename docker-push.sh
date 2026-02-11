#!/bin/bash

set -e

# Carrega variáveis do .env
export $(grep -E '^(DOCKER_USERNAME|DOCKER_PASSWORD)=' .env | xargs)

IMAGE_NAME="escolhaazul"
TAG="${1:-latest}"
FULL_IMAGE="${DOCKER_USERNAME}/${IMAGE_NAME}"

echo "==> Buildando imagem ${FULL_IMAGE}:${TAG}..."
docker build -f Dockerfile.prod -t "${FULL_IMAGE}:${TAG}" -t "${FULL_IMAGE}:latest" .

echo "==> Fazendo login no Docker Hub..."
echo "${DOCKER_PASSWORD}" | docker login -u "${DOCKER_USERNAME}" --password-stdin

echo "==> Enviando ${FULL_IMAGE}:${TAG}..."
docker push "${FULL_IMAGE}:${TAG}"

if [ "${TAG}" != "latest" ]; then
    echo "==> Enviando ${FULL_IMAGE}:latest..."
    docker push "${FULL_IMAGE}:latest"
fi

echo "==> Logout do Docker Hub..."
docker logout

echo "==> Concluído! Imagens enviadas:"
echo "    - ${FULL_IMAGE}:${TAG}"
echo "    - ${FULL_IMAGE}:latest"
