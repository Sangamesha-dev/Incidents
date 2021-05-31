Create DB incidents
CREATE SCHEMA `incidents` ;
Default DB user is root.
Default DB password will be empty, so if your DB contains any password please update in .env file.

DB_PASSWORD=

Run the following command to migrate your database

"php artisan migrate"

php artisan passport:client --personal

and give you this prompt

"What should we name the personal access client? [Artisan Personal Access Client]:"

don't worry just type in any name and press the enter key.

New User Registration: URL - http://localhost:8000/api/registerHTTP Type: POST
Parameters:name:test
email:test@test.com
password:testtest
password_confirmation:testtest
User Login:
URL - http://localhost:8000/api/loginHTTP TYPE: POST
Parameters:email:test@test.com
password:testtest

Login api will return token,

Copy that token to under authorization tab select Bearer Token And paste token and save it

New Incidents Creation:
URL: http://localhost:8000/api/incidentHTTP TYPE: POST
Parameters:Underbody select raw option at the end select JSON. Paste below JSON{
"data": [
{
"id": 0,
"location": {
"latitude": 12.9231501,
"longitude": 74.7818517
},
"title": "incident title",
"category_id": 1,
"people": [
{
"name": "Name of person",
"type": "staff"
},
{
"name": "Name of person",
"type": "witness"
},
{
"name": "Name of person",
"type": "staff"
}
],
"comments": "This is a string of comments",
"incidentDate": "2020-09-01T13:26:00+00:00",
"createDate": "2020-09-01T13:32:59+01:00",
"modifyDate": "2020-09-01T13:32:59+01:00"
}
]
}
Get Incidents:
URL: http://localhost:8000/api/incidentHTTP Method : GET
