# Mentoree
Website for mentoring.

This is a php website built using symfony framework. The site let's you add mentors and mentees into a database which will be used by the mentoree fronted application.
This is a admin website and not to used/availabel to users. 

Link of the website : http://763efdcb.ngrok.io/users


This database works on the following schema : 


https://drive.google.com/a/practo.com/file/d/0B6QxEnu2L7UfNExfTldpM0FCNUk/view?usp=sharing 


The user skills table is presently not being used, but is present for future use case where users can add multiple skills. 

The following apis are available :

get (all mentors data) :

use : http://763efdcb.ngrok.io/users

This returns a JSON response returning all the mentors details.

get (mentors according to company)

use : http://763efdcb.ngrok.io/users/company_name

To get and put in new categories :

make a http request to http://763efdcb.ngrok.io/categories


