create table AppUser
(
	id int auto_increment
		primary key,
	user_name varchar(50) not null
)
;

create table Cart
(
	id int auto_increment
		primary key,
	date datetime default CURRENT_TIMESTAMP not null,
	active tinyint(1) default '1' not null
)
;

create table Director
(
	id int auto_increment
		primary key,
	first_name varchar(50) not null,
	last_name varchar(80) not null
)
;

create table Genre
(
	id int auto_increment
		primary key,
	name varchar(80) not null
)
;

create table Movie
(
	id int auto_increment
		primary key,
	name varchar(80) not null,
	year_from varchar(5) null,
	year_to varchar(5) null,
	description blob null,
	gross decimal(13,2) null,
	price decimal(4,2) not null
)
;

create table Rating
(
	id int auto_increment
		primary key,
	value int not null
)
;

create table Star
(
	id int auto_increment
		primary key,
	first_name varchar(50) not null,
	last_name varchar(50) not null
)
;

create table movie_cart
(
	id int auto_increment
		primary key,
	movie_id int not null,
	cart_id int not null,
	constraint movie_cart_Movie_id_fk
		foreign key (movie_id) references Movie (id),
	constraint movie_cart_Cart_id_fk
		foreign key (cart_id) references Cart (id)
)
;

create index movie_cart_Cart_id_fk
	on movie_cart (cart_id)
;

create index movie_cart_Movie_id_fk
	on movie_cart (movie_id)
;

create table movie_genre
(
	id int auto_increment
		primary key,
	movie_id int not null,
	genre_id int not null,
	constraint movie_genre_Movie_id_fk
		foreign key (movie_id) references Movie (id),
	constraint movie_genre_Genre_id_fk
		foreign key (genre_id) references Genre (id)
)
;

create index movie_genre_Genre_id_fk
	on movie_genre (genre_id)
;

create index movie_genre_Movie_id_fk
	on movie_genre (movie_id)
;

create table movie_rating
(
	id int auto_increment
		primary key,
	movie_id int not null,
	rating_id int not null,
	constraint movie_rating_Movie_id_fk
		foreign key (movie_id) references Movie (id),
	constraint movie_rating_Rating_id_fk
		foreign key (rating_id) references Rating (id)
)
;

create index movie_rating_Movie_id_fk
	on movie_rating (movie_id)
;

create index movie_rating_Rating_id_fk
	on movie_rating (rating_id)
;

create table movie_star
(
	id int auto_increment
		primary key,
	movie_id int not null,
	star_id int not null,
	constraint movie_star_Movie_id_fk
		foreign key (movie_id) references Movie (id),
	constraint movie_star_Star_id_fk
		foreign key (star_id) references Star (id)
)
;

create index movie_star_Movie_id_fk
	on movie_star (movie_id)
;

create index movie_star_Star_id_fk
	on movie_star (star_id)
;

create table user_cart
(
	id int auto_increment
		primary key,
	user_id int not null,
	cart_id int not null,
	constraint user_cart_AppUser_id_fk
		foreign key (user_id) references AppUser (id),
	constraint user_cart_Cart_id_fk
		foreign key (cart_id) references Cart (id)
)
;

create index user_cart_AppUser_id_fk
	on user_cart (user_id)
;

create index user_cart_Cart_id_fk
	on user_cart (cart_id)
;
