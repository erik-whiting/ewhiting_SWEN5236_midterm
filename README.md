# ewhiting_SWEN5236_midterm
This is my midterm for SWEN 5236 - Engineering Software 1 at UHCL Spring 2019.
You can see this repo live here: 
http://ewhiting.eastus.cloudapp.azure.com/midterm/

## Navigation
Navigation cues are included in the web pages. The index page is a list of movies by 
genre and can be reached by clicking "Erik's SWEN 5236 Midterm" button in the top 
menu.  From the movies page, you can click "Add to Cart" on any movie to add the movie
to your cart.  To view your cart, click the "Your Cart" button in the top menu. Here 
you can see your subtotal, taxes, and grand total.
From your cart page, you can click "checkout." This will clear your cart, there is 
no actual money or anything, so click away.

## Data Loading
The data in the database was loaded using mockaroo.com (thank you).  The data was bulk
loaded without any concern for it making sense.  So you might see "Fast and the Furious" 
in the "Myster" genre.  To view the schema, look at the "CreateTables.sql" file in the 
root folder.

## Architecture
This project is written in PHP and JavaScript.  The only framework used is Bootstrap 
for the CSS.  Each entity is programmed into a class with functions for executing 
common functions.  Most everything in the backend is implemented as a REST service 
and consumed using AJAX on the front end.
