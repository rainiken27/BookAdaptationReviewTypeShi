-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 05:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uradapted`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `userID` int(6) UNSIGNED NOT NULL,
  `titleID` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`userID`, `titleID`) VALUES
(1, 1),
(1, 4),
(1, 5),
(1, 16),
(1, 12),
(1, 22),
(1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `titleID` int(11) NOT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`titleID`, `genre`) VALUES
(1, 'Adventure'),
(1, 'Fiction'),
(1, 'Romance'),
(1, 'Science Fiction'),
(2, 'Romance'),
(2, 'Science Fiction'),
(3, 'Science Fiction'),
(4, 'Action'),
(5, 'Drama'),
(5, 'Mystery'),
(6, 'Science Fiction'),
(6, 'Tragedy'),
(7, 'Action'),
(7, 'Adventure'),
(7, 'Fantasy'),
(7, 'Mystery'),
(7, 'Science Fiction'),
(8, 'Action'),
(8, 'Adventure'),
(8, 'Fantasy'),
(9, 'Action'),
(9, 'Science Fiction'),
(11, 'Romance'),
(11, 'Tragedy');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `userID` int(6) UNSIGNED NOT NULL,
  `titleID` int(6) UNSIGNED NOT NULL,
  `userReview` varchar(1000) NOT NULL,
  `likenessScore` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`userID`, `titleID`, `userReview`, `likenessScore`) VALUES
(1, 2, 'It\'s good good', 5),
(1, 6, 'It\'s good good', 4),
(1, 12, 'esfesd', 5),
(1, 14, 'wfewreewrwre', 3),
(1, 16, 'd3', 3),
(1, 18, 'w', 1),
(1, 21, 'It\'s good good', 4),
(1, 22, 'dv', 3),
(1, 23, 'It\'s good good', 3),
(1, 27, 'dfsfdsdfsdsfdsf', 1),
(1, 32, 'aS', 1),
(2, 2, 'I recently had the opportunity to watch the thrilling science fiction film \"War of the Worlds,\" and let me tell you, it was quite the rollercoaster ride. Directed by the talented filmmaker, Steven Spielberg, this adaptation of H.G. Wells\' classic novel delivers an intense and visually stunning experience that will keep you on the edge of your seat.\r\n\r\nOne of the standout aspects of this movie is its exceptional visual effects. The scenes depicting the massive alien invasion are nothing short of jaw-dropping. The special effects team did a remarkable job in bringing the destructive Martian machines to life. From their towering tripods to their devastating energy weapons, every detail was meticulously crafted, making the action sequences all the more thrilling.\r\n\r\nTom Cruise delivers a captivating performance as Ray Ferrier, a divorced father who must protect his children amidst the chaos of the alien invasion. Cruise\'s portrayal of a desperate and conflicted man struggling to keep his f', 3),
(2, 5, 'Prepare to be moved by \"The Shawshank Redemption.\" This remarkable film weaves a tale of friendship, resilience, and the indomitable human spirit. The performances by Tim Robbins and Morgan Freeman are nothing short of exceptional, capturing the nuances and complexities of their characters. With its powerful storytelling and thought-provoking themes, this movie is a true cinematic gem.', 4),
(2, 6, '\"The Handmaid\'s Tale\" is a gripping and unsettling portrayal of a society ruled by oppression and control. Elisabeth Moss\'s mesmerizing performance as Offred showcases her incredible range as an actress. The series raises important questions about gender, power, and the erosion of human rights, making it a must-see for those seeking compelling and socially relevant storytelling.', 3),
(2, 8, '\"How to Train Your Dragon\" is a visually stunning and emotionally resonant animated masterpiece. The film\'s soaring soundtrack, coupled with the breathtaking flight sequences, immerses you in a world of wonder and adventure. The endearing friendship between Hiccup and Toothless is the heart and soul of the story, making it a must-watch for all ages. ', 5),
(3, 2, 'MID!!!', 3),
(3, 5, '\"The Shawshank Redemption\" is an absolute masterpiece that stands the test of time. With its gripping story, exceptional performances, and powerful themes of hope and redemption, this film has rightfully earned its place as a classic. The chemistry between Tim Robbins and Morgan Freeman is outstanding, bringing depth and authenticity to their characters. This movie is a compelling and emotionally resonant journey that will leave a lasting impact.', 4),
(3, 6, '\"The Handmaid\'s Tale\" is a chilling and timely adaptation of Margaret Atwood\'s iconic novel. The atmospheric cinematography and attention to detail transport viewers into the dystopian world of Gilead. Elisabeth Moss delivers a captivating performance that captures the strength and resilience of her character. This series is an engrossing exploration of power dynamics and the fight for freedom, leaving audiences both captivated and disturbed.', 4),
(3, 8, 'With its delightful blend of humor, heart, and breathtaking animation, \"How to Train Your Dragon\" soars to new heights. The bond between Hiccup and Toothless is beautifully portrayed, creating an emotional connection that tugs at your heartstrings. This film is a thrilling and heartwarming tale that will leave you cheering for the underdog.', 5),
(4, 2, 'The ending was really giving lorem ipsum dood.', 1),
(4, 5, '\"The Shawshank Redemption\" is a cinematic triumph that leaves a profound impact on its viewers. The film\'s exploration of the human condition, framed within the confines of a prison setting, is both poignant and thought-provoking. Tim Robbins and Morgan Freeman deliver unforgettable performances, breathing life into their characters with authenticity and depth. This movie is a testament to the power of hope and the resilience of the human spirit.', 5),
(4, 8, '\"How to Train Your Dragon\" is an enchanting animated adventure that captivates both children and adults alike. The visually stunning animation brings the mythical world of dragons to life with vibrant colors and breathtaking landscapes. The heartwarming story, coupled with endearing characters, makes this film an instant classic.', 5),
(4, 21, 'Step through the wardrobe and into a world of wonder with \"The Chronicles of Narnia: The Lion, the Witch and the Wardrobe.\" This film beautifully captures the essence of C.S. Lewis\' enchanting story. The young cast delivers heartfelt performances, and the visual effects transport you to the fantastical realm of Narnia. It\'s a captivating and timeless adventure that will leave you longing for more.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `titleID` int(6) UNSIGNED NOT NULL,
  `titleName` varchar(100) NOT NULL,
  `titleSummary` varchar(1000) NOT NULL,
  `titleImage` varchar(50) NOT NULL,
  `titleAuthor` varchar(100) NOT NULL,
  `titleSource` varchar(100) NOT NULL,
  `publishDate` date DEFAULT NULL,
  `titlePublisher` varchar(100) NOT NULL,
  `adaptationDirector` varchar(100) NOT NULL,
  `releaseDate` date DEFAULT NULL,
  `productionCompany` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`titleID`, `titleName`, `titleSummary`, `titleImage`, `titleAuthor`, `titleSource`, `publishDate`, `titlePublisher`, `adaptationDirector`, `releaseDate`, `productionCompany`) VALUES
(1, 'Dune', 'A noble family becomes embroiled in a war for control over the galaxy\'s most valuable asset while its heir becomes troubled by visions of a dark future.', '../assets/dune1.jpg', 'Frank Herbert', 'Dune', '1965-08-05', 'Chilton Books', 'Denis Villenueve', '2021-09-03', 'Warner Bros. Pictures'),
(2, 'War of the Worlds', 'Dockworker Ray Ferrier (Tom Cruise) struggles to build a positive relationship with his two children, Rachel (Dakota Fanning) and Robbie (Justin Chatwin). When his ex-wife, Mary Ann (Miranda Otto), drops them off at Ferrier\'s house, it seems as though it will be just another tension-filled weekend. However, when electromagnetic pulses of lightning strike the area, the strange event turns out to be the beginning of an alien invasion, and Ferrier must now protect his children as they seek refuge.', '../assets/waroftheworlds1.jpg', 'H.G. Wells', 'The War of the Worlds', '1897-04-03', 'Blackwood\'s Magazine', 'Steven Spielberg', '2005-06-23', 'Paramount Pictures'),
(3, 'Starship Troopers', 'In the distant future, the Earth is at war with a race of giant alien insects. Little is known about the Bugs except that they are intent on the eradication of all human life.', '../assets/starshiptroopers1.jpg', 'Robert A. Heinlein', 'Starship Troopers', '1956-11-23', 'G. P. Putnam\'s Sons', 'Paul Verhoeven', '1998-01-21', 'Touchstone Pictures'),
(4, 'Witcher', 'The Witcher. Geralt of Rivia, a mutated monster-hunter for hire, journeys toward his destiny in a turbulent world where people often prove more wicked than beasts.', '../assets/witcher1.jpg', 'Andrzej Sapkowski', 'The Witcher', '2005-05-01', 'Orbit', 'Tomasz Bagiński ', '2019-12-20', 'Netflix'),
(5, 'The Shawshank Redemption', 'Over the course of several years, two convicts form a friendship, seeking consolation and, eventually, redemption through basic compassion.', '../assets/shawshank1.jpg', 'Stephen King', 'Rita Hayworth and Shawshank Redemption', '1993-03-21', 'Viking Press', 'Frank Darabont', '1994-09-23', 'Warner Bros. Pictures'),
(6, 'The Handmaid\'s Tale', 'Set in a dystopian future, a woman is forced to live as a concubine under a fundamentalist theocratic dictatorship.', '../assets/handmaiden1.jpg', 'Margaret Atwood', 'The Handmaid\'s Tale', '1995-08-23', 'McClelland & Stewart', 'Bruce Miller', '2017-04-26', 'Hulu Originals'),
(7, 'Jurassic Park', 'A pragmatic paleontologist touring an almost complete theme park on an island in Central America is tasked with protecting a couple of kids after a power failure causes the park\'s cloned dinosaurs to run loose.', '../assets/jurassicpark1.jpg', 'Michael Crichton', 'Jurassic Park', '1990-11-20', 'Alfred A. Knopf', 'Steven Spielberg', '1993-06-11', 'Universal Pictures'),
(8, 'How to Train Your Dragon ', 'A hapless young Viking who aspires to hunt dragons becomes the unlikely friend of a young dragon himself, and learns there may be more to the creatures than he assumed.', '../assets/howtotrainyourdragon1.jpg', 'Cressida Cowell', 'How to Train Your Dragon', '2003-02-01', 'Hodder Children\'s Book', 'Dean Deblois, Chris Sanders', '2010-03-26', 'DreamWorks Pictures'),
(9, 'Edge of Tomorrow', 'A soldier fighting aliens gets to relive the same day over and over again, the day restarting every time he dies.', '../assets/edgeoftomorrow1.jpg', 'Hiroshi Sakurazaka', 'All You Need Is Kill', '0000-00-00', 'Shueisha', 'Doug Liman', '2014-05-28', 'Warner Bros. Pictures'),
(10, 'The Hobbit: The Desolation of Smaug', 'The dwarves, along with Bilbo Baggins and Gandalf the Grey, continue their quest to reclaim Erebor, their homeland, from Smaug. Bilbo Baggins is in possession of a mysterious and magical ring.', '../assets/hobbit1.jpg', 'J.R.R. Tolkien', 'The Hobbit', '1937-09-21', 'George Allen &Unwin', 'Peter Jackson', '2013-12-02', 'Warner Bros. Pictures'),
(11, 'The Fault in Our Stars', 'Two teenage cancer patients begin a life-affirming journey to visit a reclusive author in Amsterdam.', '../assets/faultinourstars1.jpg', 'John Green', 'The Fault in Our Stars', '2012-01-10', 'E.P. Dutton', 'Josh Boone', '2014-06-06', '20th Century Studios'),
(12, 'Les Misérables', 'In 19th-century France, Jean Valjean, who for decades has been hunted by the ruthless policeman Javert after breaking parole, agrees to care for a factory worker\'s daughter. The decision changes their lives forever.', '../assets/lesmiserables1.jpg', 'Victor Hugo', 'Les Misérables', '1862-03-30', 'A. Lacroix, Verboeckhoven & Cie.', 'Tom Hooper', '2012-12-25', 'Universal Pictures'),
(13, 'The Hunger Games', 'Katniss Everdeen voluntarily takes her younger sister\'s place in the Hunger Games: a televised competition in which two teenagers from each of the twelve Districts of Panem are chosen at random to fight to the death.', '../assets/hungergames1.jpg', 'Suzanne Collins', 'The Hunger Games', '2008-09-14', 'Scholastic', 'Gary Ross', '2012-03-23', 'Lionsgate Entertainment'),
(14, 'Jumanji', 'When two kids find and play a magical board game, they release a man trapped in it for decades - and a host of dangers that can only be stopped by finishing the game.', '../assets/jumanji1.jpg', 'Chris Van Allsburg', 'Jumanji', '1981-10-14', 'Houghton Mifflin', 'Joe Johnston', '1995-12-15', 'TriStar Pictures'),
(15, 'Pitch Perfect ', 'Beca, a freshman at Barden University, is cajoled into joining The Bellas, her school\'s all-girls singing group. Injecting some much needed energy into their repertoire, The Bellas take on their male rivals in a campus competition.', '../assets/pitchperfect1.jpg', 'Mickey Rapkin', 'Pitch Perfect: The Quest for Collegiate A Cappella Glory', '0000-00-00', 'Avery', 'Jason Moore', '2012-09-28', 'Universal Pictures'),
(16, 'The Help', 'An aspiring author during the civil rights movement of the 1960s decides to write a book detailing the African American maids\' point of view on the white families for which they work, and the hardships they go through on a daily basis.', '../assets/help1.jpg', 'Kathryn Stockett', 'The Help', '2009-02-10', 'Penguin Books', 'Tate Taylor', '2011-08-10', 'Walt Disney Studios Motion Pictures'),
(17, 'A Man Called Otto', 'Otto is a grump who\'s given up on life following the loss of his wife and wants to end it all. When a young family moves in nearby, he meets his match in quick-witted Marisol, leading to a friendship that will turn his world around.', '../assets/otto1.jpg', 'Fredrick Backman', 'A Man Called Ove', '0000-00-00', 'Forum', 'Marc Forster', '2015-12-25', 'Columbia Pictures'),
(18, 'To Kill A Mockingbird', '\'To Kill a Mockingbird\' is a classic novel written by Harper Lee set in Maycomb, Alabama in the 1930s. Through the eyes of younger Scout Finch, it tackles subject matters of racial injustice as her father, Atticus, defends a black man wrongly accused of rape. The tale highlights the triumphing prejudice in society whilst emphasizing the importance of empathy and standing up for what is right.', '../assets/tokillamockingbird1.jpg', 'Harper Lee', 'To KIll A Mockingbird', '1960-07-11', 'J. B. Lippincott & Co.', 'Robert Mulligan', '1962-12-25', 'Universal Pictures'),
(19, 'The Silence of the Lambs', '\'The narrative follows FBI trainee Clarice Starling as she is tasked with speaking with Dr. Hannibal Lecter, a brilliant but psychotic psychiatrist, to learn more about the mind of Buffalo Bill, a serial killer. In a hazardous game of cat and mouse, Clarice investigates the case further and finds herself in a race against time to save the killer\'s most recent victim before it\'s too late.', '../assets/silenceofthelambs1.jpg', 'Thomas Harris', 'The Silence of the Lambs', '1988-05-07', 'St. Martin\'s Press', 'Jonathan Demme', '1991-02-14', 'Orion Pictures'),
(20, 'The Lord of the Rings', 'Frodo is a hobbit of the Shire who inherits the One Ring from his cousin Bilbo Baggins, described familiarly as \"uncle\", and undertakes the quest to destroy it in the fires of Mount Doom in Mordor.', '../assets/lordoftherings1.jpg', 'J.R.R. Tolkien', 'The Lord of the Rings', '0000-00-00', 'Houghton Mifflin', 'Peter Jackson', '0000-00-00', 'New Line Cinema'),
(21, 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe', 'The Chronicles of Narnia follows a group of children who are evacuated to the English countryside during WWII. The books tell of the their adventures in the imaginary kingdom of Narnia, guided by a talking lion named Aslan, as they fight the White Witch and restore the throne to its rightful line.', '../assets/narnia1.jpg', ' C.S. Lewis', 'The Chronicles of Narnia', '0000-00-00', 'Geoffrey Bles', 'Andrew Adamson', '2005-12-09', 'Walt Disney Pictures'),
(22, 'The Girl with the Dragon Tattoo', '\"A spellbinding amalgam of murder mystery, family saga, love story, and financial intrigue. It’s about the disappearance forty years ago of Harriet Vanger, a young scion of one of the wealthiest families in Sweden . . . and about her octogenarian uncle, determined to know the truth about what he believes was her murder.\"', '../assets/thegirlwiththedragontattoo1.jpg', 'Stiegg Larson', 'The Girl with the Dragon Tattoo', '0000-00-00', 'Norstedts Förlag', 'David Fincher', '2011-12-20', 'Columbia Pictures'),
(23, 'The Shining', 'The Shining centers on Jack Torrance, a struggling writer and recovering alcoholic who accepts a position as the off-season caretaker of the historic Overlook Hotel in the Colorado Rockies. His family accompanies him on this job, including his young son Danny, who possesses \'the shining\', an array of psychic abilities that allow the child to glimpse the hotel\'s horrific true nature. ', '../assets/theshining1.jpg', 'Stephen King', 'The Shining', '1977-01-28', 'Doubleday Group', 'Stanley Kubrick', '1980-05-23', 'Warner Bros. Pictures'),
(24, 'Pride and Prejudice', 'Follows the turbulent relationship between Elizabeth Bennet, the daughter of a country gentleman, and Fitzwilliam Darcy, a rich aristocratic landowner. They must overcome the titular sins of pride and prejudice in order to fall in love and marry.', '../assets/prideandprejudice1.jpg', 'Jane Austen', 'Pride and Prejudice', '1813-01-28', 'T. Egerton', 'Joe Wright', '2005-11-23', 'Focus Features'),
(25, 'The Great Gatsby', 'Midwesterner Nick Carraway is lured into the lavish world of his neighbor, Jay Gatsby. Soon enough, however, Carraway sees through the cracks of Gatsby\'s nouveau riche existence, where obsession, madness, and tragedy await.', '../assets/greatgatsby1.jpg', 'F. Scott Fitzgerald', 'The Great Gatsby', '1925-04-10', 'Charles Scribner\'s Sons', '\r\nBaz Luhrmann', '2013-05-10', 'Warner Bros. Pictures'),
(26, 'The Martian', 'When astronauts blast off from the planet Mars, they leave behind Mark Watney, presumed dead after a fierce storm. With only a meager amount of supplies, the stranded visitor must utilize his wits and spirit to find a way to survive on the hostile planet. ', '../assets/themartian1.jpg', 'Andy Weir', 'The Martian', '2011-09-27', 'Crown Publishing Group', '\r\nRidley Scott', '2015-10-02', '20th Century Fox'),
(27, 'Fight Club', 'An insomniac office worker and a devil-may-care soap maker form an underground fight club that evolves into much more.', '../assets/fightclub1.jpg', 'Chuck Palahniuk', 'Fight Club', '1996-08-17', 'W.W. Norton', '\r\nDavid Fincher', '1999-10-15', '20th Century Fox'),
(28, 'The Da Vinci Code', 'A murder inside the Louvre, and clues in Da Vinci paintings, lead to the discovery of a religious mystery protected by a secret society for two thousand years, which could shake the foundations of Christianity.', '../assets/davincicode1.jpg', 'Dan Brown', 'The Da Vinci Code', '2003-03-18', 'Doubleday Group', '\r\nRon Howard', '2006-05-19', 'Columbia Pictures'),
(29, 'Harry Potter', 'An orphaned boy enrolls in a school of wizardry, where he learns the truth about himself, his family and the terrible evil that haunts the magical world.', '../assets/harrypotter1.jpg', 'J.K. Rowling', 'Harry Potter and the Philospher\'s Stone', '1997-06-26', 'Bloomsbury', '\r\nChris Columbus', '0000-00-00', 'Warner Bros. Pictures'),
(30, 'The Perks of Being a Wallflower', 'Charlie, a 15-year-old introvert, enters high school and is nervous about his new life. When he befriends his seniors, he learns to cope with his friend\'s suicide and his tumultuous past.', '../assets/perksofbeingawallflower1.jpg', 'Stephen Chbosky', 'The Perks of Being a Wallflower', '1999-02-01', 'Simon & Schuster', '\r\nStephen Chbosky', '2012-10-12', 'Summit Entertainment'),
(31, 'The Green Mile', 'A tale set on death row in a Southern jail, where gentle giant John possesses the mysterious power to heal people\'s ailments. When the lead guard, Paul, recognizes John\'s gift, he tries to help stave off the condemned man\'s execution.', '../assets/greenmile1.jpg', 'Stephen King', 'The Green Mile', '1996-03-28', 'Pocket Books', '\r\nFrank Darabont', '1999-12-10', 'Warner Bros. Pictures'),
(32, 'It', 'In the summer of 1989, a group of bullied kids band together to destroy a shape-shifting monster, which disguises itself as a clown and preys on the children of Derry, their small Maine town.', '../assets/it1.jpg', 'Stephen King', 'It', '1986-09-15', 'Viking ', '\r\nAndy Muschietti', '2017-09-08', 'Warner Bros. Pictures');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(6) UNSIGNED NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userPassword` varchar(1000) NOT NULL,
  `profilePicture` varchar(50) NOT NULL,
  `userBio` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userPassword`, `profilePicture`, `userBio`) VALUES
(1, 'mz27', 'mz27', '../assets/dune1.jpg', 'biob'),
(2, 'mz28', 'mz28', '../assets/dune1.jpg', 'bio'),
(3, 'mz29', 'mz29', '../assets/dune1.jpg', 'bio'),
(4, 'mz30', 'mz30', '../assets/dune1.jpg', 'bio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD KEY `userID` (`userID`),
  ADD KEY `titleID` (`titleID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`titleID`,`genre`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`userID`,`titleID`),
  ADD KEY `titleID` (`titleID`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`titleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `titleID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`titleID`) REFERENCES `titles` (`titleID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`titleID`) REFERENCES `titles` (`titleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
