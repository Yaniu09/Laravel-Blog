<p align="center"><img src="https://scontent.fmle2-1.fna.fbcdn.net/v/t1.0-1/p100x100/21150150_1876578315989891_46443654445075191_n.png?oh=cc3494835283837fefc5414ef5c9b882&oe=5AF2FBE8"> <img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Laravel Based Blog with Admin interface and Image Upload.

1) First clone using `git clone https://github.com/Yaniu09/Laravel-Blog.git` or download the .zip file.

2) Run `composer install`

3) Make the `.env` file 

4) Generate an Application Key using Command line `php artisan key:generate` 

5) Setup the database and migrate the files using the Command line `php artisan migrate`

6) Add the following line to the `.env` file if you want to upload it to the public

 ```
 UPLOAD_TYPE='public'
 ```
#### OR

If you want to upload is to Amazon Web Service S3 add the line below to the `.env` file
```
UPLOAD_TYPE='s3'

AWS_KEY=XXXXXXXXXXXXXXXXXXXX
AWS_SECRET=XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
AWS_REGION=XXXXXXXXXX
AWS_BUCKET=XXXXXXXXXXX
```


