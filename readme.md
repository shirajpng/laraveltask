
## Home page

It contains a paginated list of users.

Controller function: index() : It returns users after fetching it from the csv file.

## Add user page

- Here, a form helps to insert new users to the csv file.
- Preference can be set for contact which make corresponding mode compulsary.

Controller function(set inside a closure in route)
Method: post, function: store()
- After hitting send, a post request is initiated to store function and then is saved to a file.

## Show user detail page

- It shows a seperate detail of a selected user.


Packages used:
- laravelcollective/html 
This is used for generating form fields.
