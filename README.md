1. Create db schema
    ```
    CREATE SCHEMA IF NOT EXISTS `todo-app-18002407`
    ```
2. Add info to .env
3. Run migrations

    ```
    php spark migrate
    ```

4. Run seeders

    ```
    php spark db:seed CentralSeeder
    ```

5. Serve on development server

    ```
    php spark serve --port=8080
    ```

6. Open a web browser to the port: `localhost:8080`

    To view the app on a mobile view, go to Developer Tools on the browser, and change the dimensions to a mobile size.