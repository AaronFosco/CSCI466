/*
  _______________________________________________________________
 /                                                               \
||  Course: CSCI-466    Assignment #: 5    Semester: Spring 2018 ||
||                                                               ||
||  NAME:  Aaron Fosco    Z-ID: z1835687     Section: 1          ||
||                                                               ||
||  TA's Name: Ishaan Mohammed                                   ||
||                                                               ||
||  Due: Friday 3/2/2018 by 11:59PM                              ||
||                                                               ||
||  Description:                                                 ||
||                                                               ||
||    This is the script file for assignment 5. This script will ||
||    conduct quieres on a databases named 'BabyName'.           ||
||    Each select statement is prefaced with a # and a number,   ||
||    The number correlates to the question number.              ||
 \_______________________________________________________________/
 
1. Show all of the tables in the database.
2. Show all of the columns and other information about all of tables in the databases.
3. Show all of the years (once only) where your first name appears. If your name doesn’t appear, use
Laura if you are female and Luke if you are male. 
4. Show all of the names from your birth year. (again show each name only once).
5. What is the most popular male and female names from your birth year?
6.  Show all the information about names similar to your name (or the one you used above) in 
alphabetic order of the name, and within that of the count, and then of the year.
7.How many rows are in the table?
8. How many names are there in the year 1960?
9. How many names are there for each sex from the year of your father’s birth? If you don’t know what
year your father was born, use 1927.
10. List how many different names there are for each place.
*/

\T assignment5.out


use BabyName;

#1
show tables;

#2
describe BabyName;

#3
select distinct year from BabyName where name = 'Aaron' limit 50;

#4
select distinct name from BabyName where year = '1995' limit 50;

#5 couldnt find a way to only show 2 results...
select sum(count) as Total, name, gender from BabyName where year = '1995' group by name order by Total desc limit 50;

#6
select name, count, year from BabyName where name = 'Aaron' order by name limit 50;

#7
select count(*) from BabyName;

#8
select count(distinct name) from BabyName where year = '1960';

#9
select count(distinct name) as Name_Count, gender from BabyName where year = '1927' group by gender;

#10 there were two extra rows that were cut of by setting limit to 50, so 52 is used
select distinct place, count(distinct name) as Name_Count from BabyName group by place limit 52;

\t

exit

