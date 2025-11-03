CREATE DATABASE workshop_db;
USE workshop_db;

CREATE TABLE User (
  UserID INT AUTO_INCREMENT PRIMARY KEY,
  Email VARCHAR(50),
  Vehicle VARCHAR(50),
  Testimonial MEDIUMTEXT,
  FullName VARCHAR(50),
  password_hash VARCHAR(255) NOT NULL,
);

CREATE TABLE Technician (
  TechnicianID INT AUTO_INCREMENT PRIMARY KEY,
  Skills ENUM('Mechanic','Electrician','Painter','Inspector','Other'),
  Name VARCHAR(50),
  Birthday DATE,
  Email VARCHAR(50)
);

CREATE TABLE Service (
  ServiceID INT AUTO_INCREMENT PRIMARY KEY,
  BookingID INT,
  Name VARCHAR(50),
  Price INT,
  ToolID INT,
  FOREIGN KEY (ToolID) REFERENCES Tool(ToolID)
);

CREATE TABLE Tool (
  ToolID INT AUTO_INCREMENT PRIMARY KEY,
  ServiceID INT,
  Name VARCHAR(50),
  Manufacturer VARCHAR(50),
  FOREIGN KEY (ServiceID) REFERENCES Service(ServiceID)
);

CREATE TABLE Booking (
  BookingID INT AUTO_INCREMENT PRIMARY KEY,
  ServiceID INT,
  UserID INT,
  DateAndTime DATETIME,
  SpecialRequest MEDIUMTEXT,
  FOREIGN KEY (UserID) REFERENCES User(UserID),
  FOREIGN KEY (ServiceID) REFERENCES Service(ServiceID)
);
