# CakePHP Application for Sending a test Mail from api

A test app for sending an email using the API as a data source.

## Assignemt

Create a tool that reads two API responses and sends an email.
The email should contain the posts written by every user. Please note that you should take only the first 3 posts.
If you want, you can add a result page too using any tool you want.

E.g. 
John Smith has written:
- Title 1
- Title 2
- Title 3

Paul Johnson has written:
- Title 1
- Title 2
- Title 3

- You can get the user list from this service: https://jsonplaceholder.typicode.com/users
- You can get the post list from this service: https://jsonplaceholder.typicode.com/posts
- To send email you can use https://mailtrap.io/ that gives you smtp credentials to send mail and catches all your attemps or you can use any service you want.

## Account mailtrap

The account used for mailtrap is:

username : sendmail@zooape.net

password : sendmail

## Installation

1. Clone or download the source code and run in the app folder

```bash
docker-compose up
```

Then visit `http://localhost:8082` to see application

## Usage

1. Visit `http://localhost:8082`
2. Choose a number of posts to be sended or leave the default value
3. Click on "Invia Email" button
4. The body of the email will be rendered.

  OR via CLI

```bash
docker-compose exec php-fpm bin/cake SendMail [3]
```
You can specify the number of posts to send in the email.


