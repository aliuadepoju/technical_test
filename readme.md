## Road Safety Plate Number Generator According to Local Government Area

### Tech Stack: Python/Django, Bootstrap and Django Rest Framework for the rest API

<p> No beautiful UI just  backend logic</p>

installations:

Install Python3

Install virtualenv

`pip install virtualenv`

activate your virtualenv on linux, run

```
source env/bin/activate

```

if your virtualenv name is env
otherwise, replace the 'env' with your virtualenv's name.

sudo into the project and install all dependencies in the requirements.txt file

by running

```
pip install -r requirements.txt

```

API endpoint
http://localhost:8000/api/v1/?format=json

You can find a well structured API Documentation here http://localhost:8000/doc : with a fronten interaction.

other urls:
report: http://localhost:8000/report
generate plate number: http://localhost:8000/generator

login with no auth: http://localhost:8000/login
you can actually access all pages without login in.

---

Ensure you import the database to your mysql server.
username is "root" no password and the dbname is "roadsafety"

Thanks.
