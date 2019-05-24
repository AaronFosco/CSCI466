/*
An astrik (*) denotes a primary key
A pound sign (#) denotes a foreign key


Therapist(*tID, specialty, name, contact)



Patient(*pID, name, age, contact)




Exercises(*eID, bodypart)




Appointments(#*pID, #*tID, *date, #eID, time, duration)
*/
use cs566101;
drop table if exists Appointments;
drop table if exists Exercises;
drop table if exists Patient;
drop table if exists Therapist;


create table Therapist
   (tID int auto_increment primary key,
   specialty char(30),
   name char(30),
   contact char(11));
   
create table Patient
   (pID int auto_increment primary key,
   name char(30),
   age int,
   contact char(11));

create table Exercises
   (eID int auto_increment primary key,
   bodypart char(30));
   
create table Appointments
   (pID int,
   tID int,
   bodypart char(30),
   date date,
   time time,
   duration int,
   primary key(pID, tID, date),
   foreign key(pID) references Patient(pID),
   foreign key(tID) references Therapist(tID));


insert into Patient (name, age, contact) values
   ('John Doe', '33', '8477709433'),
   ('Michonne Grimes', '49', '2243370962'),
   ('Dean Winchester', '22', '2244278916'),
   ('Luke Spencer', '28', '6306583612'),
   ('Shane Walsh', '99', '3127930765');

insert into Therapist (specialty, name, contact) values
   ('Legs', 'Daryl Dixon', '8471092440'),
   ('Arms', 'Sam Peletier', '8475940528'),
   ('Abdominals', 'Harold Finch', '6304403104'),
   ('Shoulders', 'Andy Sipowicz', '2241373564'),
   ('Mental', 'Lionel Fuscon', '3122150831');

insert into Exercises(bodypart) values
   ('Brain'),
   ('Rectus Abdominis'),
   ('Obliquus Externus abdominis'),
   ('Deltoideus'),
   ('Trapezius'),
   ('Triceps Brachii'),
   ('Biceps Brachii'),
   ('Gluteus Maximus'),
   ('Quadriceps Femoris');

insert into Appointments(pID, tID, bodypart, date, time, duration) values
   ('2', '4', 'Brain', '2018-4-28', '9:00:00', '15'),
   ('1', '2', 'Biceps Brachii', '2018-4-29', '12:00:00', '30'),
   ('3', '3', 'Trapezius', '2018-4-24', '14:45:00', '15'),
   ('5', '5', 'Brain', '2018-5-9', '23:30:00', '30'),
   ('4', '2', 'Deltoideus', '2018-5-2', '17:15:00', '45'),
   ('4', '1', 'Gluteus Maximus', '2018-4-21', '6:00:00', '45'),
   ('2', '3', 'Quadriceps Femoris', '2018-5-20', '13:00:00', '30'),
   ('3', '4', 'Rectus Abdominis', '2018-5-18', '9:15:00', '45');
   
