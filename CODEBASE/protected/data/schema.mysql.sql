Create Table `Soft_Type` (
	ID int(10) NULL NOT NULL auto_increment,
	Type varchar(255) NUll,
	PRIMARY Key(ID) 
)engine=innodb charset=utf8;

Create Table `Soft_Resource` (
	ID int(10) NUll NOT NULL auto_increment,
	Version FLOAT(10) NUll NOT NULL,
	Type_ID int(10) NUll NOT NULL,
	PATH_CG varchar(255) NUll,
	PRIMARY Key(ID),
	FOREIGN KEY (`Type_ID`) REFERENCES Soft_Type(`ID`)
)engine=innodb charset=utf8;