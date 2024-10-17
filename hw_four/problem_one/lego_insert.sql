/* Inserting data */
INSERT INTO products(productName,itemNumber,htmlDescription,ageGroup,image) 
VALUES 
('Old Trafford - Manchester United',10272,'Build your own Theatre of Dreams Captivate your inner sport fan with this incredibly detailed Old Trafford set.Whether you’re a Manchester United supporter or just a fan of amazing stadiums, LEGO® Creator Expert Old Trafford is the ultimate build for sport fans. From treasured details like the Munich Clock and statues of Sir Alex, Matt and the United Trinity, to faithful reproductions of the pitch and the Stretford End, this exclusive and intricately designed model delivers as both a challenging building experience and commemorative display piece.',16,NULL),
('Camp Nou – FC Barcelona',10284,'Stadium of stars Build a piece of history and pay tribute to over seven decades of amazing FC Barcelona moments.',18,NULL),
("Hogwarts™ Icons - Collectors' Edition",76391,'Cast a spell to unwind and relax as you transform 3,010 LEGO® bricks into a stunning tribute to the LEGO® Harry Potter™ universe.',18,NULL),
("Hogwarts Express™ – Collectors' Edition",76405,'Now departing Platform 9 ¾™ Bring the magic of Harry Potter™ home with an all-new buildable, 1:32 scale replica of the Hogwarts Express™.',18,NULL),
("Gringotts™ Wizarding Bank – Collectors' Edition",76417,'From the opulent foyer and mezzanine floor with a safe in the wall where Hagrid’s secret package is kept, to a spiraling vault cart track with a mechanism that stops the cart at each of 3 underground vaults, The Gringotts™ Wizarding Bank – Collectors’ Edition is indeed a treasure to behold. Stack the two models with the Ukrainian Ironbelly dragon perched on top of the bank to complete a magical, spectacular centerpiece.',18,NULL),
("The Burrow – Collectors' Edition",76437,'Ron Weasley’s family home is so much more than a house. Filled with colorful details and cozy corners, this curious, charming abode buzzes with warmth, love, and plenty of magic. Add this all-new version of The Burrow to your LEGO® Harry Potter™ collection of iconic Wizarding World locations.',18,NULL),
('AT-AT™',75313,'This stunning new AT-AT™ features movable, posable legs to recreate the famous scene from Star Wars: The Empire Strikes Back.',18,NULL),
("Jabba's Sail Barge™",75397,'An early scene in Star Wars: Return of the Jedi™ gave us our first (and, spoiler, last) look at Jabba the Hutt’s luxury Sail Barge – The Khetanna. Now this iconic ship comes back to life as an Ultimate Collector Series building set, complete with a galaxy of rich details and play options for fans.',18,NULL);

INSERT INTO details(itemNumber,height,width,depth,pieces) 
VALUES 
(10272,19,39,47,3898),
(10284,20,49,46,5509),
(76391,44,50,33,3010),
(76405,26,20,118,5129),
(76417,79,32,25,4801),
(76437,46,25,23,2405),
(75313,62,24,69,6785),
(75397,25,77,25,3942);

INSERT INTO groups(itemNumber,groupName,productSubject,productSubTheme) 
VALUES 
(10272,'Lego Icons','Larger sets generally aimed at an adult audience','Sports'),
(10284,'Creator Expert','Larger sets generally aimed at an adult audience ','Sports'),
(76391,'Lego Harry Potter','Wizarding World','Fantasy'),
(76405,'Lego Harry Potter','Wizarding World','Trains'),
(76417,'Lego Harry Potter','Wizarding World','Buildings'),
(76437,'Lego Harry Potter','Wizarding World','Buildings'),
(75313,'Lego Star Wars','Star Wars','Adults Welcome'),
(75397,'Lego Star Wars','Star Wars','Fantasy');

INSERT INTO links(itemNumber,legoUrl,ebayUrl,legoInstructions) 
VALUES 
(10272,'https://www.lego.com/en-us/product/old-trafford-manchester-united-10272','https://www.ebay.com/sch/i.html?_from=R40&_trksid=p4432023.m570.l1311&_nkw=old+trafford+lego&_sacat=0','https://www.lego.com/en-us/service/buildinginstructions/10272'),
(10284,'https://www.lego.com/en-us/product/camp-nou-fc-barcelona-10284','https://www.ebay.com/sch/i.html?_from=R40&_trksid=p2499334.m570.l1311&_nkw=camp+nou+lego+set&_sacat=0','https://www.lego.com/en-us/service/buildinginstructions/10284'),
(76391,'https://www.lego.com/en-us/product/hogwarts-icons-collectors-edition-76391','https://www.ebay.com/sch/i.html?_from=R40&_trksid=p4432023.m570.l1311&_nkw=lego+harry+potter+collectors+edition&_sacat=0','https://www.lego.com/en-us/service/buildinginstructions/76391'),
(76405,'https://www.lego.com/en-us/product/hogwarts-express-collectors-edition-76405','https://www.ebay.com/sch/i.html?_from=R40&_nkw=lego+76405+hogwarts+express+collectors+edition&_sacat=0&rt=nc&LH_BIN=1','https://www.lego.com/en-us/service/buildinginstructions/76405'),
(76417,'https://www.lego.com/en-us/product/gringotts-wizarding-bank-collectors-edition-76417','https://www.ebay.com/sch/i.html?_from=R40&_trksid=p4432023.m570.l1312&_nkw=lego+76417+gringotts+wizarding+bank&_sacat=0','https://www.lego.com/en-us/service/buildinginstructions/76417'),
(76437,'https://www.lego.com/en-us/product/the-burrow-collectors-edition-76437','https://www.ebay.com/sch/i.html?_from=R40&_trksid=p4432023.m570.l1312&_nkw=lego+harry+potter+the+burrow+76437&_sacat=0','https://www.lego.com/en-us/service/buildinginstructions/76437'),
(75313,'https://www.lego.com/en-us/product/at-at-75313','https://www.ebay.com/sch/i.html?_from=R40&_trksid=p4432023.m570.l1312&_nkw=lego+at+at+75313&_sacat=0','https://www.lego.com/en-us/service/buildinginstructions/75313'),
(75397,'https://www.lego.com/en-us/product/jabba-s-sail-barge-75397','https://www.ebay.com/sch/i.html?_from=R40&_trksid=p4432023.m570.l1312&_nkw=lego+jabba%27s+sail+barge+75397&_sacat=0','https://www.lego.com/en-us/service/buildinginstructions/75397');

INSERT INTO assets(itemNumber,buyPrice,MSRP) 
VALUES 
(10272,279.99,NULL),
(10284,345.00,NULL),
(76391,245.00,299.99),
(76405,498.99,499.99),
(76417,430.00,429.99),
(76437,259.95,259.99),
(75313,760.00,849.99),
(75397,500.00,499.99);