-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 08:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scifi_zone`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanci`
--

CREATE TABLE `clanci` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `sazetak` text COLLATE utf8_croatian_ci NOT NULL,
  `sadrzaj` text COLLATE utf8_croatian_ci NOT NULL,
  `fotografija` varchar(54) COLLATE utf8_croatian_ci NOT NULL,
  `kategorija` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `clanci`
--

INSERT INTO `clanci` (`id`, `datum`, `naslov`, `sazetak`, `sadrzaj`, `fotografija`, `kategorija`, `arhiva`) VALUES
(1, '20.06.2022.', 'STAR WARS cosplay', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia. Curabitur massa nulla, varius eget felis vel, viverra eleifend eros. Integer ut turpis non mi condimentum placerat. Duis lacinia leo et felis varius, ac porttitor leo mattis. Curabitur eros metus, malesuada ut ante in, egestas vehicula ante. Nam at lorem sem. Integer nisi erat, egestas vel sollicitudin eu, ultricies sed sapien. Mauris a lectus a nisl venenatis porta. In erat eros, blandit scelerisque ex at, maximus tincidunt odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In luctus consectetur euismod. Vestibulum volutpat laoreet feugiat. Vestibulum scelerisque tempus mattis. Sed vitae quam luctus, sagittis lorem quis, blandit libero.<br /><br /><br />\r\n', 'cosplay.jpg', 'fandom', 0),
(2, '18.06.2022.', 'TOP 10 filmova', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia. Curabitur massa nulla, varius eget felis vel, viverra eleifend eros. Integer ut turpis non mi condimentum placerat. Duis lacinia leo et felis varius, ac porttitor leo mattis. Curabitur eros metus, malesuada ut ante in, egestas vehicula ante. Nam at lorem sem. Integer nisi erat, egestas vel sollicitudin eu, ultricies sed sapien. Mauris a lectus a nisl venenatis porta. In erat eros, blandit scelerisque ex at, maximus tincidunt odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In luctus consectetur euismod. Vestibulum volutpat laoreet feugiat. Vestibulum scelerisque tempus mattis. Sed vitae quam luctus, sagittis lorem quis, blandit libero.<br />\r\n<br />\r\nEtiam et lorem eget felis tristique hendrerit condimentum at elit. Ut blandit eget mi eget suscipit. Cras posuere ultrices quam id commodo. Maecenas commodo enim a ligula varius dapibus. Pellentesque auctor varius rutrum. Integer lectus velit, ullamcorper et dui nec, mattis gravida sapien. Donec vehicula ut tortor in rhoncus. Duis non tincidunt tortor, non ultricies sapien. Nulla a ornare ex. Cras vehicula dolor et risus gravida, ac facilisis neque rhoncus. Etiam ac auctor purus, at laoreet lorem.<br />\r\n<br />\r\nSed aliquet nisi ligula, ut lacinia orci fermentum et. Quisque aliquet lacus id pretium aliquam. Mauris nunc sapien, lacinia eget luctus vitae, fringilla at tortor. Donec velit urna, euismod sit amet luctus a, volutpat sit amet turpis. Vivamus tempus ex neque, vel fringilla ipsum scelerisque feugiat. Sed pellentesque dignissim arcu, sit amet sagittis nulla. Quisque dapibus euismod dignissim. Phasellus eget volutpat odio, a pellentesque augue. Ut dictum ultrices volutpat. Vestibulum rhoncus nisl id orci feugiat, sagittis sodales tellus tristique. Vivamus est magna, feugiat a arcu vitae, pretium convallis nisl. Etiam nunc arcu, malesuada ac purus vitae, malesuada viverra lacus. Vivamus ac nisi ut augue viverra scelerisque condimentum et nunc. In hac habitasse platea dictumst.', 'bestfilms.jpg', 'preporuke', 0),
(3, '18.06.2022.', 'Blade Runner', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia. Curabitur massa nulla, varius eget felis vel, viverra eleifend eros. Integer ut turpis non mi condimentum placerat. Duis lacinia leo et felis varius, ac porttitor leo mattis. Curabitur eros metus, malesuada ut ante in, egestas vehicula ante. Nam at lorem sem. Integer nisi erat, egestas vel sollicitudin eu, ultricies sed sapien. Mauris a lectus a nisl venenatis porta. In erat eros, blandit scelerisque ex at, maximus tincidunt odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In luctus consectetur euismod. Vestibulum volutpat laoreet feugiat. Vestibulum scelerisque tempus mattis. Sed vitae quam luctus, sagittis lorem quis, blandit libero.<br />\r\n<br><br><br />\r\nEtiam et lorem eget felis tristique hendrerit condimentum at elit. Ut blandit eget mi eget suscipit. Cras posuere ultrices quam id commodo. Maecenas commodo enim a ligula varius dapibus. Pellentesque auctor varius rutrum. Integer lectus velit, ullamcorper et dui nec, mattis gravida sapien. Donec vehicula ut tortor in rhoncus. Duis non tincidunt tortor, non ultricies sapien. Nulla a ornare ex. Cras vehicula dolor et risus gravida, ac facilisis neque rhoncus. Etiam ac auctor purus, at laoreet lorem.<br />\r\n<br><br><br />\r\nSed aliquet nisi ligula, ut lacinia orci fermentum et. Quisque aliquet lacus id pretium aliquam. Mauris nunc sapien, lacinia eget luctus vitae, fringilla at tortor. Donec velit urna, euismod sit amet luctus a, volutpat sit amet turpis. Vivamus tempus ex neque, vel fringilla ipsum scelerisque feugiat. Sed pellentesque dignissim arcu, sit amet sagittis nulla. Quisque dapibus euismod dignissim. Phasellus eget volutpat odio, a pellentesque augue. Ut dictum ultrices volutpat. Vestibulum rhoncus nisl id orci feugiat, sagittis sodales tellus tristique. Vivamus est magna, feugiat a arcu vitae, pretium convallis nisl. Etiam nunc arcu, malesuada ac purus vitae, malesuada viverra lacus. Vivamus ac nisi ut augue viverra scelerisque condimentum et nunc. In hac habitasse platea dictumst.', 'blrunner.jpg', 'recenzije', 0),
(9, '28.05.2022.', 'Snjimi svoj film', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia. Curabitur massa nulla, varius eget felis vel, viverra eleifend eros. Integer ut turpis non mi condimentum placerat. Duis lacinia leo et felis varius, ac porttitor leo mattis. Curabitur eros metus, malesuada ut ante in, egestas vehicula ante. Nam at lorem sem. Integer nisi erat, egestas vel sollicitudin eu, ultricies sed sapien. Mauris a lectus a nisl venenatis porta. In erat eros, blandit scelerisque ex at, maximus tincidunt odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In luctus consectetur euismod. Vestibulum volutpat laoreet feugiat. Vestibulum scelerisque tempus mattis. Sed vitae quam luctus, sagittis lorem quis, blandit libero.<br /><br /><br />\r\n<br /><br /><br />\r\nEtiam et lorem eget felis tristique hendrerit condimentum at elit. Ut blandit eget mi eget suscipit. Cras posuere ultrices quam id commodo. Maecenas commodo enim a ligula varius dapibus. Pellentesque auctor varius rutrum. Integer lectus velit, ullamcorper et dui nec, mattis gravida sapien. Donec vehicula ut tortor in rhoncus. Duis non tincidunt tortor, non ultricies sapien. Nulla a ornare ex. Cras vehicula dolor et risus gravida, ac facilisis neque rhoncus. Etiam ac auctor purus, at laoreet lorem.<br /><br /><br />\r\n<br /><br /><br />\r\nSed aliquet nisi ligula, ut lacinia orci fermentum et. Quisque aliquet lacus id pretium aliquam. Mauris nunc sapien, lacinia eget luctus vitae, fringilla at tortor. Donec velit urna, euismod sit amet luctus a, volutpat sit amet turpis. Vivamus tempus ex neque, vel fringilla ipsum scelerisque feugiat. Sed pellentesque dignissim arcu, sit amet sagittis nulla. Quisque dapibus euismod dignissim. Phasellus eget volutpat odio, a pellentesque augue. Ut dictum ultrices volutpat. Vestibulum rhoncus nisl id orci feugiat, sagittis sodales tellus tristique. Vivamus est magna, feugiat a arcu vitae, pretium convallis nisl. Etiam nunc arcu, malesuada ac purus vitae, malesuada viverra lacus. Vivamus ac nisi ut augue viverra scelerisque condimentum et nunc. In hac habitasse platea dictumst.', 'snimanje.jpg', 'fandom', 0),
(10, '18.06.2022.', 'Star Wars VII', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia. Curabitur massa nulla, varius eget felis vel, viverra eleifend eros. Integer ut turpis non mi condimentum placerat. Duis lacinia leo et felis varius, ac porttitor leo mattis. Curabitur eros metus, malesuada ut ante in, egestas vehicula ante. Nam at lorem sem. Integer nisi erat, egestas vel sollicitudin eu, ultricies sed sapien. Mauris a lectus a nisl venenatis porta. In erat eros, blandit scelerisque ex at, maximus tincidunt odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In luctus consectetur euismod. Vestibulum volutpat laoreet feugiat. Vestibulum scelerisque tempus mattis. Sed vitae quam luctus, sagittis lorem quis, blandit libero.<br />\r\n<br />\r\nEtiam et lorem eget felis tristique hendrerit condimentum at elit. Ut blandit eget mi eget suscipit. Cras posuere ultrices quam id commodo. Maecenas commodo enim a ligula varius dapibus. Pellentesque auctor varius rutrum. Integer lectus velit, ullamcorper et dui nec, mattis gravida sapien. Donec vehicula ut tortor in rhoncus. Duis non tincidunt tortor, non ultricies sapien. Nulla a ornare ex. Cras vehicula dolor et risus gravida, ac facilisis neque rhoncus. Etiam ac auctor purus, at laoreet lorem.<br />\r\n<br />\r\nSed aliquet nisi ligula, ut lacinia orci fermentum et. Quisque aliquet lacus id pretium aliquam. Mauris nunc sapien, lacinia eget luctus vitae, fringilla at tortor. Donec velit urna, euismod sit amet luctus a, volutpat sit amet turpis. Vivamus tempus ex neque, vel fringilla ipsum scelerisque feugiat. Sed pellentesque dignissim arcu, sit amet sagittis nulla. Quisque dapibus euismod dignissim. Phasellus eget volutpat odio, a pellentesque augue. Ut dictum ultrices volutpat. Vestibulum rhoncus nisl id orci feugiat, sagittis sodales tellus tristique. Vivamus est magna, feugiat a arcu vitae, pretium convallis nisl. Etiam nunc arcu, malesuada ac purus vitae, malesuada viverra lacus. Vivamus ac nisi ut augue viverra scelerisque condimentum et nunc. In hac habitasse platea dictumst.', 'sw8.jpg', 'recenzije', 0),
(11, '18.06.2022.', 'Frank Herbnert - Dune', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia. Curabitur massa nulla, varius eget felis vel, viverra eleifend eros. Integer ut turpis non mi condimentum placerat. Duis lacinia leo et felis varius, ac porttitor leo mattis. Curabitur eros metus, malesuada ut ante in, egestas vehicula ante. Nam at lorem sem. Integer nisi erat, egestas vel sollicitudin eu, ultricies sed sapien. Mauris a lectus a nisl venenatis porta. In erat eros, blandit scelerisque ex at, maximus tincidunt odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In luctus consectetur euismod. Vestibulum volutpat laoreet feugiat. Vestibulum scelerisque tempus mattis. Sed vitae quam luctus, sagittis lorem quis, blandit libero.<br /><br /><br />\r\n<br /><br /><br />\r\nEtiam et lorem eget felis tristique hendrerit condimentum at elit. Ut blandit eget mi eget suscipit. Cras posuere ultrices quam id commodo. Maecenas commodo enim a ligula varius dapibus. Pellentesque auctor varius rutrum. Integer lectus velit, ullamcorper et dui nec, mattis gravida sapien. Donec vehicula ut tortor in rhoncus. Duis non tincidunt tortor, non ultricies sapien. Nulla a ornare ex. Cras vehicula dolor et risus gravida, ac facilisis neque rhoncus. Etiam ac auctor purus, at laoreet lorem.<br /><br /><br />\r\n<br /><br /><br />\r\nSed aliquet nisi ligula, ut lacinia orci fermentum et. Quisque aliquet lacus id pretium aliquam. Mauris nunc sapien, lacinia eget luctus vitae, fringilla at tortor. Donec velit urna, euismod sit amet luctus a, volutpat sit amet turpis. Vivamus tempus ex neque, vel fringilla ipsum scelerisque feugiat. Sed pellentesque dignissim arcu, sit amet sagittis nulla. Quisque dapibus euismod dignissim. Phasellus eget volutpat odio, a pellentesque augue. Ut dictum ultrices volutpat. Vestibulum rhoncus nisl id orci feugiat, sagittis sodales tellus tristique. Vivamus est magna, feugiat a arcu vitae, pretium convallis nisl. Etiam nunc arcu, malesuada ac purus vitae, malesuada viverra lacus. Vivamus ac nisi ut augue viverra scelerisque condimentum et nunc. In hac habitasse platea dictumst.', 'dune.jpg', 'recenzije', 0),
(14, '18.06.2022.', '10 sci-fi knjiga', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia. Curabitur massa nulla, varius eget felis vel, viverra eleifend eros. Integer ut turpis non mi condimentum placerat. Duis lacinia leo et felis varius, ac porttitor leo mattis. Curabitur eros metus, malesuada ut ante in, egestas vehicula ante. Nam at lorem sem. Integer nisi erat, egestas vel sollicitudin eu, ultricies sed sapien. Mauris a lectus a nisl venenatis porta. In erat eros, blandit scelerisque ex at, maximus tincidunt odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In luctus consectetur euismod. Vestibulum volutpat laoreet feugiat. Vestibulum scelerisque tempus mattis. Sed vitae quam luctus, sagittis lorem quis, blandit libero.<br />\r\n<br />\r\nEtiam et lorem eget felis tristique hendrerit condimentum at elit. Ut blandit eget mi eget suscipit. Cras posuere ultrices quam id commodo. Maecenas commodo enim a ligula varius dapibus. Pellentesque auctor varius rutrum. Integer lectus velit, ullamcorper et dui nec, mattis gravida sapien. Donec vehicula ut tortor in rhoncus. Duis non tincidunt tortor, non ultricies sapien. Nulla a ornare ex. Cras vehicula dolor et risus gravida, ac facilisis neque rhoncus. Etiam ac auctor purus, at laoreet lorem.<br />\r\n<br />\r\nSed aliquet nisi ligula, ut lacinia orci fermentum et. Quisque aliquet lacus id pretium aliquam. Mauris nunc sapien, lacinia eget luctus vitae, fringilla at tortor. Donec velit urna, euismod sit amet luctus a, volutpat sit amet turpis. Vivamus tempus ex neque, vel fringilla ipsum scelerisque feugiat. Sed pellentesque dignissim arcu, sit amet sagittis nulla. Quisque dapibus euismod dignissim. Phasellus eget volutpat odio, a pellentesque augue. Ut dictum ultrices volutpat. Vestibulum rhoncus nisl id orci feugiat, sagittis sodales tellus tristique. Vivamus est magna, feugiat a arcu vitae, pretium convallis nisl. Etiam nunc arcu, malesuada ac purus vitae, malesuada viverra lacus. Vivamus ac nisi ut augue viverra scelerisque condimentum et nunc. In hac habitasse platea dictumst.', 'bestbooks.png', 'preporuke', 0),
(30, '18.06.2022.', 'Najbolji filmovi 2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tortor viverra, lobortis purus et, fermentum urna. Nullam dui lacus, aliquet id quam sed, dapibus varius justo. Phasellus iaculis leo porttitor felis suscipit lacinia. Curabitur massa nulla, varius eget felis vel, viverra eleifend eros. Integer ut turpis non mi condimentum placerat. Duis lacinia leo et felis varius, ac porttitor leo mattis. Curabitur eros metus, malesuada ut ante in, egestas vehicula ante. Nam at lorem sem. Integer nisi erat, egestas vel sollicitudin eu, ultricies sed sapien. Mauris a lectus a nisl venenatis porta. In erat eros, blandit scelerisque ex at, maximus tincidunt odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In luctus consectetur euismod. Vestibulum volutpat laoreet feugiat. Vestibulum scelerisque tempus mattis. Sed vitae quam luctus, sagittis lorem quis, blandit libero.<br />\r\n<br />\r\nEtiam et lorem eget felis tristique hendrerit condimentum at elit. Ut blandit eget mi eget suscipit. Cras posuere ultrices quam id commodo. Maecenas commodo enim a ligula varius dapibus. Pellentesque auctor varius rutrum. Integer lectus velit, ullamcorper et dui nec, mattis gravida sapien. Donec vehicula ut tortor in rhoncus. Duis non tincidunt tortor, non ultricies sapien. Nulla a ornare ex. Cras vehicula dolor et risus gravida, ac facilisis neque rhoncus. Etiam ac auctor purus, at laoreet lorem.<br />\r\n<br />\r\nSed aliquet nisi ligula, ut lacinia orci fermentum et. Quisque aliquet lacus id pretium aliquam. Mauris nunc sapien, lacinia eget luctus vitae, fringilla at tortor. Donec velit urna, euismod sit amet luctus a, volutpat sit amet turpis. Vivamus tempus ex neque, vel fringilla ipsum scelerisque feugiat. Sed pellentesque dignissim arcu, sit amet sagittis nulla. Quisque dapibus euismod dignissim. Phasellus eget volutpat odio, a pellentesque augue. Ut dictum ultrices volutpat. Vestibulum rhoncus nisl id orci feugiat, sagittis sodales tellus tristique. Vivamus est magna, feugiat a arcu vitae, pretium convallis nisl. Etiam nunc arcu, malesuada ac purus vitae, malesuada viverra lacus. Vivamus ac nisi ut augue viverra scelerisque condimentum et nunc. In hac habitasse platea dictumst.', 'scifi2021.jpg', 'preporuke', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `k_ime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `razina` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `k_ime`, `lozinka`, `razina`) VALUES
(1, 'Pero', 'Perić', 'admin', '$2y$10$qwOlWi0EH7.VMFNy05hbeurRXQSMyXEMzQ3K9Od85HftQ.5gbj8n6', 1),
(2, 'Ivo', 'Ivić', 'user1', '$2y$10$gV7FQ/iar8grXkHVGw/5xe3sftTwTFJdm0HTlbiD7Y/fNSviWPpou', 0),
(3, 'Ivan', 'Papiga', 'admin12345', '$2y$10$aZIMJr/3wKoLZQEP23QQju/zN.zJw/kzlZUxG3dzl8CismZaj63LW', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanci`
--
ALTER TABLE `clanci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `k_ime` (`k_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanci`
--
ALTER TABLE `clanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
