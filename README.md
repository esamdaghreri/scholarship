## About Scholarship

Scholarship is a web appliaction for graduation project which may facilitate all the services like request to get scholarship, extend, cancele , change supervisor and change fellowship and all these services has been transfer from manually process to electronic.

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

## Snapshots of the web application

### As an admin
Gives a statistics of numbers of users and number of requests for each type

![Main page for admins dashboard](https://github.com/esamdaghreri/scholarship/blob/master/snapshots/adminDashboardHome.png)

A user dashboard that capable of adding a new user as an admin or any other rules available, show each user in detail, Edit his personal information, and banned him for any kind of reason that must mention in the form

![User Dashboard](https://github.com/esamdaghreri/scholarship/blob/master/snapshots/adminUser.png)

Show all requests from users. All requests arrange on which category is

![Show all requests from users](https://github.com/esamdaghreri/scholarship/blob/master/snapshots/adminRegisterScholarship.png)

Approve or reject a request

![Approve or reject a request](https://github.com/esamdaghreri/scholarship/blob/master/snapshots/adminApproveOrRejectOrder.png)

A very simple search for reports that capable of selecting many options for the age of a user, date of the request, search with the type of the request as an option, and what department of the user as an option too.

![Approve or reject a request](https://github.com/esamdaghreri/scholarship/blob/master/snapshots/adminSerachReports.png)

### As a user
Each user must update his personal information before request for a scholarship

![Update personal information](https://github.com/esamdaghreri/scholarship/blob/master/snapshots/userPersonalInformation.png)

Registering for a scholarship or for a language scholarship

![Register form](https://github.com/esamdaghreri/scholarship/blob/master/snapshots/userRregisterScholarship.png)

Show all orders of the user

![Show all orders](https://github.com/esamdaghreri/scholarship/blob/master/snapshots/userShowAllOrders.png)

Show an order in detail without other requests like change the supervisor until approved by the admin

![Show an order in detail without requests](https://github.com/esamdaghreri/scholarship/blob/master/snapshots/userShowOrderInDetails.png)

Show an order in detail with other requests when approved by the admin

![Show an order in detail with requests](https://github.com/esamdaghreri/scholarship/blob/master/snapshots/userShowAllOperationAfterApprove.png)
