<h1>Language PHP (Laravel framework)</h1>

<p>
    User does not need to be authenticated to access the the plate number generating page and also be able to see all plates that have been     generated
</p>

<p>User can filter generated plate numbers using LGA as search criteria</p>

<h2>API Docs(Tested with postman)</h2>

<p>All Api resources comes from App\Http\Resources\plateNumbers.php and App\Http\controller\Platenumbersapicontroller.php</p>

<p>Plate number(s) can be registered using the following endpoint http://yourdomain.com/api/plate-number</p>

<p>All generated plate numbers can be viewed using the endpoint http://yourdomain.com/api/all-plate-numbers</p>

<h1>Installation</h1>

<h6>Clone repo to local server using <code>git clone https://github.com/aliuadepoju/technical_test.git</code></h6>

<code>cd technical_test</code>

<code>git checkout TaghwoMillionaire</code>

<code>Composer install</code>

<code>npm install</code>

<p>Create an empty database</p>

<p>Make a copy of .env.example file, name it .env (cp .example.env .env) and enter database connection details into .env file (db_host,db_username,db_password,db_database)</p>

<p>Run <code>php artisan key:generate</code></p>

<p>Run <code>php artisan migrate</code>  (please make sure your database connection details in the .env file are correct)</p>

<p>Run <code>composer dump-autoload</code></p>

<p>Run <code>php artisan serve</code></p>

<p>127.0.0.1:8080 loads up a login screen,enter any info as email and enter any password, no validation is done, it takes you to the plate number generating page</p>

<h4>Thanks</h4>





