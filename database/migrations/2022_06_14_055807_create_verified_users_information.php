<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedUsersInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verified_users_information', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id');
            $table->string('employee_name');
            $table->string('email');
            $table->string('user_name');
            $table->string('designation');
            $table->string('department');
            $table->integer('role_id');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('verified_users_information')->insert(
            array(
                    [
                    "emp_id" => 1001,
                    "employee_name" => "Amitabh Vira",
                    "email" => "amitabh@netprophetsglobal.com",
                    "user_name" => "amitabh",
                    "designation" => "Chief Executive Officer",
                    "department" => "Management",
                    "role_id" => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1002,
                    "employee_name" => "Saurabh Rajpal",
                    "email" => "saurabh@npglobal.in",
                    "user_name" => "saurabh",
                    "designation" => "Chief Technology Officer",
                    "department" => "Management",
                    "role_id" => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1015,
                    "employee_name" => "Ramesh Malhotra",
                    "email" => "ramesh.malhotra@npglobal.in",
                    "user_name" => "ramesh.malhotra",
                    "designation" => "Chief Operating Officer",
                    "department" => "Management",
                    "role_id" => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1047,
                    "employee_name" => "Gaurav Arora",
                    "email" => "gaurav.arora@npglobal.in",
                    "user_name" => "gaurav.arora",
                    "designation" => "Vice President - Business Operations",
                    "department" => "Mobile",
                    "role_id" => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1144,
                    "employee_name" => "Ashish Chauhan",
                    "email" => "ashish.chauhan@npglobal.in",
                    "user_name" => "ashish.chauhan",
                    "designation" => "Vice President - Govt. Enterprise",
                    "department" => "Marketing",
                    "role_id" => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],

                    [
                    "emp_id" => 1005,
                    "employee_name" => "Anand Mehta",
                    "email" => "anand@npglobal.in",
                    "user_name" => "anand",
                    "designation" => "Project Manager - DBA",
                    "department" => "FabIndia",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1010,
                    "employee_name" => "Supriyo Jana Roy",
                    "email" => "supriyo.roy@npglobal.in",
                    "user_name" => "supriyo.roy",
                    "designation" => "Project Manager - Technical",
                    "department" => "FabIndia",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1014,
                    "employee_name" => "Sushil Kumar",
                    "email" => "sushil.kumar@npglobal.in",
                    "user_name" => "sushil.kumar",
                    "designation" => "Project Manager - QA",
                    "department" => "FabIndia",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1017,
                    "employee_name" => "Pankaj Sain",
                    "email" => "pankaj.sain@npglobal.in",
                    "user_name" => "pankaj.sain",
                    "designation" => "IT Manager",
                    "department" => "IT",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1018,
                    "employee_name" => "Shivani Gupta",
                    "email" => "shivani@npglobal.in",
                    "user_name" => "shivani",
                    "designation" => "Project Manager",
                    "department" => ".Net",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1019,
                    "employee_name" => "Dhananjay Kumar",
                    "email" => "dhananjay.kumar@npglobal.in",
                    "user_name" => "dhananjay.kumar",
                    "designation" => "Project Manager",
                    "department" => ".Net",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1033,
                    "employee_name" => "Ajay Singh Agarwal",
                    "email" => "ajay.agarwal@npglobal.in",
                    "user_name" => "ajay.agarwal",
                    "designation" => "Project Manager",
                    "department" => "Java",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                    [
                    "emp_id" => 1037,
                    "employee_name" => "Dheeraj Baboo",
                    "email" => "dheeraj@npglobal.in",
                    "user_name" => "dheeraj",
                    "designation" => "Project Manager",
                    "department" => ".Net",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1065,
                    "employee_name" => "Anand Kumar Pandey",
                    "email" => "anand.pandey@npglobal.in",
                    "user_name" => "anand.pandey",
                    "designation" => "Project Manager",
                    "department" => "Java",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1141,
                    "employee_name" => "Gaurav Saxena",
                    "email" => "gaurav.saxena@npglobal.in",
                    "user_name" => "gaurav.saxena",
                    "designation" => "Project Manager",
                    "department" => "DOT",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1163,
                    "employee_name" => "Sagar Kumar Agrawal",
                    "email" => "sagar.agrawal@netprophetsglobal.com",
                    "user_name" => "sagar.agrawal",
                    "designation" => "Project Manager",
                    "department" => "PHP",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1183,
                    "employee_name" => "Shubham Gupta",
                    "email" => "shubham.gupta@netprophetsglobal.com",
                    "user_name" => "shubham.gupta",
                    "designation" => "Project Manager",
                    "department" => "Mobile",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1256,
                    "employee_name" => "Ajay Singh Shekhawat",
                    "email" => "ajay.shekhawat@netprophetsglobal.com",
                    "user_name" => "ajay.shekhawat",
                    "designation" => "Project Manager",
                    "department" => ".Net",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1380,
                    "employee_name" => "Awnish Shrivastava",
                    "email" => "awnish.shrivastava@netprophetsglobal.com",
                    "user_name" => "awnish.shrivastava",
                    "designation" => "Project Manager",
                    "department" => "PHP",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1429,
                    "employee_name" => "Damanjeet Kaur",
                    "email" => "Damanjeet.Kaur@netprophetsglobal.com",
                    "user_name" => "Damanjeet.Kaur",
                    "designation" => "Project Manager",
                    "department" => "MHRD",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 10025,
                    "employee_name" => "Dhirendra Singh Bhadauria",
                    "email" => "dhirendra.Bhadauria@netprophetsglobal.com",
                    "user_name" => "dhirendra.Bhadauria",
                    "designation" => "Program Manager",
                    "department" => "DOT (Delhi police)",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 10036,
                    "employee_name" => "Vivek Sachan",
                    "email" => "Vivek.Sachan@netprophetsglobal.com",
                    "user_name" => "Vivek.Sachan",
                    "designation" => "Project Manager",
                    "department" =>"DOT",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now() 
                    ],
                    [
                    "emp_id" => 10060,
                    "employee_name" => "Kaushal Kishore ",
                    "email" => "kaushal.kishore@netprophetsglobal.com",
                    "user_name" => "kaushal.kishore",
                    "designation" => "Project Manager",
                    "department" => "NICSI HQ",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 10086,
                    "employee_name" => "Akhlad",
                    "email" => "akhlad.1@netprophetsglobal.com",
                    "user_name" => "akhlad.1",
                    "designation" => "Program Manager",
                    "department" => "Dot Net",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 10096,
                    "employee_name" => "Dinesh Kumar Vishwakarma",
                    "email" => "dineshvishwa25785@gmail.com",
                    "user_name" => "dineshvishwa25785",
                    "designation" => "Program Manager",
                    "department" => "NICSI HQ",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 10098,
                    "employee_name" => "Dushyant Kumar Dwivedi",
                    "email" => "dwivedi.dushyant007@gmail.com",
                    "user_name" => "dwivedi.dushyant007",
                    "designation" => "Project Manager",
                    "department" => "NISE",
                    "role_id" => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1424,
                    "employee_name" => "Rashmi Singh",
                    "email" => "Rashmi.Singh@netprophetsglobal.com",
                    "user_name" => "Rashmi.Singh",
                    "designation" => "IT Recruiter",
                    "department" => "HR",
                    "role_id" => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1465,
                    "employee_name" => "Prachi Sharma",
                    "email" => "Prachi.Sharma@netprophetsglobal.com",
                    "user_name" => "Prachi.Sharma",
                    "designation" => "IT Recruiter",
                    "department" => "HR",
                    "role_id" => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1490,
                    "employee_name" => "Shobhana Bansal",
                    "email" => "Shobhana.Bansal@netprophetsglobal.com",
                    "user_name" => "Shobhana.Bansal",
                    "designation" => "Sr. HR",
                    "department" => "HR",
                    "role_id" => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 1531,
                    "employee_name" => "Kunvar Singh ",
                    "email" => "Kunvar.Virk@netprophetsglobal.com",
                    "user_name" => "Kunvar.Virk",
                    "designation" => "Talent Acquisition Executive",
                    "department" => "HR",
                    "role_id" => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                  ],
                    [
                    "emp_id" => 10001,
                    "employee_name" => "Lydia George",
                    "email" => "lydia.george@netprophetsglobal.com",
                    "user_name" => "lydia.george",
                    "designation" => "Senior HR Executive",
                    "department" => "HR",
                    "role_id" => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                  ]
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verified_users_information');
    }
}
