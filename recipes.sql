-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2015 at 09:57 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`) VALUES
(1, 'Mayonnaise'),
(2, 'Sour Cream'),
(5, 'Ketchup'),
(6, 'Worcestershire sauce'),
(7, 'Ketchup'),
(8, 'Worcestershire sauce'),
(9, 'drained horseradish'),
(10, 'paprika'),
(11, 'cayenne pepper'),
(12, 'Korsher salt'),
(13, 'black pepper'),
(14, 'sweet onion'),
(15, 'all-purpose flour'),
(16, 'dried thyme'),
(17, 'dried oregano'),
(18, 'ground cummin'),
(19, 'egg(s)'),
(20, 'whole milk'),
(21, 'soy'),
(22, 'corn oil'),
(23, 'packaged cream cheese'),
(24, 'canned pumpkin'),
(25, 'salk'),
(26, 'melted butter'),
(27, 'vanilla extract'),
(28, 'ground cinnamon'),
(29, 'ground ginger'),
(30, 'pre-made pie dough'),
(31, 'whipped cream'),
(32, 'chocolate'),
(33, 'cake mix'),
(34, 'unsalted butter'),
(35, 'coffee'),
(36, 'sugar'),
(37, 'vanilla extract'),
(38, 'heavy cream'),
(39, 'light corn syrup'),
(40, 'olive oil'),
(41, 'pizza dough'),
(42, 'dark barbecue sauce'),
(43, 'boneless chicken breast'),
(44, 'smoked gouda cheese'),
(45, 'mozzarella cheese'),
(46, 'red onion'),
(47, 'cilantro'),
(48, 'strawberries'),
(49, 'strawberry jam'),
(50, 'buttermilk'),
(51, 'vegetable oil'),
(52, 'baking powder'),
(53, 'baking soda'),
(54, 'chopped frozen cheesecake'),
(55, 'cooking spray'),
(56, 'orange juice concetrated'),
(57, 'granulated sugar'),
(58, 'confectioners'' sugar');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `img_url` text NOT NULL,
  `prep_time` int(11) NOT NULL,
  `total_time` int(11) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `description`, `img_url`, `prep_time`, `total_time`, `rating`) VALUES
(8, 'Almost-Famous Bloomin'' Onion', 'Very tastey onions with ingredients and stuff. ', 'http://foodnetwork.sndimg.com/content/dam/images/food/fullset/2009/11/4/3/FNM_120109-Copy-That-003_s4x3.jpg.rend.sni18col.jpeg', 54, 100, 0),
(9, 'Pumpkin Pie Cake', 'Sweet tasty pie that is pumpkin flavored. ', 'https://www.meals.com/imagesrecipes/18470lrg.jpg', 25, 75, 0),
(10, 'Mousse Cake', 'Chocolate everywhere.....', 'http://foodnetwork.sndimg.com/content/dam/images/food/fullset/2012/1/24/1/FNM_030112-Copy-That-001_s4x3.jpg.rend.sni12col.landscape.jpeg', 135, 180, 0),
(11, 'Barbecue Chicken PIzza', 'Pizza for those who love BBQ all day er day', 'http://foodnetwork.sndimg.com/content/dam/images/food/fullset/2012/2/28/1/FNM_040112-Copy-That-002_s4x3.jpg.rend.sni12col.landscape.jpeg', 50, 90, 0),
(12, 'Orange Milkshake', 'Like orange juice? How bout some fries with this shake?', 'http://foodnetwork.sndimg.com/content/dam/images/food/fullset/2010/3/25/0/FNM_050110-Copy-That-001_s4x3.jpg.rend.sni12col.landscape.jpeg', 10, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredients_units`
--

CREATE TABLE `recipe_ingredients_units` (
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_ingredients_units`
--

INSERT INTO `recipe_ingredients_units` (`recipe_id`, `ingredient_id`, `unit_id`, `amount`) VALUES
(8, 1, 1, 2),
(8, 2, 1, 2),
(8, 7, 1, 1),
(8, 1, 1, 2),
(8, 10, 1, 2),
(8, 6, 2, 1),
(9, 15, 5, 1),
(9, 20, 6, 2),
(9, 22, 7, 1),
(9, 19, 13, 2),
(9, 27, 2, 1),
(10, 22, 9, 1),
(10, 15, 5, 2),
(10, 27, 1, 1),
(10, 19, 13, 4),
(10, 20, 5, 1),
(11, 41, 5, 2),
(11, 9, 10, 1),
(11, 2, 6, 3),
(11, 34, 2, 1),
(11, 42, 2, 1),
(11, 43, 13, 2),
(12, 56, 6, 1),
(12, 58, 1, 2),
(12, 57, 1, 1),
(12, 36, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `stepno` int(11) NOT NULL,
  `text` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`id`, `recipe_id`, `stepno`, `text`) VALUES
(1, 8, 1, 'chop everything in fine peices'),
(2, 8, 2, 'mix everything together'),
(3, 8, 3, 'put it in the oven'),
(4, 9, 1, 'Get the items together'),
(5, 9, 2, 'bat the eggs'),
(6, 9, 3, 'mix it with the flour'),
(7, 9, 4, 'add the vanilla extract'),
(8, 9, 5, 'mix in a bit of corn oil'),
(9, 9, 6, 'put it in oven for the rest of the time'),
(10, 10, 1, 'Beat the eggs to a pulp'),
(11, 10, 2, 'add the vanilla extract and the flour'),
(12, 10, 3, 'mix to a batter'),
(13, 10, 4, 'put it in a pan'),
(14, 10, 5, 'add the milk on the top to drizzle through'),
(15, 10, 6, 'bake in the oven'),
(16, 11, 1, 'thaw the chicken'),
(17, 11, 2, 'beat the dough and put in some sour cream to make it creamy'),
(18, 11, 3, 'mix the unsalted butter with the barbecue sauce'),
(19, 11, 4, 'shread the meat off the chicken and mix it with the previous mix'),
(20, 11, 5, 'eat some horseradish for flavor'),
(21, 11, 6, 'put the chicken onto the pizza dough'),
(22, 11, 7, 'put it in oven. '),
(23, 12, 1, 'whisk the orange juice'),
(24, 12, 2, 'add the confectionser sugar, granulated sugar, and regular surgar'),
(25, 12, 3, 'mix it until there is no more sugar settling at the bottom'),
(26, 12, 4, 'put it in fridge and drink later');

-- --------------------------------------------------------

--
-- Table structure for table `units_of_measure`
--

CREATE TABLE `units_of_measure` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units_of_measure`
--

INSERT INTO `units_of_measure` (`id`, `name`) VALUES
(1, 'tablespoon'),
(2, 'teaspoons'),
(5, 'cup(s)'),
(6, 'pint'),
(7, 'pinch'),
(8, 'ounce(s)'),
(9, 'fluid ounce(s)'),
(10, 'quart'),
(11, 'gallon'),
(12, 'milliliter'),
(13, 'int');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units_of_measure`
--
ALTER TABLE `units_of_measure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `units_of_measure`
--
ALTER TABLE `units_of_measure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
