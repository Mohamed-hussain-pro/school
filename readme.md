Starting the database
    1- docker-compose up -d
    2- docker exec -it school-database-1 psql -U admin -W app
    3- password: password
    4- \c app;
    5- password: password
    ## You are now connected to database "app" as user "admin". ##

    show tables: \dt
    show a table schema: \d enrollment

start the dev server
    symfony server:start
    visit: http://127.0.0.1:8000/

Creating new table and make a migration and migrate

    1- symfony console make:entity entity-name  
    2- symfony console make:migration 
    3- symfony console doctrine:migrations:migrate


debugging

   - Remove cache php bin/console cache:clear
   - for forms add to the twig file {{ form_errors(form) }}
   - for controller  var_dump("Reached here"); // Debugging statement
