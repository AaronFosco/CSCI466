/*
  _______________________________________________________________
 /                                                               \
||  Course: CSCI-466    Assignment #: 6    Semester: Spring 2018 ||
||                                                               ||
||  NAME:  Aaron Fosco    Z-ID: z1835687     Section: 1          ||
||                                                               ||
||  TA's Name: Ishaan Mohammed                                   ||
||                                                               ||
||  Due: Wednesday 3/21/2018 by 11:59PM                          ||
||                                                               ||
||  Description:                                                 ||
||                                                               ||
||    This is the script file for assignment 6. This script will ||
||    conduct quieres on a database that was made using the      ||
||    script "alexamaraload.sql".                                ||
||                                                               ||
||    This Doesn't Have a Use Statement & thus will need one to  ||
||    executed before the sript is ran.                          ||
||                                                               ||
||    Each select statement is prefaced with a # and a number,   ||
||    The number correlates to the question number.              ||
 \_______________________________________________________________/

1.List all owner names last, first and the name and type of their 
boat and in alphabetic order of last name
2.List all of the owners who have more than one boat, and how many 
boats they own. 
3.For each service request, list the Description of the request as 
well as the Owner last name.
4.For each service category list the Category Description and how 
many service requests there are for each category.
5.List all of the owners (name, city, and state) and the Name of the 
marina where they keep their boat, in alphabetic order of city and 
within city of last name.
6. What is the total rental fee amount for each Marina in the 
database?
7.For each service request list the estimated hours, spent hours and 
the difference. Just list the ServiceId and the hours information. 
All the columns should be renamed.
8.List the last name of the owners (and their boat's name) who own a 
boat that is 30 feet long or shorter.
9.For each boat, list the name and next service date
10.List each boat name, the owner's last name, the slip number and 
Marina name in alphabetic order of boat name within the alphabetic 
order of the marina name
*/

\T assignment6.out

#1
select LastName,FirstName,BoatName,BoatType from Owner,MarinaSlip where Owner.OwnerNum = MarinaSlip.OwnerNum order by LastName;

#2
select LastName,FirstName,count(MS.OwnerNum) as NumOfBoats from Owner O,MarinaSlip MS where O.OwnerNum = MS.OwnerNum group by O.OwnerNum having NumOfBoats > 1;


#3
select Description,LastName from ServiceRequest SR, Owner O, MarinaSlip MS where SR.SlipID = MS.SlipID and MS.OwnerNum = O.OwnerNum order by LastName;

#4
select CategoryDescription,count(SR.ServiceID) as NumOfReq from ServiceCategory SC, ServiceRequest SR where SC.CategoryNum = SR.CategoryNum group by SC.CategoryNum;

#5
select FirstName,LastName,O.City,M.Name from Owner O, MarinaSlip MS, Marina M where O.OwnerNum = MS.OwnerNum and MS.MarinaNum = M.MarinaNum order by O.City,M.Name;

#6
select M.Name,sum(RentalFee) from MarinaSlip MS, Marina M where MS.MarinaNum = M.MarinaNum group by M.MarinaNum;

#7 (This question didnt seem to correlate with this assignment...)
select EstHours as "Estimated Hours", SpentHours as "Spent Hours", (EstHours - SpentHours) as "Diffrence Between Est & Spent Hours", ServiceID as "The Number that corrlates to the service in a linear fashon" from ServiceRequest order by ServiceID;

#8
select LastName,BoatName,Length from Owner O, MarinaSlip MS where Length <= 30 and O.OwnerNum = MS.OwnerNum order by LastName; 

#9
select BoatName,MIN(NextServiceDate) from ServiceRequest SR, MarinaSlip MS where SR.SlipID = MS.SlipID group by BoatName order by BoatName;

#10
select BoatName,LastName,SlipNum,Name from Marina M, MarinaSlip MS, Owner O where O.OwnerNum = MS.OwnerNum and MS.MarinaNum = M.MarinaNum order by BoatName,Name;

\t

exit
