/*
  _______________________________________________________________
 /                                                               \
||  Course: CSCI-466    Assignment #: 12   Semester: Spring 2018 ||
||                                                               ||
||  NAME:  Aaron Fosco    Z-ID: z1835687     Section: 1          ||
||                                                               ||
||  TA's Name: Ishaan Mohammed                                   ||
||                                                               ||
||  Due: Wednesday 5/2/2018 by 11:59PM                           ||
||                                                               ||
||  Description:                                                 ||
||                                                               ||
||    This is the main file for assignemnt 12. It will conduct   ||
||    queries on multiple tables and print out the results in a  ||
||    somewhat ordered fashion.                                  ||
||                                                               ||
||    * * * NOTE * * *                                           ||
||    Use z1835687 is used to enter a personal database          ||
 \_______________________________________________________________/
*/

#include <mysql.h>
#include <iostream>
#include <cstdlib>
#include <iomanip>
#include <cstring>

using namespace std;

#define SERVER "students"
#define USER "z1835687"
#define PASSWORD "------"
#define DATABASE "z1835687"

int main()
{
   MYSQL *connect, mysql;
   
   connect = mysql_init(&mysql);
   
   connect = mysql_real_connect(connect, SERVER, USER, PASSWORD,
                                DATABASE, 0, NULL, 0);
				
   if (connect)
   {
      cout << "Connection Established...\n\n";
      
      //initialize varables
      MYSQL_RES *res_set1, *res_set2, *res_set3;
      MYSQL_ROW rowo, rowb, rows, row;
      MYSQL_FIELD *mfields;
      
      //first query for "List each Marina"
      mysql_query(connect, "select * from Marina");
      res_set1 = mysql_store_result(connect);
      
      
      unsigned int nf = mysql_num_fields(res_set1);
      mfields = mysql_fetch_fields(res_set1);
      
      //Output each column descrition
      for (unsigned int i = 0; i < nf; i++)
         cout << setw(17) << mfields[i].name << " | ";
      cout << endl;
      
      //print "select * from Marina"
      while ((row = mysql_fetch_row(res_set1)) != nullptr)
      {
         for (unsigned int i = 0; i < nf; i++)
	    cout << setw(17) << row[i] << " | ";
	 
         cout << endl;   
      }
      cout << endl;
      
      mysql_free_result(res_set1);
      
      //Query of "Each owner first and last name and city"
      mysql_query(connect, "select OwnerNum, FirstName, LastName, City from Owner");
      res_set1 = mysql_store_result(connect);
      
      //This is used to conduct a query that requires a where clause
      char querypart[128];
      memset(querypart, '\0', 128);
      
      //Inital loop to Print each Owner
      while ((rowo = mysql_fetch_row(res_set1)) != nullptr)
      {
         cout << "Name: " << rowo[1] << ' ' << rowo[2];
	 cout << "\nCity: " << rowo[3] << endl;
	 
	 //Query of "under each owner, list each boat"
	 strcat(querypart, "select SlipID, BoatName from MarinaSlip where MarinaSlip.OwnerNum = ");
	 strcat(querypart, rowo[0]);
	 
         mysql_query(connect, querypart);
	 memset(querypart, '\0', 128);
	 res_set2 = mysql_store_result(connect);
	 
	 //Second Loop to print out boat names under the owner names
	 while ((rowb = mysql_fetch_row(res_set2)) != nullptr)
	 {
	    cout << "--->Boat Name: " << rowb[1] << "\n\n";
	    
	    //Query of "under each boat, list all the service requests"
	    strcat(querypart, "select Description, Status from ServiceRequest where SlipID = ");
	    strcat(querypart, rowb[0]);
	    
	    mysql_query(connect, querypart);
	    memset(querypart, '\0', 128);
	    res_set3 = mysql_store_result(connect);
	    
	    //Final loop to print out each service under a boat name
	    while ((rows = mysql_fetch_row(res_set3)) != nullptr)
	    {
	       //Put this here because a row in the Service Table
	       //was null, seemingly from the previous assignment
	       if (rows != nullptr)
	       {
	          cout << "------>Description: " << rows[0];
	          cout << "\n------>Status: " << rows[1] << "\n\n";
	       }
	    }
	    mysql_free_result(res_set3);
	 }
	 cout << endl;
         mysql_free_result(res_set2);
      }
      cout << endl;
      mysql_free_result(res_set1);
      
      mysql_close(connect);
   
   } else 
   {
      cerr << "couldn't connect!";
      exit(1);
   }
   return 0;
}
