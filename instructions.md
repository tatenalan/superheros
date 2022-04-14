Running instructions:
1) Clone the repo: git clone https://github.com/tatenalan/superheros.git
2) Once you cloned the repository, you will need to create a MySQL database
3) Setup the exercise/.env file
4) Execute the command: sh scripts/install.sh
5) Paste the superheros.csv file inside exercise/public/storage

API endpoints:
api/superheros/store -> Store all the superheros from csv to database 
api/superheros/index -> Retrieve all the superheros from database.  By default, superheroes are ordered by name from A to Z and paginated by 10 per page.

Improvements:
-Create a new table for colors and relate it with eye_color and hair_color. Set default values.
-Create a new object prototype based on Superheros model and use the height/0 and weight/0 values to calculate height/1 and weight/1. Use getKgWeight and getCmHeight helper functions (App/Helpers) to make te conversions