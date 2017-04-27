--MySQL Database Updates to add an autoincrement to the employees (emp_no) field:

--first drop foreign keys so that i can change field
ALTER TABLE salaries
DROP FOREIGN KEY salaries_ibfk_1;

ALTER TABLE dept_emp
DROP FOREIGN KEY dept_emp_ibfk_1;

ALTER TABLE dept_manager
DROP FOREIGN KEY dept_manager_ibfk_1;

ALTER TABLE titles
DROP FOREIGN KEY titles_ibfk_1;

--change emp_no field to add auto increment
ALTER TABLE employees 
CHANGE emp_no emp_no INT(11) 
AUTO_INCREMENT;

--set auto increment start (max existing value + 1)
ALTER TABLE employees AUTO_INCREMENT=500000;

--readd all the bloody foreign keys.
ALTER TABLE dept_emp
ADD CONSTRAINT dept_emp_ibfk_1
FOREIGN KEY (emp_no)
REFERENCES employees(emp_no)

ALTER TABLE dept_manager
ADD CONSTRAINT dept_manager_ibfk_1
FOREIGN KEY (emp_no)
REFERENCES employees(emp_no)

ALTER TABLE titles
ADD CONSTRAINT titles_ibfk_1
FOREIGN KEY (emp_no)
REFERENCES employees(emp_no)

ALTER TABLE salaries
ADD CONSTRAINT salaries_ibfk_1
FOREIGN KEY (emp_no)
REFERENCES employees(emp_no);

--Create login table with webusers
CREATE TABLE webusers (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `user_pwd` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name_UNIQUE` (`user_name`)
);

--add a user to webusers
INSERT INTO webusers (user_name, user_pwd)
VALUES ('ryans', '$2y$10$/Oz5UkYsIf.kourGJ4DmOuE5KTUncL5Wnns0JiQxjktvjbgyvCEUa');



