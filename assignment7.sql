
/*
  _______________________________________________________________
 /                                                               \
||  Course: CSCI-466    Assignment #: 7    Semester: Spring 2018 ||
||                                                               ||
||  NAME:  Aaron Fosco    Z-ID: z1835687     Section: 1          ||
||                                                               ||
||  TA's Name: Ishaan Mohammed                                   ||
||                                                               ||
||  Due: Wednesday 3/28/2018 by 11:59PM                          ||
||                                                               ||
||  Description:                                                 ||
||                                                               ||
||    This is the script file for assignment 7. This will create ||
||    tables in a database and enter in entries. This will also  ||
||    edit some of the columbs.                                  ||
||                                                               ||
||    * * * NOTE * * *                                           ||
||    Use z1835687 is used to enter a personal database          ||
 \_______________________________________________________________/
 



owner(ownerid, fname, lname)
pet(petid, pname, pdob, ownerid)
*/

\T assignment7.out


use z1835687;

#1
drop table if exists pet;
drop table if exists owner;
drop table if exists combine;

#2
create table owner
	(ownerid int auto_increment primary key,
	fname varchar(15),
	lname varchar(15));

#3	
insert into owner(fname, lname)
	values('John','Doe');
insert into owner(fname, lname)
	values('Michonne','Grimes');
insert into owner(fname, lname)
	values('Sophia', 'Peletier');
insert into owner(fname, lname)
	values('Rick','Grimes');
insert into owner(fname, lname)
	values('Luke', 'Spencer');

#4
select * from owner;

#5	
create table pet
	(petid int auto_increment primary key,
	pname varchar(20),
	pdob varchar(10),
	ownerid int,
	foreign key(ownerid) references owner(ownerid));
	
#6
insert into pet (pname, pdob, ownerid)
	values('Fluffy Mc. Fluf', '2010-03-28', 1);
insert into pet (pname, pdob, ownerid)
	values('Gus','2012-05-11', 2);
insert into pet (pname, pdob, ownerid)
	values('Cantalope','2006-07-16', 3);
insert into pet (pname, pdob, ownerid)
	values('Corrin','2009-09-03', 3);
insert into pet (pname, pdob, ownerid)
	values('Myr','2018-01-28', 4);
insert into pet (pname, pdob, ownerid)
	values('Genbu','2000-05-09',5);

#7
select * from pet;

#8
alter table pet
	add ptype varchar(15);
	
#9
update pet set ptype = 'cat' where petid = 1;
update pet set ptype = 'dog' where petid = 2;
update pet set ptype = 'cat' where petid = 3;
update pet set ptype = 'lizard' where petid = 4;
update pet set ptype = 'goldfish' where petid = 5;
update pet set ptype = 'turtle' where petid = 6;

#10
alter table pet
	drop pdob;
alter table pet
	add pdob date;
	
update pet set pdob = '2010-03-28' where petid = 1;
update pet set pdob = '2012-05-11' where petid = 2;
update pet set pdob = '2006-07-16' where petid = 3;
update pet set pdob = '2009-09-03' where petid = 4;
update pet set pdob = '2018-01-28' where petid = 5;
update pet set pdob = '2000-05-09' where petid = 6;

#11
select * from pet;

#12
create table combine as (select pname, fname, lname from pet,owner where pet.ownerid = owner.ownerid);

#13
select * from combine;

\t
