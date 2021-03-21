SQL CODE

CREATE TABLE Personal_Info (
    Student_ID int(5),
    First_Name varchar(255),
    Last_Name varchar(255),
    PRIMARY KEY(Student_ID)
)    

CREATE TABLE Contact_Info (
    Student_ID int(5),
    Phone_Number varchar(11),
    Email varchar(255),
    PRIMARY KEY (Student_ID),
    FOREIGN KEY (Student_ID) REFERENCES personal_info(Student_ID)  ON DELETE CASCADE
)    

CREATE TABLE Additional_Info (
    Student_ID int(5),
    PreviousSchool varchar(255),
    HighestQualification varchar(255),
    MarketingPreference ENUM('Email', 'SMS','Both','None'),
    Privacy boolean,
    PRIMARY KEY (Student_ID),
    FOREIGN KEY (Student_ID) REFERENCES personal_info(Student_ID)  ON DELETE CASCADE
)

CREATE TABLE Queue (
    Student_ID int(5),
    Queue_Num int(5),
    session TIMESTAMP,
    PRIMARY KEY(Queue_Num,Student_ID)
)

CREATE TABLE Staff (
    Staff_ID int(5),
    Type ENUM('Admin','Counselor'),
    First_Name varchar(255),
    Last_Name varchar(255),
    Username varchar(255),
    Password varchar(255),
    Display_Name varchar(255),
    Serving int(5),
    PRIMARY KEY(Staff_ID)
)   

CREATE TABLE Queue_Staff (
    Staff_ID int(5),
    Queue_Num int(5),
    session TIMESTAMP,
    PRIMARY KEY(Queue_Num,Staff_ID)
)

CREATE TABLE student_Remark (
    Student_ID int(5),
    Remark varchar(65535),
    PRIMARY KEY(Student_ID)
)

INSERT INTO `staff` (`Staff_ID`, `First_Name`, `Last_Name`, `Username`, `Password`, `Display_Name`, `Serving`,`Type`) VALUES
(1, 'Master', 'Account', 'Admin', 'a1', 'Counter One', NULL,'Admin'),
(2, 'One', 'Account', 'One', 'a1', 'Counter One', NULL,'Counselor'),
(3, 'Two', 'Account', 'Two', 'a1', 'Counter Two', NULL,'Counselor'),
(4, 'Three', 'Account', 'Three', 'a1', 'Counter Three', NULL,'Counselor'),
(5, 'Four', 'Account', 'Four', 'a1', 'Counter Four', NULL,'Counselor');