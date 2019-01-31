-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2019 at 11:08 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roadsafety`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_group`
--

CREATE TABLE `auth_group` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_group_permissions`
--

CREATE TABLE `auth_group_permissions` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_permission`
--

CREATE TABLE `auth_permission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `codename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_permission`
--

INSERT INTO `auth_permission` (`id`, `name`, `content_type_id`, `codename`) VALUES
(1, 'Can add log entry', 1, 'add_logentry'),
(2, 'Can change log entry', 1, 'change_logentry'),
(3, 'Can delete log entry', 1, 'delete_logentry'),
(4, 'Can view log entry', 1, 'view_logentry'),
(5, 'Can add permission', 2, 'add_permission'),
(6, 'Can change permission', 2, 'change_permission'),
(7, 'Can delete permission', 2, 'delete_permission'),
(8, 'Can view permission', 2, 'view_permission'),
(9, 'Can add user', 3, 'add_user'),
(10, 'Can change user', 3, 'change_user'),
(11, 'Can delete user', 3, 'delete_user'),
(12, 'Can view user', 3, 'view_user'),
(13, 'Can add group', 4, 'add_group'),
(14, 'Can change group', 4, 'change_group'),
(15, 'Can delete group', 4, 'delete_group'),
(16, 'Can view group', 4, 'view_group'),
(17, 'Can add content type', 5, 'add_contenttype'),
(18, 'Can change content type', 5, 'change_contenttype'),
(19, 'Can delete content type', 5, 'delete_contenttype'),
(20, 'Can view content type', 5, 'view_contenttype'),
(21, 'Can add session', 6, 'add_session'),
(22, 'Can change session', 6, 'change_session'),
(23, 'Can delete session', 6, 'delete_session'),
(24, 'Can view session', 6, 'view_session'),
(25, 'Can add number plate', 7, 'add_numberplate'),
(26, 'Can change number plate', 7, 'change_numberplate'),
(27, 'Can delete number plate', 7, 'delete_numberplate'),
(28, 'Can view number plate', 7, 'view_numberplate');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `password` varchar(128) NOT NULL,
  `last_login` datetime(6) DEFAULT NULL,
  `is_superuser` tinyint(1) NOT NULL,
  `username` varchar(150) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(254) NOT NULL,
  `is_staff` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_joined` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`id`, `password`, `last_login`, `is_superuser`, `username`, `first_name`, `last_name`, `email`, `is_staff`, `is_active`, `date_joined`) VALUES
(1, 'pbkdf2_sha256$120000$Grc2fbIHZtgJ$8gn7k4POlXW/2n2AQa0VyjOpP4H5e28pz+rDc2HvHTc=', '2019-01-30 14:14:02.482411', 1, 'eze', '', '', 'eze@gmail.com', 1, 1, '2019-01-30 14:13:31.600561');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_groups`
--

CREATE TABLE `auth_user_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_user_permissions`
--

CREATE TABLE `auth_user_user_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `django_admin_log`
--

CREATE TABLE `django_admin_log` (
  `id` int(11) NOT NULL,
  `action_time` datetime(6) NOT NULL,
  `object_id` longtext,
  `object_repr` varchar(200) NOT NULL,
  `action_flag` smallint(5) UNSIGNED NOT NULL,
  `change_message` longtext NOT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_admin_log`
--

INSERT INTO `django_admin_log` (`id`, `action_time`, `object_id`, `object_repr`, `action_flag`, `change_message`, `content_type_id`, `user_id`) VALUES
(1, '2019-01-30 14:15:32.835965', '1', 'Jeffery', 1, '[{\"added\": {}}]', 7, 1),
(2, '2019-01-30 14:17:05.066497', '2', 'Peter', 1, '[{\"added\": {}}]', 7, 1),
(3, '2019-01-30 17:04:27.280758', '13', 'Bassey', 3, '', 7, 1),
(4, '2019-01-30 17:04:27.429441', '12', 'Bassey', 3, '', 7, 1),
(5, '2019-01-30 17:04:27.473788', '11', 'Bassey', 3, '', 7, 1),
(6, '2019-01-30 17:04:27.607442', '10', 'Bassey', 3, '', 7, 1),
(7, '2019-01-30 17:04:27.652050', '9', 'Bassey', 3, '', 7, 1),
(8, '2019-01-30 17:04:27.696727', '8', 'Bassey', 3, '', 7, 1),
(9, '2019-01-30 17:04:27.741201', '7', 'Bassey', 3, '', 7, 1),
(10, '2019-01-30 17:04:27.785888', '6', 'Bassey', 3, '', 7, 1),
(11, '2019-01-30 17:04:27.830519', '5', 'Bassey', 3, '', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `django_content_type`
--

CREATE TABLE `django_content_type` (
  `id` int(11) NOT NULL,
  `app_label` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_content_type`
--

INSERT INTO `django_content_type` (`id`, `app_label`, `model`) VALUES
(1, 'admin', 'logentry'),
(4, 'auth', 'group'),
(2, 'auth', 'permission'),
(3, 'auth', 'user'),
(5, 'contenttypes', 'contenttype'),
(7, 'numberplatesgenerator', 'numberplate'),
(6, 'sessions', 'session');

-- --------------------------------------------------------

--
-- Table structure for table `django_migrations`
--

CREATE TABLE `django_migrations` (
  `id` int(11) NOT NULL,
  `app` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `applied` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_migrations`
--

INSERT INTO `django_migrations` (`id`, `app`, `name`, `applied`) VALUES
(1, 'contenttypes', '0001_initial', '2019-01-30 14:06:51.918511'),
(2, 'auth', '0001_initial', '2019-01-30 14:07:01.910706'),
(3, 'admin', '0001_initial', '2019-01-30 14:07:04.394021'),
(4, 'admin', '0002_logentry_remove_auto_add', '2019-01-30 14:07:04.609529'),
(5, 'admin', '0003_logentry_add_action_flag_choices', '2019-01-30 14:07:04.665578'),
(6, 'contenttypes', '0002_remove_content_type_name', '2019-01-30 14:07:05.844340'),
(7, 'auth', '0002_alter_permission_name_max_length', '2019-01-30 14:07:06.906225'),
(8, 'auth', '0003_alter_user_email_max_length', '2019-01-30 14:07:07.821873'),
(9, 'auth', '0004_alter_user_username_opts', '2019-01-30 14:07:07.875568'),
(10, 'auth', '0005_alter_user_last_login_null', '2019-01-30 14:07:08.759534'),
(11, 'auth', '0006_require_contenttypes_0002', '2019-01-30 14:07:08.837190'),
(12, 'auth', '0007_alter_validators_add_error_messages', '2019-01-30 14:07:08.898093'),
(13, 'auth', '0008_alter_user_username_max_length', '2019-01-30 14:07:10.166453'),
(14, 'auth', '0009_alter_user_last_name_max_length', '2019-01-30 14:07:10.959688'),
(15, 'sessions', '0001_initial', '2019-01-30 14:07:11.709462'),
(16, 'numberplatesgenerator', '0001_initial', '2019-01-30 14:10:26.605335');

-- --------------------------------------------------------

--
-- Table structure for table `django_session`
--

CREATE TABLE `django_session` (
  `session_key` varchar(40) NOT NULL,
  `session_data` longtext NOT NULL,
  `expire_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_session`
--

INSERT INTO `django_session` (`session_key`, `session_data`, `expire_date`) VALUES
('fwzm3xwwqwvdolgucpohki1uzqhs1fk5', 'MjI1ZmVhNjIxOGZiYTZjMmE0MGZjNTJlZDdkODQ1MjA1YzU5ZTc4MTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiJhOTBmNWViYzFkNWE1N2RjZWM3ZDg4NGYwMWE2MDg2ODc4Y2JkY2ViIn0=', '2019-02-13 14:14:02.527239');

-- --------------------------------------------------------

--
-- Table structure for table `numberplatesgenerator_numberplate`
--

CREATE TABLE `numberplatesgenerator_numberplate` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lga_code` varchar(200) NOT NULL,
  `number` int(11) NOT NULL,
  `alphabet` varchar(100) NOT NULL,
  `date_created` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `numberplatesgenerator_numberplate`
--

INSERT INTO `numberplatesgenerator_numberplate` (`id`, `name`, `lga_code`, `number`, `alphabet`, `date_created`) VALUES
(1, 'Jeffery', 'ABJ', 1, 'AA', '2019-01-30 14:14:41.000000'),
(2, 'Peter', 'GWA', 2, 'AB', '2019-01-30 14:16:16.000000'),
(3, 'Bassey', 'GWA', 3, 'BA', '2019-01-30 15:42:02.109538'),
(4, 'Bassey', 'ABJ', 4, 'BB', '2019-01-30 15:42:26.042697'),
(14, 'Bassey', 'KWL', 9, 'BB', '2019-01-30 16:34:29.855048'),
(15, 'Bassey', 'ABC', 10, 'AB', '2019-01-30 16:37:25.143443'),
(16, 'Bassey', 'KUJ', 11, 'AA', '2019-01-30 16:38:06.428693'),
(17, 'Bassey', 'GWA', 12, 'AA', '2019-01-30 16:38:40.679505'),
(18, 'Bassey', 'BWR', 13, 'AA', '2019-01-30 16:43:39.954743'),
(19, 'Bassey', 'ABJ', 14, 'AB', '2019-01-30 16:48:16.778576'),
(20, 'Bassey', 'BWR', 15, 'BB', '2019-01-30 16:48:46.734205'),
(21, 'Bassey', 'ABJ', 16, 'BC', '2019-01-30 16:49:12.611369'),
(22, 'Bassey', 'BWR', 17, 'CC', '2019-01-30 17:10:56.763169'),
(23, 'Bassey', 'ABJ', 18, 'CD', '2019-01-31 09:06:59.041618'),
(24, 'Bassey', 'ABJ', 19, 'DD', '2019-01-31 09:06:59.188368'),
(25, 'Bassey', 'ABJ', 20, 'DE', '2019-01-31 09:06:59.232845'),
(26, 'Bassey', 'ABC', 21, 'EE', '2019-01-31 09:08:52.315244'),
(27, 'Bassey', 'ABC', 22, 'EF', '2019-01-31 09:08:52.368695'),
(28, 'Bassey', 'BWR', 23, 'FF', '2019-01-31 09:10:52.605623'),
(29, 'Bassey', 'BWR', 24, 'FG', '2019-01-31 09:10:52.666957'),
(30, 'Bassey', 'BWR', 25, 'GG', '2019-01-31 09:10:52.731632');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_group`
--
ALTER TABLE `auth_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_group_permissions_group_id_permission_id_0cd325b0_uniq` (`group_id`,`permission_id`),
  ADD KEY `auth_group_permissio_permission_id_84c5c92e_fk_auth_perm` (`permission_id`);

--
-- Indexes for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_permission_content_type_id_codename_01ab375a_uniq` (`content_type_id`,`codename`);

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_user_groups_user_id_group_id_94350c0c_uniq` (`user_id`,`group_id`),
  ADD KEY `auth_user_groups_group_id_97559544_fk_auth_group_id` (`group_id`);

--
-- Indexes for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_user_user_permissions_user_id_permission_id_14a6b632_uniq` (`user_id`,`permission_id`),
  ADD KEY `auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm` (`permission_id`);

--
-- Indexes for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `django_admin_log_content_type_id_c4bce8eb_fk_django_co` (`content_type_id`),
  ADD KEY `django_admin_log_user_id_c564eba6_fk_auth_user_id` (`user_id`);

--
-- Indexes for table `django_content_type`
--
ALTER TABLE `django_content_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `django_content_type_app_label_model_76bd3d3b_uniq` (`app_label`,`model`);

--
-- Indexes for table `django_migrations`
--
ALTER TABLE `django_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `django_session`
--
ALTER TABLE `django_session`
  ADD PRIMARY KEY (`session_key`),
  ADD KEY `django_session_expire_date_a5c62663` (`expire_date`);

--
-- Indexes for table `numberplatesgenerator_numberplate`
--
ALTER TABLE `numberplatesgenerator_numberplate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_group`
--
ALTER TABLE `auth_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_permission`
--
ALTER TABLE `auth_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `django_content_type`
--
ALTER TABLE `django_content_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `django_migrations`
--
ALTER TABLE `django_migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `numberplatesgenerator_numberplate`
--
ALTER TABLE `numberplatesgenerator_numberplate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  ADD CONSTRAINT `auth_group_permissio_permission_id_84c5c92e_fk_auth_perm` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`),
  ADD CONSTRAINT `auth_group_permissions_group_id_b120cbf9_fk_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`);

--
-- Constraints for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD CONSTRAINT `auth_permission_content_type_id_2f476e4b_fk_django_co` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`);

--
-- Constraints for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  ADD CONSTRAINT `auth_user_groups_group_id_97559544_fk_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `auth_user_groups_user_id_6a12ed8b_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  ADD CONSTRAINT `auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`),
  ADD CONSTRAINT `auth_user_user_permissions_user_id_a95ead1b_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  ADD CONSTRAINT `django_admin_log_content_type_id_c4bce8eb_fk_django_co` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`),
  ADD CONSTRAINT `django_admin_log_user_id_c564eba6_fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
