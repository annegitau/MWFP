--
-- Database: `mobilewebfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phonenumber`, `password`) VALUES
(8, 'Anne', 'anne.gitau44@gmail.com', '0707019910', 'password'),
(10, 'Anna Mali', 'annamali@gmail.com', '0263597637', 'password'),
(11, 'Betty', 'betty@yahoo.com', '0123456789', 'password'),
(12, 'Amma', 'amma@yahoo.com', '0193029', 'password'),
(13, 'itumeleng', 'itumelengralebitso@yahoo.com', '0707019910', 'password'),
(14, 'Anna Mali', 'annamali@gmail.com', '263597637', 'password'),
(15, '', '', '', 'password'),
(16, 'Joe', 'joe@yahoo.com', '0263597667', 'password'),
(17, 'K Sowe', 'ksowe@gmail.com', '0263597637', 'password'),
(18, 'Eric', 'Eric@gmail.com', '0707019910', 'password'),
(19, 'Eric', 'Eric@gmail.com', '0707019910', 'password'),
(20, 'missgitau', 'anne.gitau44@gmail.com', '0263597637', '4b90e4a6069557a79d2b865ad282659d'),
(21, 'missgitau', 'anne.gitau44@gmail.com', '0263597637', '4b90e4a6069557a79d2b865ad282659d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
