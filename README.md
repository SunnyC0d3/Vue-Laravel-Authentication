# A JWT Application using Vue and Laravel

The purpose of this application was to learn Laravel. Exploring how to configure databases, controllers, views, models, and much more.

As I was going about learning practically, I decided to give myself a challenge to create a Login and Register system using Tokens. I have previous knowledge on building applications via Sessions, but as more new technologies rely on Tokens for stateless applications, I thought now would be a good time to give it a go.

After building the necessary steps for the application, it was tested via Postman and the results were as expected. The only thing left to do was to output the results on to the frontend, which was achieved via Vue. Again never touched Vue before.

This project was essentially a learning curve for understanding Laravel, Vue and JWT's.

## Installation

To install the application, just simply clone it to your desktop or download it.

Then all you need to do is, setup your **.env** file. I am using **MySQL** as my database choice and since this application is configured with docker, you may have to do extra changes if you decide to use another database. For more information in regards to Laravel Sail, please see the docs [here](https://laravel.com/docs/8.x/sail).

Once everything has been setup, run the following commands -

```
./vendor/bin/sail php artisan migrate

./vendor/bin/sail php artisan db:seed
```

That should populate your database using Seeders.

Then just simply register an account and login to see the output. Enjoy!