## Setting up on your local machine
To test/develop this project locally, follow the following steps:
1. Clone the GitHub repository to your local machine
    
    On the terminal, `cd` over into the directory where you want the project to be. Then, run `git clone https://github.com/p-prado/...`.
    Then, `cd` into the project root folder.

1. Create db schema

    On your local machine, run a MySQL script to create the database to be used by the app.

    ```
    CREATE SCHEMA IF NOT EXISTS `todo-app-18002407`;
    ```
2. Copy `env` to `.env` and set Environment variables.

    Inside the project root directory, run `cp env .env`.
    Then, set up the environment variables for the database and the following two settings.

    ```
    CI_ENVIRONMENT = development

    app.baseURL = 'http://localhost:8080/'
    
    ```

3. Run migrations

    Run the migrations to create the tables on your database.
    ```
    php spark migrate
    ```

4. Run seeders

    Seed the database with the data required to run.

    ```
    php spark db:seed CentralSeeder
    ```

5. Serve on development server

    ```
    php spark serve --port=8080
    ```

6. Open a web browser to the port: `localhost:8080`

    Now you're all ready to go! To view the app on a mobile view, go to Developer Tools on the browser, and change the dimensions to a mobile size.