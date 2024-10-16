/*
The LEGO set database comprises of the following:
- The official name of the LEGO set
- Visual representations of the set
- Recommended age range for use
- Total count of LEGO pieces in the set
- Numerical identifier for each set
- Precise measurements of the LEGO set (height, width, and depth)
- Categorization under pertinet LEGO names, subjects, and subthemes
- Official LEGO building instructions
- The original retail price, if available
- Current market value based on eBay listings
- Direct link to the product on the LEGO website
- Direct link to the current eBay listings for the set
*/

/* Creates the LEGO sets database */
CREATE DATABASE IF NOT EXISTS legomodels;

/* Switch to the legomodels database */
USE legomodels;

/* Drop exisiting tables */
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS details;
DROP TABLE IF EXISTS groups;
DROP TABLE IF EXISTS links;
DROP TABLE IF EXISTS assets;

/* Create the tables */

CREATE TABLE products (
   productName varchar(255),
   itemNumber varchar(50),
   htmlDescription mediumtext,
   ageGroup char(125),
   image mediumblob,
   PRIMARY KEY (itemNumber)
);

CREATE TABLE details (
   itemNumber varchar(50) NOT NULL,
   height char(150), -- Tallest Lego set -> Eiffel Tower (149 cm)
   width char(150),
   depth char(150),
   pieces varchar(12000) NOT NULL, -- Lego set 31203: 11,695 pieces
   FOREIGN KEY (itemNumber) REFERENCES products (itemNumber)
);

CREATE TABLE groups (
   itemNumber varchar(50) NOT NULL,
   groupName varchar(65535) NOT NULL,
   productSubject varchar(65535) NOT NULL,
   productSubTheme varchar(65535),
   FOREIGN KEY (itemNumber) REFERENCES details (itemNumber)
);

CREATE TABLE links (
   itemNumber varchar(50),
   legoUrl varchar(2083) NOT NULL, -- max url length
   ebayUrl varchar(2083) NOT NULL,
   legoInstructions varchar(2083) NOT NULL,
   FOREIGN KEY (itemNumber) REFERENCES groups (itemNumber)
);

CREATE TABLE assets (
   itemNumber varchar(50) NOT NULL,
   buyPrice decimal(6,2),
   MSRP decimal(6,2),
   FOREIGN KEY (itemNumber) REFERENCES links (itemNumber)
);