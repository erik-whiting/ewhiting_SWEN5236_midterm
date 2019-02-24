create table AppUser
(
	id int auto_increment
		primary key,
	user_name varchar(50) not null
);

create table Cart
(
	id int auto_increment
		primary key,
	date datetime default CURRENT_TIMESTAMP not null,
	active tinyint(1) default 1 not null,
	user_id int null,
	constraint Cart__id_fk
		foreign key (user_id) references AppUser (id)
);

create table Director
(
	id int auto_increment
		primary key,
	first_name varchar(50) not null,
	last_name varchar(80) not null
);

create table Genre
(
	id int auto_increment
		primary key,
	name varchar(80) not null,
	picture_path varchar(80) null
);

create table Movie
(
	id int auto_increment
		primary key,
	name varchar(80) not null,
	year_from varchar(5) null,
	year_to varchar(5) null,
	description blob null,
	gross decimal(13,2) null,
	price decimal(4,2) not null,
	director_id int not null,
	picture_path varchar(80) null,
	constraint Movie__id_fk
		foreign key (director_id) references Director (id)
);

create table Rating
(
	id int auto_increment
		primary key,
	value int not null
);

create table Star
(
	id int auto_increment
		primary key,
	first_name varchar(50) not null,
	last_name varchar(50) not null
);

create table movie_cart
(
	id int auto_increment
		primary key,
	movie_id int not null,
	cart_id int not null,
	constraint movie_cart_Cart_id_fk
		foreign key (cart_id) references Cart (id),
	constraint movie_cart_Movie_id_fk
		foreign key (movie_id) references Movie (id)
);

create table movie_genre
(
	id int auto_increment
		primary key,
	movie_id int not null,
	genre_id int not null,
	constraint movie_genre_Genre_id_fk
		foreign key (genre_id) references Genre (id),
	constraint movie_genre_Movie_id_fk
		foreign key (movie_id) references Movie (id)
);

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
);

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
);
