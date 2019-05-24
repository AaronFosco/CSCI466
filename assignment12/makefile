#  _______________________________________________________________
# /                                                               \
#||  Course: CSCI-466    Assignment #: 12   Semester: Spring 2018 ||
#||                                                               ||
#||  NAME:  Aaron Fosco    Z-ID: z1835687     Section: 1          ||
#||                                                               ||
#||  TA's Name: Ishaan Mohammed                                   ||
#||                                                               ||
#||  Due: Wednesday 5/2/2018 by 11:59PM                           ||
#||                                                               ||
#||  Description:                                                 ||
#||                                                               ||
#||    This is the make file for assignment 12.                   ||
# \_______________________________________________________________/
 
# Compiler variables
CCFLAGS = -Wall -std=c++11

# Rule to link object code files to create executable file
assignment12: assignment12.o
	g++ $(CCFLAGS) -o assignment12 assignment12.o -L /usr/include/mysql -l mysqlclient -I /usr/include/mysql

# Rules to compile source code file to object code
assignment12.o: assignment12.cpp
	g++ $(CCFLAGS) -c assignment12.cpp -L /usr/include/mysql -l mysqlclient -I /usr/include/mysql
	
# Pseudo-target to remove object code and executable files
clean:
	-rm *.o assignment12
