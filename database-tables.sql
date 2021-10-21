create database miniproject21;
use miniproject21;
create table login(user_type varchar(30), phone_no int, password varchar(30), primary key(phone_no));
create table department(dept_name varchar(30), student_count int, faculty_count int, primary key(dept_name));
create table subject(subject_name varchar(30), subject_id int, semester int, faculty_name varchar(30), dept_name varchar(30), primary key(subject_id, faculty_name), foreign key(dept_name) references department(dept_name));
create table student(student_name varchar(30), roll_no int, prn int, dept_name varchar(30), year int, phone_no int, primary key(prn), foreign key(dept_name) references department(dept_name), foreign key(phone_no) references login(phone_no));
create table faculty(faculty_id int, faculty_name varchar(30), dept_name varchar(30), subject_name varchar(30), subject_id int, phone_no int, primary key(faculty_id), foreign key(dept_name) references department(dept_name), foreign key(phone_no) references login(phone_no));
create table attendance(prn int, student_name varchar(30), date date, subject_name varchar(30), faculty_name varchar(30), attendance_status tinyint, subject_id int, foreign key(prn) references student(prn), foreign key(subject_id) references subject(subject_id));