-- 1. Find sets that have a word or phrase in their description
SELECT * FROM products
WHERE htmlDescription LIKE '%build%';
/* % used as a wildcard to represent any sequence of characters will match any value that contains the word
% before and after makes sure that the mentioned word can occur at any position */

-- 2. Sort by sets with the highest piece count
-- Sort sets in details table by highest piece count
SELECT * FROM details 
ORDER BY pieces DESC;

-- Sort sets by highest piece count, includes the associated productName
SELECT products.productName, details.itemNumber, details.pieces
FROM details
INNER JOIN products ON details.itemNumber = products.itemNumber
ORDER BY details.pieces DESC;

-- 3. Show only sets that belong to a specific theme
-- Displays sets with a sub theme of Sports
SELECT * FROM groups
WHERE productSubTheme = 'Sports';

-- Displays sets along with productName that have a sub theme of Sports
SELECT products.productName, groups.itemNumber, groups.productSubTheme
FROM groups
INNER JOIN products ON groups.itemNumber = products.itemNumber
WHERE groups.productSubTheme = 'Sports';

/* 4. For the viewing of the sets, make a query that "paginates" the list,
      giving 4 at a time and not repeating 
 */
-- Basic Pagination (Returns four from the database, in my case the first two and the last two are my constant after each refresh)
SELECT * FROM products
LIMIT 4;

-- Random Pagination (Better than the above, there are changes with the sets displayed)
SELECT * FROM products
ORDER BY RAND()
LIMIT 4;