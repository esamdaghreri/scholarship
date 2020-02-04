# Scholarship

## Getting Started

- Clone the repository `git clone https://github.com/esamdaghreri/scholarship`.
- Make a copy of `.env.example` as `.env`
- Run the following the project folder `docker-compose up`

After that, you can navigate to http://localhost:5555.

**Warning**: Clears all containers and volumes.

```sh
$ docker rm -f $(docker ps -a -q) ; docker volume rm $(docker volume ls -f dangling=true -q) ; docker rmi -f $(docker images -q)
```
