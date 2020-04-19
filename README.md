![](https://github.com/cvilleger/slack-bot/workflows/App/badge.svg)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software and how to install them?

- [Docker CE](https://www.docker.com/community-edition)
- [Docker Compose](https://docs.docker.com/compose/install)

### Install  
  
#### Override default ports

- Create your `docker-compose.override.yaml` file

```bash
cp docker-compose.override.yaml.dist docker-compose.override.yaml
```

#### Create custom envs

- Create your `.env.local` file

```bash
cp .env .env.local
```

#### Build & up containers, then install dependencies

```bash
docker-compose up -d
docker-compose exec --user=application web composer install
```

#### Inside web container, install dependencies

```bash
composer install
```
