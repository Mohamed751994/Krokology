Instructions on how to run the application: <br>

1- git clone https://github.com/Mohamed751994/Krokology.git <br>

2- Open Terminal in your project directory and run : <strong>composer install</strong> <br>

3- In main directory of the project : Copy .env.example to .env file <br>

4- In your local machine Create database with name : <strong>krokology</strong> <br>

5- Open Terminal in your project directory and run : <br>
<strong>php artisan migrate</strong> <br>
<strong>php artisan db:seed</strong> <br>
<strong>php artisan storage:link</strong> <br>

6-  run the application : <strong>php artisan serve</strong> <br>

7- Open url : <br>
http://localhost:8000/login <br>
then write the credentials : <strong>[Email : user@user.com - password: 12345678]</strong><br>
after login you can go to  http://localhost:8000/todos


Note (Sending Email) : I Commented The send email functionality because we don't have mail credentails 
you can see it in app/Observers/TodoObserver.php
