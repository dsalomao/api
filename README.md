Hello peaps, hope you all are very well.

So i started my line of thought with this assignment in maybe doing a PHP procedural script where i would treat the requests sent to this file and respond accordingly.
After that, as i had 1 day to do it, i could do it in a OOD fashion where i would have some interfaces for connecting to diferent data bases and other ideas so to 
turn this little api more scalable. Finally after some consideration i decided to use a MVC Framework that would give the code a already well rounded OOD, it would 
be scalable and well organized. So i opted for coding in the CakePHP Framework that gave me a kickstart in terms of configuration and bootstraping crud functionality.
The code is composed by these entitys, wach with their Model and Controller classes (Their are no views as the API is a fully on json and http requests):

- Pulishers
- Notes
- Tags(Topics)
- Subscribers

For a better look of the structure and relationships ill drop an EER model file and the exported DB data at 'database' folder.
The source code is in 'api'.
I used a full xampp stack.

Testing:

For testing functionalities i user a Chrome extension know as Postman, it allows you to do Http requests and observe the message cycle. Each of the Entities described above
have the following methods:

Index: Lists paginated entities. 
View: Returns sigle Entity data and related data.
Add: Add an Entity.
Edit: Edit an Entity.
Delete: Remove an Entity.

Index:
	To get a paginated list of entities one should do a GET request to yourdomain/api/entities.json
	ex.: localhost/api/subscribers.json returns a paginated data of subscribers, their signed topics and notes related to those topics

View:
	To get an entity one should do a GET request to yourdomain/api/entities/{id}.json
	ex.: localhost/api/subscribers/0.json

Add:
	To save an entity in its table one should do a POST request to yourdomain/api/entities passing a valid JSON object
	ex.: localhost/api/subscribers

Edit:
	To edit an existing entity in its table one should do a PUT request to yourdomain/api/entities/{id} passing a valid JSON object
	ex.: localhost/api/subscribers/0

Delete: 
	To delete an existing entity in tis table one should do a DELETE request to yourdomain/api/entities/{id} 
	ex.: localhost/api/subscribers/0

Ok i think thats it, looking forward to working with you.
Best Regards.
