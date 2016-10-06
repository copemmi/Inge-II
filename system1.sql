CREATE TABLESPACE NW_DATOS
DATAFILE 'C:\oraclexe\app\oracle\oradata\XE\NW_DATOS.dBF'
SIZE 20M ONLINE;

CREATE TEMPORARY TABLESPACE NW_TEMP
TEMPFILE 'C:\oraclexe\app\oracle\oradata\XE\NW_TEMP.dBF'
SIZE 5M AUTOEXTEND ON;

CREATE  TABLESPACE NW_INDICES
DATAFILE 'C:\oraclexe\app\oracle\oradata\XE\NW_INDICES.dBF'
SIZE 15M EXTENT MANAGEMENT LOCAL SEGMENT SPACE MANAGEMENT AUTO;


CREATE USER NW IDENTIFIED BY root
DEFAULT TABLESPACE NW_DATOS

TEMPORARY TABLESPACE NW_TEMP;

GRANT RESOURCE TO NW;
GRANT CONNECT TO NW;
GRANT ALL PRIVILEGES TO NW;

--1.3
ALTER TABLESPACE NW_DATOS ADD DATAFILE 'C:\oraclexe\app\oracle\oradata\XE\NW_DATOS2.DBF' SIZE 100M;



--1.4
ALTER USER NW DEFAULT TABLESPACE NW_INDICES;


--PARTE 2
--CREACIÓN DE TABLAS
CREATE TABLE NW.Customers(
	CustomerID char(5) NOT NULL,
	CompanyName varchar2(40) NOT NULL,
	ContactName varchar2(30) NULL,
	ContactTitle varchar2(30) NULL,
	Address varchar2(60) NULL,
	City varchar2(15) NULL,
	Region varchar2(15) NULL,
	PostalCode varchar2(10) NULL,
	Country varchar2(15) NULL,
	Phone varchar2(24) NULL,
	Fax varchar2(24) NULL
);


CREATE TABLE NW.Products(
	ProductID number(20) NOT NULL,
	ProductName varchar2(40) NOT NULL,
	SupplierID number(20) NULL,
	CategoryID number(20) NULL,
	QuantityPerUnit varchar2(20) NULL,
	UnitPrice float NULL,
	UnitsInStock number(20) NULL,
	UnitsOnOrder number(20) NULL,
	ReorderLevel number(20) NULL,
	Discontinued float NOT NULL
) ;

CREATE TABLE NW.Orders(
	OrderID number(20) NOT NULL,
	CustomerID char(5) NULL,
	EmployeeID number(20) NULL,
	OrderDate date NULL,
	RequiredDate date NULL,
	ShippedDate date NULL,
	ShipVia number(20) NULL,
	Freight float NULL,
	ShipName varchar2(40) NULL,
	ShipAddress varchar2(60) NULL,
	ShipCity varchar2(15) NULL,
	ShipRegion varchar2(15) NULL,
	ShipPostalCode varchar2(10) NULL,
	ShipCountry varchar2(15) NULL
);

CREATE TABLE NW.Order_Details(
	OrderID number(20) NOT NULL,
	ProductID number(20) NOT NULL,
	UnitPrice float NOT NULL,
	Quantity number(20) NOT NULL,
	Discount float NOT NULL
);



