## About Scholarship

Scholarship is a web appliaction for graduation project which may facilitate all the services like request to get scholarship, extend it, cancele it , change supervisor and change fellow and all these services has been transfer from manually process to electronic.

## Getting Started

- Clone the repository `git clone https://github.com/esamdaghreri/scholarship.git`.
- Make a copy of `.env.example` as `.env`
- Run the following the project folder `docker-compose up`
- then run the following commands
    ```
    $ docker exec -it scholarship_php_1 sh
    $ php artisan migrate --seed
    ```

After that, you can navigate to http://localhost:5555

**Note:** Use this account to get all privileges

Email `admin@gmail.com`

Password `AdminScholarship`
