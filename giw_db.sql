-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 04:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giw_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminbookinghistory`
--

CREATE TABLE `tbl_adminbookinghistory` (
  `id` int(11) NOT NULL,
  `Ref_No` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Appointment_date` varchar(255) DEFAULT NULL,
  `Appointment_time` varchar(255) DEFAULT NULL,
  `services` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `booking_date` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile_num` varchar(20) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_adminbookinghistory`
--

INSERT INTO `tbl_adminbookinghistory` (`id`, `Ref_No`, `email`, `Appointment_date`, `Appointment_time`, `services`, `duration`, `price`, `status`, `booking_date`, `name`, `mobile_num`, `user_type`) VALUES
(1, 'GIW12345678', 'kent.bernardino@gmail.com', '02/09/2024', '04:00 PM', '60 min Hot Stone Massage', 60, '110.00', 'Cancelled', '10/09/2024', 'Kenneth Bernardino', '1234567890', 'user'),
(2, 'GIW23456789', 'kent.bernardino@gmail.com', '03/09/2024', '11:30 AM', '90 Min Massage', 90, '150.00', 'Cancelled', '24/08/2024', 'Kenneth Bernardino', '0987654321', 'user'),
(3, 'GIW34567890', 'kent.bernardino@gmail.com', '01/09/2024', '12:30 PM', '90 Min Massage', 90, '150.00', 'Cancelled', '24/08/2024', 'Kenneth Bernardino', '1122334455', 'user'),
(4, 'GIW87654321', 'user1@example.com', '01/08/2024', '10:00 AM', '60 Min Massage', 60, '100.00', 'Completed', '28/07/2024', 'John Doe', '1234567890', 'user'),
(5, 'GIW87654322', 'user2@example.com', '02/08/2024', '11:00 AM', '90 Min Massage', 90, '150.00', 'Completed', '29/07/2024', 'Jane Smith', '0987654321', 'user'),
(6, 'GIW87654323', 'user3@example.com', '03/08/2024', '09:00 AM', 'Hot Stone Massage', 60, '110.00', 'Completed', '30/07/2024', 'Michael Johnson', '9876543210', 'user'),
(7, 'GIW87654324', 'user4@example.com', '05/08/2024', '03:00 PM', 'Deep Tissue Massage', 90, '150.00', 'Completed', '31/07/2024', 'Emily Brown', '8765432109', 'user'),
(8, 'GIW87654325', 'user5@example.com', '06/08/2024', '01:00 PM', '90 Min Massage', 90, '150.00', 'Completed', '01/08/2024', 'Chris Evans', '7654321098', 'user'),
(9, 'GIW87654326', 'user6@example.com', '07/08/2024', '12:00 PM', '60 Min Massage', 60, '100.00', 'Completed', '02/08/2024', 'Laura Miller', '6543210987', 'user'),
(10, 'GIW87654327', 'user7@example.com', '08/08/2024', '02:00 PM', 'Aromatherapy Massage', 60, '120.00', 'Completed', '03/08/2024', 'Brian Taylor', '5432109876', 'user'),
(11, 'GIW87654328', 'user8@example.com', '10/08/2024', '09:30 AM', 'Hot Stone Massage', 60, '110.00', 'Completed', '04/08/2024', 'Sarah Williams', '4321098765', 'user'),
(12, 'GIW87654329', 'user9@example.com', '12/08/2024', '04:30 PM', '90 Min Massage', 90, '150.00', 'Completed', '05/08/2024', 'David Clark', '3210987654', 'user'),
(13, 'GIW87654330', 'user10@example.com', '13/08/2024', '11:30 AM', '60 Min Massage', 60, '100.00', 'Completed', '06/08/2024', 'Sophia Lewis', '2109876543', 'user'),
(14, 'GIW87654331', 'user11@example.com', '14/08/2024', '12:00 PM', '90 Min Massage', 90, '150.00', 'Completed', '07/08/2024', 'Mark Robinson', '1098765432', 'user'),
(15, 'GIW87654332', 'user12@example.com', '15/08/2024', '01:00 PM', 'Hot Stone Massage', 60, '110.00', 'Completed', '08/08/2024', 'Julia Adams', '9876543211', 'user'),
(16, 'GIW87654333', 'user13@example.com', '17/08/2024', '02:00 PM', 'Aromatherapy Massage', 60, '120.00', 'Completed', '09/08/2024', 'Chris Thompson', '8765432110', 'user'),
(17, 'GIW87654334', 'user14@example.com', '18/08/2024', '03:30 PM', '90 Min Massage', 90, '150.00', 'Completed', '10/08/2024', 'Linda Scott', '7654321109', 'user'),
(18, 'GIW87654335', 'user15@example.com', '19/08/2024', '10:00 AM', '60 Min Massage', 60, '100.00', 'Completed', '11/08/2024', 'George Harris', '6543211098', 'user'),
(19, 'GIW87654336', 'user16@example.com', '20/08/2024', '11:00 AM', '90 Min Massage', 90, '150.00', 'Completed', '12/08/2024', 'Nancy White', '5432110987', 'user'),
(20, 'GIW87654337', 'user17@example.com', '21/08/2024', '01:30 PM', 'Hot Stone Massage', 60, '110.00', 'Completed', '13/08/2024', 'Peter Green', '4321109876', 'user'),
(21, 'GIW87654338', 'user18@example.com', '23/08/2024', '03:00 PM', 'Deep Tissue Massage', 90, '150.00', 'Completed', '14/08/2024', 'Grace Morgan', '3211098765', 'user'),
(22, 'GIW87654339', 'user19@example.com', '25/08/2024', '02:00 PM', 'Aromatherapy Massage', 60, '120.00', 'No show', '15/08/2024', 'Henry King', '2109987654', 'user'),
(23, 'GIW87654340', 'user20@example.com', '26/08/2024', '01:30 PM', '90 Min Massage', 90, '150.00', 'No show', '16/08/2024', 'Olivia Parker', '1099976543', 'user'),
(24, 'GIW87654341', 'user21@example.com', '28/08/2024', '09:00 AM', '60 Min Massage', 60, '100.00', 'Cancelled', '17/08/2024', 'Matthew Hall', '9987654321', 'user'),
(25, 'GIW87654342', 'user22@example.com', '29/08/2024', '11:30 AM', '90 Min Massage', 90, '150.00', 'Cancelled', '18/08/2024', 'Victoria Turner', '8976543210', 'user'),
(26, 'GIW87654343', 'user23@example.com', '30/08/2024', '04:00 PM', 'Hot Stone Massage', 60, '110.00', 'Cancelled', '19/08/2024', 'James Young', '7965432109', 'user'),
(27, 'GIW87654344', 'user24@example.com', '01/09/2024', '10:30 AM', 'Aromatherapy Massage', 60, '120.00', 'Cancelled', '20/08/2024', 'Betty Carter', '6954321098', 'user'),
(28, 'GIW87654345', 'user25@example.com', '02/09/2024', '12:00 PM', 'Deep Tissue Massage', 90, '150.00', 'Cancelled', '21/08/2024', 'Edward Collins', '5943210987', 'user'),
(29, 'GIW92032758', 'ken.bernardino@yahoo.com', '07/09/2024', '10:30 AM', '80 min Bowen therapy & Massage Session', NULL, '130.00', 'Cancelled', '03/09/2024', 'Oscar Mitchell', '5943210987', 'user'),
(30, 'GIW92032755', 'ken.bernardino@yahoo.com', '18/09/2024', '10:30 AM', '30 min Prenatal Massage', NULL, '60.00', 'Cancelled', '01/10/2024', 'Oscar Mitchell', '5943210987', 'user'),
(31, 'GIW92032744', 'super@admin.com', '10/09/2024', '11:00 AM', '60 min remedial Massage', NULL, '100.00', 'Cancelled', '03/09/2024', 'Edward Collins', '5943210987', 'user'),
(32, 'GIW58821489', 'kenneth_isaac_20@yahoo.com.ph', '09/09/2024', '12:30 PM', '80 min Bowen therapy & Massage Session', 65, '130.00', 'Completed', '08/09/2024', 'Charl Bernardino', '12', 'guest'),
(33, 'GIW89534880', 'kent.bernardino@gmail.com', '27/08/2024', '10:00 AM', '30 min Remedial Massage', 30, '60.00', 'Completed', '22/08/2024', 'Kenneth Bernardino', '', 'user'),
(34, 'GIW16856155', 'kent.bernardino@gmail.com', '05/09/2024', '02:00 PM', '90 min Deep Tissue Massage', 90, '150.00', 'Completed', '01/09/2024', 'Kenneth Bernardino', '', 'user'),
(35, 'GIW51046416', 'ken.bernardino@yahoo.com', '15/09/2024', '11:30 AM', '90 min Remedial Massage', NULL, '23.00', 'Cancelled', '15/09/2024', 'Ken Bernardino', NULL, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `blog_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `title`, `author`, `content`, `post_date`, `blog_img`) VALUES
(9, 'What does it mean to be a mother?', 'Gloria', '&lt;p&gt;With Mother&#039;s Day just a few weeks ago, it got me thinking about motherhood and the labels we put on it.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;I have two beautiful boys who are 9 and 6, so in the eyes of the world, I have been a mother for 9 years. However, I am the first of four children, with the youngest of my siblings being 10 years younger than me. My parents being immigrants to the UK had to work whatever hours they were given to make ends meet, which resulted in me as the oldest, having to feed, entertain and put my sister and brothers to bed.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Going into our teenage years, I was there for them whenever they needed me. That person to talk to, take them to events, hang out with them and be their safe space.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;You could say that for those periods of time, I was their mother.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;I may not have birthed them but I loved them as if they are my own.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;My own experience is no different to many other women.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Women who step into that name that we often traditionally see as one only reserved for those who gave birth to a child.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong class=&quot;x-el x-el-span c2-2c c2-2d c2-3 c2-5s c2-2n c2-3i c2-5t&quot;&gt;How do we define a mother?&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;A mother is a woman who looks after another person physically, emotionally, mentally and for those that believe, spiritually.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;What a mother feels is not dictated by blood relation, last name or even the person being cared for&amp;rsquo;s self-worth. They do it from love and a desire to see that person succeed, as a child or as an adult.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;For those whose opportunity to do so is taken away through various circumstances, you are still a mother. You still hold your child in your mind heart and soul, and their presence on earth does not make their essence any less.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&lt;em class=&quot;x-el x-el-span c2-2c c2-2d c2-3 c2-5s c2-2n c2-2k c2-5t c2-5u&quot;&gt;&lt;strong class=&quot;x-el x-el-span c2-2c c2-2d c2-3 c2-5s c2-2n c2-3i c2-5t&quot;&gt;So, this Mother&amp;rsquo;s Day if you fulfil this role then this name is yours!&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;You deserve to be celebrated. You deserve to be acknowledged and to take a little moment out for yourself.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Buy that shirt you have been eyeing off, get that fancy pedicure or book a massage in, to ease the aches and pains you have been feeling.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;You can book an online massage with me via my appointments page.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&lt;em class=&quot;x-el x-el-span c2-2c c2-2d c2-3 c2-5s c2-2n c2-2k c2-5t c2-5u&quot;&gt;&lt;strong class=&quot;x-el x-el-span c2-2c c2-2d c2-3 c2-5s c2-2n c2-3i c2-5t&quot;&gt;Show yourself some love mamma. You deserve it!&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;', '25 May 2023', 'What_does_it_mean_to_be_a_mother_.jpg'),
(10, 'The one thing that will enhance your massage and your life!', 'Gloria', '&lt;p&gt;It&amp;rsquo;s such a small thing, but it has the power to change a lot. &amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Have you ever found that you have been disappointed by a friend&amp;rsquo;s actions, maybe when they cancel on a coffee catch-up or don&amp;rsquo;t do something they said they would?&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;As a teenager my friends were the family I created, they met a need I just didn&amp;rsquo;t get through my own family. So, let&amp;rsquo;s just say I had extremely high expectations of my friendships. I wanted to mean as much to them as they did to me. You could say my expectations were a little too high. &amp;nbsp;&lt;/p&gt;\n&lt;p&gt;If we made plans and for some reason, they had to cancel, I would be deeply hurt.&amp;nbsp;&lt;/p&gt;\n&lt;div&gt;\n&lt;h4 class=&quot;x-el x-el-h4 c2-60 c2-61 c2-2f c2-2g c2-3p c2-1s c2-1q c2-1p c2-1r c2-3 c2-2s c2-62 c2-2u c2-63 c2-64 c2-65 c2-66&quot;&gt;When actions and expectations don&amp;rsquo;t collide&amp;nbsp;&lt;/h4&gt;\n&lt;/div&gt;\n&lt;p&gt;My expectation of the joy and happiness I would get from having a coffee or taking a walk in the park with a friend was something I&amp;nbsp;&lt;em class=&quot;x-el x-el-span c2-2c c2-2d c2-3 c2-5j c2-2n c2-2k c2-5k c2-5l&quot;&gt;&lt;strong class=&quot;x-el x-el-span c2-2c c2-2d c2-3 c2-5j c2-2n c2-3i c2-5k&quot;&gt;needed.&lt;/strong&gt;&lt;/em&gt;&amp;nbsp;It helped me forget the rejection I often felt at home.&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Unmet expectations...I never realised that unmet expectations were the basis of a lot of sadness I have felt when it comes to friendships.&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;When I felt like a friend had let me down, the disappointment for me was felt so deeply, that it physically hurt. It took me longer than I would like to admit to not feel sad and angry at them for cancelling. It never deterred me though as I kept going back for more!&amp;nbsp;&lt;/p&gt;\n&lt;div&gt;\n&lt;h4 class=&quot;x-el x-el-h4 c2-60 c2-61 c2-2f c2-2g c2-3p c2-1s c2-1q c2-1p c2-1r c2-3 c2-2s c2-62 c2-2u c2-63 c2-64 c2-65 c2-66&quot;&gt;So, we shouldn&amp;rsquo;t have expectations? &amp;nbsp;&lt;/h4&gt;\n&lt;/div&gt;\n&lt;p&gt;I&amp;rsquo;m in no way saying we shouldn&amp;rsquo;t have them, or they can&amp;rsquo;t be a useful tool especially when it comes to holding ourselves or someone else accountable, but they can colour how we react to situations.&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;And being aware of your expectations can lead to fewer misunderstandings or maybe&amp;nbsp;&lt;strong class=&quot;x-el x-el-span c2-2c c2-2d c2-3 c2-5j c2-2n c2-3i c2-5k&quot;&gt;more&amp;nbsp;&lt;/strong&gt;understanding and compassion.&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Through the work with my psychologist, when I have come into a situation where I am overwhelmed by my emotions, I have learnt to look at what my expectations have been of the other person or the situation.&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;I will ask myself:&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;What was the outcome I wanted? &amp;nbsp;&lt;/li&gt;\n&lt;li&gt;Was it realistic? &amp;nbsp;&lt;/li&gt;\n&lt;li&gt;Was it fair to myself or the other person to have that expectation?&amp;nbsp;&lt;/li&gt;\n&lt;/ul&gt;\n&lt;div&gt;\n&lt;h4 class=&quot;x-el x-el-h4 c2-60 c2-61 c2-2f c2-2g c2-3p c2-1s c2-1q c2-1p c2-1r c2-3 c2-2s c2-62 c2-2u c2-63 c2-64 c2-65 c2-66&quot;&gt;How do expectations affect my massage treatment?&amp;nbsp;&lt;/h4&gt;\n&lt;/div&gt;\n&lt;p&gt;Through this personal realisation of expectations, I have learnt to apply this to my massage therapy.&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;This is why my questions and assessments before you lay on the table are so important.&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;I might ask,&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;What would you like done today? &amp;nbsp;&lt;/li&gt;\n&lt;li&gt;How can I help you? &amp;nbsp;&lt;/li&gt;\n&lt;li&gt;Do you want a little bit of everything? &amp;nbsp;&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;This is such an important part of your session. &amp;nbsp;&lt;/p&gt;\n&lt;p&gt;It lets me know what your expectations and goals are, and what parts of your body I need to focus on so that by the end of the session you feel your expectations have been met.&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;And I&#039;ll always check in at the end of the session with how you are feeling. &amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Because meeting expectations can make life so much easier when we are clear and open about what those expectations are.&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;If you&amp;rsquo;re in need of a massage therapist who listens to your needs and meets your expectations, take a look at our services page, and take advantage of our easy online booking system.&lt;/p&gt;', '25 March 2023', 'The_one_thing_that_will_enhance_your_massage_and_your_life_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookingappointment`
--

CREATE TABLE `tbl_bookingappointment` (
  `id` int(11) NOT NULL,
  `Ref_No` varchar(50) NOT NULL,
  `Appointment_date` varchar(50) NOT NULL,
  `Appointment_time` varchar(100) NOT NULL,
  `services` varchar(255) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_num` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bookingappointment`
--

INSERT INTO `tbl_bookingappointment` (`id`, `Ref_No`, `Appointment_date`, `Appointment_time`, `services`, `duration`, `Price`, `Status`, `booking_date`, `email`, `name`, `mobile_num`, `user_type`) VALUES
(7, 'GIW27812234', '20/09/2024', '09:00 AM', '90 min Aromatherapy Massage', '90', '160.00', 'Confirmed', '15/09/2024', 'kent.bernardino@gmail.com', 'Kenneth Bernardino', '', 'user'),
(17, 'GIW67466207', '15/09/2024', '11:00 AM', '80 min Bowen therapy & Massage Session', '80', '130.00', 'Confirmed', '10/09/2024', 'kenneth_isaac_20@yahoo.com.ph', 'Ken Bernardino', '123', 'guest'),
(18, 'GIW57384388', '18/09/2024', '11:00 AM', '30 min Remedial Massage', '30', '60.00', 'Confirmed', '10/09/2024', 'ken.bernardino@yahoo.com', ' Bernardino', '0412345678', 'user'),
(19, 'GIW37023778', '19/09/2024', '10:30 AM', '60 min Session', '60', '100.00', 'Confirmed', '12/09/2024', 'super@admin.com', 'Ken Bernardino', '123', 'guest'),
(20, 'GIW92262991', '15/09/2024', '09:30 AM', '60 min remedial Massage', '60', '100.00', 'Confirmed', '12/09/2024', 'ken.bernardino@yahoo.com', ' Bernardino', '0412345678', 'user'),
(22, 'GIW67910854', '20/09/2024', '12:00 PM', '80 min Bowen therapy & Massage Session', '80', '130.00', 'Confirmed', '17/09/2024', 'super@admin.com', 'Ken Bernardino', '123', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookinghistory`
--

CREATE TABLE `tbl_bookinghistory` (
  `id` int(11) NOT NULL,
  `Ref_No` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `Appointment_date` varchar(50) NOT NULL,
  `Appointment_time` varchar(50) NOT NULL,
  `services` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `booking_date` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `mobile_num` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bookinghistory`
--

INSERT INTO `tbl_bookinghistory` (`id`, `Ref_No`, `email`, `Appointment_date`, `Appointment_time`, `services`, `price`, `status`, `booking_date`, `name`, `duration`, `mobile_num`, `user_type`) VALUES
(1, 'GIW20459079', 'kent.bernardino@gmail.com', '01/08/2024', '09:00 AM', '30 min Remedial Massage', '60.00', 'Completed', '25/07/2024', 'Alice Walker', '30 minutes', '1111111111', ''),
(2, 'GIW78939210', 'kent.bernardino@gmail.com', '02/08/2024', '10:30 AM', '60 min remedial Massage', '60.00', 'Cancelled', '26/07/2024', 'Bob Smith', '60 minutes', '2222222222', ''),
(3, 'GIW33318819', 'kent.bernardino@gmail.com', '03/08/2024', '02:00 PM', '90 Min Massage', '60.00', 'No show', '27/07/2024', 'Charlie Johnson', '90 minutes', '3333333333', ''),
(4, 'GIW29776466', 'kent.bernardino@gmail.com', '04/08/2024', '11:00 AM', '80 min Bowen therapy & Massage SESSION', '60.00', 'Cancelled', '28/07/2024', 'Diana Ross', '80 minutes', '4444444444', ''),
(5, 'GIW48925876', 'kent.bernardino@gmail.com', '05/08/2024', '04:30 PM', '60 min SESSION ONE', '60.00', 'Completed', '29/07/2024', 'Eve Carter', '60 minutes', '5555555555', ''),
(6, 'GIW55299988', 'kent.bernardino@gmail.com', '06/08/2024', '01:00 PM', '30 min Remedial Massage', '60.00', 'No show', '30/07/2024', 'Frank Green', '30 minutes', '6666666666', ''),
(7, 'GIW29722314', 'kent.bernardino@gmail.com', '07/08/2024', '09:30 AM', '60 min remedial Massage', '60.00', 'Completed', '31/07/2024', 'Grace Evans', '60 minutes', '7777777777', ''),
(8, 'GIW82711611', 'kent.bernardino@gmail.com', '08/08/2024', '03:00 PM', '90 Min Massage', '60.00', 'Completed', '01/08/2024', 'Hannah White', '90 minutes', '8888888888', ''),
(9, 'GIW24391115', 'kent.bernardino@gmail.com', '09/08/2024', '12:00 PM', '80 min Bowen therapy & Massage SESSION', '60.00', 'Cancelled', '02/08/2024', 'Ian Scott', '80 minutes', '9999999999', ''),
(10, 'GIW73820748', 'kent.bernardino@gmail.com', '10/08/2024', '10:00 AM', '60 min SESSION ONE', '60.00', 'Completed', '03/08/2024', 'Jane King', '60 minutes', '1010101010', ''),
(12, 'GIW95930396', 'kent.bernardino@gmail.com', '30/08/2024', '03:00 PM', '60 min Sports Massage', '120.00', 'Cancelled', '25/08/2024', 'Laura Miller', '60 minutes', '1212121212', ''),
(14, 'GIW58189740', 'kent.bernardino@gmail.com', '01/09/2024', '12:00 PM', '60 min Remedial Massage', '100.00', 'Completed', '22/08/2024', 'Michael Brown', '60 minutes', '1313131313', ''),
(16, 'GIW03157514', 'kent.bernardino@gmail.com', '02/09/2024', '04:00 PM', '60 min Hot Stone Massage', '110.00', 'Cancelled', '10/08/2024', 'Nancy Adams', '60 minutes', '1414141414', ''),
(17, 'GIW41218355', 'kent.bernardino@gmail.com', '03/09/2024', '11:30 AM', '90 Min Massage', '150.00', 'Cancelled', '24/08/2024', 'Oliver Taylor', '90 minutes', '1515151515', ''),
(18, 'GIW96619238', 'kent.bernardino@gmail.com', '04/09/2024', '01:00 PM', '30 min Remedial Massage', '60.00', 'Cancelled', '27/08/2024', 'Patricia Clark', '30 minutes', '1616161616', ''),
(19, 'GIW59441128', 'kent.bernardino@gmail.com', '05/09/2024', '12:30 PM', '90 Min Massage', '150.00', 'Cancelled', '24/08/2024', 'Quincy Hall', '90 minutes', '1717171717', ''),
(20, 'GIW07347931', 'kent.bernardino@gmail.com', '05/09/2024', '12:30 PM', '90 Min Massage', '150.00', 'Cancelled', '24/08/2024', 'Rebecca Davis', '90 minutes', '1818181818', ''),
(21, 'GIW87654321', 'user1@example.com', '01/08/2024', '10:00 AM', '60 Min Massage', '100.00', 'Completed', '28/07/2024', 'Steve Thomas', '60 minutes', '1919191919', 'user'),
(22, 'GIW87654322', 'user2@example.com', '02/08/2024', '11:00 AM', '90 Min Massage', '150.00', 'Completed', '29/07/2024', 'Tina Lee', '90 minutes', '2020202020', 'user'),
(23, 'GIW87654323', 'user3@example.com', '03/08/2024', '09:00 AM', 'Hot Stone Massage', '110.00', 'Completed', '30/07/2024', 'Uma Harris', '60 minutes', '2121212121', 'user'),
(24, 'GIW87654324', 'user4@example.com', '05/08/2024', '03:00 PM', 'Deep Tissue Massage', '150.00', 'Completed', '31/07/2024', 'Victor Martin', '90 minutes', '2222222222', 'user'),
(25, 'GIW87654325', 'user5@example.com', '06/08/2024', '01:00 PM', '90 Min Massage', '150.00', 'Completed', '01/08/2024', 'Wendy Young', '90 minutes', '2323232323', 'user'),
(26, 'GIW87654326', 'user6@example.com', '07/08/2024', '12:00 PM', '60 Min Massage', '100.00', 'Completed', '02/08/2024', 'Xander Lewis', '60 minutes', '2424242424', 'user'),
(27, 'GIW87654327', 'ken.bernardino@yahoo.com', '08/08/2024', '02:00 PM', 'Aromatherapy Massage', '120.00', 'Completed', '03/08/2024', 'Yara Robinson', '60 minutes', '2525252525', 'user'),
(28, 'GIW87654328', 'user8@example.com', '10/08/2024', '09:30 AM', 'Hot Stone Massage', '110.00', 'Completed', '04/08/2024', 'Zachary Parker', '60 minutes', '2626262626', 'user'),
(29, 'GIW87654329', 'user9@example.com', '12/08/2024', '04:30 PM', '90 Min Massage', '150.00', 'Completed', '05/08/2024', 'Alice Wilson', '90 minutes', '2727272727', 'user'),
(30, 'GIW87654330', 'user10@example.com', '13/08/2024', '11:30 AM', '60 Min Massage', '100.00', 'Completed', '06/08/2024', 'Brian Moore', '60 minutes', '2828282828', 'user'),
(31, 'GIW87654331', 'user11@example.com', '14/08/2024', '12:00 PM', '90 Min Massage', '150.00', 'Completed', '07/08/2024', 'Catherine Reed', '90 minutes', '2929292929', 'user'),
(32, 'GIW87654332', 'user12@example.com', '15/08/2024', '01:00 PM', 'Hot Stone Massage', '110.00', 'Completed', '08/08/2024', 'David Cook', '60 minutes', '3030303030', 'user'),
(33, 'GIW87654333', 'user13@example.com', '17/08/2024', '02:00 PM', 'Aromatherapy Massage', '120.00', 'Completed', '09/08/2024', 'Ella Murphy', '60 minutes', '3131313131', 'user'),
(34, 'GIW87654334', 'user14@example.com', '18/08/2024', '03:30 PM', '90 Min Massage', '150.00', 'Completed', '10/08/2024', 'Franklin Ward', '90 minutes', '3232323232', 'user'),
(35, 'GIW87654335', 'user15@example.com', '19/08/2024', '10:00 AM', '60 Min Massage', '100.00', 'Completed', '11/08/2024', 'Gina Bailey', '60 minutes', '3333333333', 'user'),
(36, 'GIW87654336', 'user16@example.com', '20/08/2024', '11:00 AM', '90 Min Massage', '150.00', 'Completed', '12/08/2024', 'Henry Brooks', '90 minutes', '3434343434', 'user'),
(37, 'GIW87654337', 'user17@example.com', '21/08/2024', '01:30 PM', 'Hot Stone Massage', '110.00', 'Completed', '13/08/2024', 'Isabella Turner', '60 minutes', '3535353535', 'user'),
(38, 'GIW87654338', 'user18@example.com', '23/08/2024', '03:00 PM', 'Deep Tissue Massage', '150.00', 'Completed', '14/08/2024', 'Jack Phillips', '90 minutes', '3636363636', 'user'),
(39, 'GIW87654339', 'user19@example.com', '25/08/2024', '02:00 PM', 'Aromatherapy Massage', '120.00', 'No show', '15/08/2024', 'Karen Price', '60 minutes', '3737373737', 'user'),
(40, 'GIW87654340', 'user20@example.com', '26/08/2024', '01:30 PM', '90 Min Massage', '150.00', 'No show', '16/08/2024', 'Larry Collins', '90 minutes', '3838383838', 'user'),
(41, 'GIW87654341', 'user21@example.com', '28/08/2024', '09:00 AM', '60 Min Massage', '100.00', 'Cancelled', '17/08/2024', 'Megan Richardson', '60 minutes', '3939393939', 'user'),
(42, 'GIW87654342', 'user22@example.com', '29/08/2024', '11:30 AM', '90 Min Massage', '150.00', 'Cancelled', '18/08/2024', 'Nina Simmons', '90 minutes', '4040404040', 'user'),
(43, 'GIW87654343', 'user23@example.com', '30/08/2024', '04:00 PM', 'Hot Stone Massage', '110.00', 'Cancelled', '19/08/2024', 'Oscar Mitchell', '60 minutes', '4141414141', 'user'),
(44, 'GIW87654344', 'user24@example.com', '01/09/2024', '10:30 AM', 'Aromatherapy Massage', '120.00', 'Cancelled', '20/08/2024', 'Pamela Cox', '60 minutes', '4242424242', 'user'),
(45, 'GIW87654345', 'user25@example.com', '02/09/2024', '12:00 PM', 'Deep Tissue Massage', '150.00', 'Cancelled', '21/08/2024', 'Quincy Hayes', '90 minutes', '4343434343', 'user'),
(46, 'GIW92032758', 'ken.bernardino@yahoo.com', '07/09/2024', '10:30 AM', '80 min Bowen therapy & Massage Session', '130.00', 'Cancelled', '03/09/2024', 'Oscar Mitchell', '50', '4343434343', 'user'),
(47, 'GIW92032755', 'ken.bernardino@yahoo.com', '18/09/2024', '10:30 AM', '30 min Prenatal Massage', '60.00', 'Cancelled', '01/10/2024', 'Oscar Mitchell', '60', '4343434343', 'user'),
(48, 'GIW92032744', 'super@admin.com', '10/09/2024', '11:00 AM', '60 min remedial Massage', '100.00', 'Cancelled', '03/09/2024', 'Edward Collins', '', '5943210987', 'user'),
(49, 'GIW58821489', 'kenneth_isaac_20@yahoo.com.ph', '09/09/2024', '12:30 PM', '80 min Bowen therapy & Massage Session', '130.00', 'Completed', '08/09/2024', 'Charl Bernardino', '65', '12', 'guest'),
(50, 'GIW89534880', 'kent.bernardino@gmail.com', '27/08/2024', '10:00 AM', '30 min Remedial Massage', '60.00', 'Completed', '22/08/2024', 'Kenneth Bernardino', '30', '', 'user'),
(51, 'GIW16856155', 'kent.bernardino@gmail.com', '05/09/2024', '02:00 PM', '90 min Deep Tissue Massage', '150.00', 'Completed', '01/09/2024', 'Kenneth Bernardino', '90', '', 'user'),
(52, 'GIW51046416', 'ken.bernardino@yahoo.com', '15/09/2024', '11:30 AM', '90 min Remedial Massage', '23.00', 'Cancelled', '15/09/2024', 'Ken Bernardino', '', '', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_confirmorder`
--

CREATE TABLE `tbl_confirmorder` (
  `id` int(50) NOT NULL,
  `Ref_No` varchar(50) NOT NULL,
  `date_ordered` varchar(50) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `item_category` varchar(200) DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `Total_order` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `mobile_num` varchar(200) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_confirmorder`
--

INSERT INTO `tbl_confirmorder` (`id`, `Ref_No`, `date_ordered`, `product_name`, `item_category`, `price`, `quantity`, `total`, `Total_order`, `email`, `name`, `mobile_num`, `user_type`) VALUES
(1, 'GLOW62329595', '29/08/2024', 'Mask 1', '', '5.00', '3', '15.00', '42.00', 'kent.bernardino@gmail.com', 'Kenneth Bernardino', '123', ''),
(2, 'GLOW62329595', '29/08/2024', 'Mask 3', '', '5.00', '3', '15.00', '42.00', 'kent.bernardino@gmail.com', 'Kenneth Bernardino', '123', ''),
(3, 'GLOW62329595', '29/08/2024', 'Kuznea Relief Cream', '', '12', '1', '12.00', '42.00', 'kent.bernardino@gmail.com', 'Kenneth Bernardino', '123', ''),
(9, 'GLOW30037894', '29/08/2024', 'Sports tape', NULL, '5.00', '1', '5.00', '5.00', 'kent.bernardino@gmail.com', 'Kenneth Bernardino', '123', ''),
(10, 'GLOW24154080', '04/09/2024', 'Sports tape', NULL, '5.00', '2', '10.00', '25.00', 'kenneth_isaac_20@yahoo.com.ph', 'Ken Bernardino', '123', 'guest'),
(11, 'GLOW24154080', '04/09/2024', 'Mask 3', NULL, '5.00', '3', '15.00', '25.00', 'kenneth_isaac_20@yahoo.com.ph', 'Ken Bernardino', '123', 'guest'),
(13, 'GLOW33437278', '06/09/2024', 'Sports tape', NULL, '5.00', '3', '15.00', '15.00', 'kent.bernardino@gmail.com', 'Kenneth Bernardino', '123', ''),
(17, 'GLOW37566164', '08/09/2024', 'Mask 1', NULL, '5.00', '8', '40.00', '40.00', 'ken.bernardino@yahoo.com', 'Ken Bernardino', '0412345678', ''),
(18, 'GLOW44928537', '09/09/2024', 'Kuznea Relief Cream', NULL, '12.00', '1', '12.00', '12.00', 'kent.bernardino@gmail.com', 'Ken Bernardino', '123', 'guest'),
(19, 'GLOW73458755', '10/09/2024', 'Kuznea Relief Cream', NULL, '12.00', '1', '12.00', '17.00', 'mydoublet.s@gmail.com', 'ken test', '123', 'guest'),
(20, 'GLOW73458755', '10/09/2024', 'Mask 2', NULL, '5.00', '1', '5.00', '17.00', 'mydoublet.s@gmail.com', 'ken test', '123', 'guest'),
(24, 'GLOW26391718', '10/09/2024', 'Kuznea Relief Cream', NULL, '12.00', '1', '12.00', '12.00', 'ken.bernardino@yahoo.com', 'Ken Bernardino', '0412345678', ''),
(25, 'GLOW29286853', '12/09/2024', 'Kuznea Relief Cream', NULL, '12.00', '8', '96.00', '96.00', 'super@admin.com', 'Ken Bernardino', '123', 'guest'),
(26, 'GLOW85185297', '14/09/2024', 'Mask 2', NULL, '5.00', '1', '5.00', '5.00', 'super@admin.com', 'ken Bernardino', '123', 'guest'),
(27, 'GLOW83373556', '15/09/2024', 'Kuznea Relief Cream', NULL, '12.00', '1', '12.00', '12.00', 'ken.bernardino@yahoo.com', 'Ken Bernardino', '0412345678', ''),
(28, 'GLOW48903889', '17/09/2024', 'Mask 2', NULL, '5.00', '1', '5.00', '5.00', 'super@admin.com', 'Ken Bernardino', '12', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guestorders`
--

CREATE TABLE `tbl_guestorders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `item_img` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(50) NOT NULL,
  `msg_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `messages` text NOT NULL,
  `markread` varchar(255) NOT NULL,
  `date_received` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`id`, `msg_id`, `name`, `email`, `subject`, `messages`, `markread`, `date_received`) VALUES
(2, 'WELL30899965', 'Name55', 'random892@example.com', 'sub296', 'msg802', 'read', '06/09/2024'),
(5, 'WELL70981372', 'Name916', 'random308@example.com', 'sub792', 'msg36', 'read', '05/09/2024'),
(6, 'WELL26769612', 'Name803', 'random907@example.com', 'sub127', 'msg912', 'read', '05/09/2024'),
(9, 'WELL98342639', 'Name622', 'random730@example.com', 'sub785', 'msg735', 'read', '06/09/2024'),
(15, 'WELL12424001', 'Ken Bernardino', 'ken.bernardino@yahoo.com', 'test', 'asdfdgbasfgv SFWERFsdf adfgvadsf dsfwef', 'read', '07/09/2024');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderhistory`
--

CREATE TABLE `tbl_orderhistory` (
  `id` int(11) NOT NULL,
  `Ref_No` varchar(200) DEFAULT NULL,
  `date_ordered` varchar(200) DEFAULT NULL,
  `Total_order` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `pickup_date` varchar(200) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orderhistory`
--

INSERT INTO `tbl_orderhistory` (`id`, `Ref_No`, `date_ordered`, `Total_order`, `name`, `email`, `status`, `pickup_date`, `user_type`) VALUES
(1, 'GLOW62329595', '15/09/2024', '42.00', 'Kenneth Bernardino', 'kent.bernardino@gmail.com', 'Completed', '05/09/2024', ''),
(5, 'GLOW30037894', '29/08/2024', '5.00', 'Kenneth Bernardino', 'kent.bernardino@gmail.com', 'Completed', '01/09/2024', ''),
(6, 'GLOW24154080', '04/09/2024', '25.00', 'Ken Bernardino', 'kenneth_isaac_20@yahoo.com.ph', 'Completed', '10/09/2024', 'guest'),
(8, 'GLOW30037894', '29/08/2024', '5.00', 'Kenneth Bernardino', 'kent.bernardino@gmail.com', 'Completed', '01/09/2024', ''),
(9, 'GLOW24154080', '04/09/2024', '25.00', 'Ken Bernardino', 'kenneth_isaac_20@yahoo.com.ph', 'Completed', '10/09/2024', 'guest'),
(10, 'GLOW30037894', '29/08/2024', '5.00', 'Kenneth Bernardino', 'kent.bernardino@gmail.com', 'Completed', '01/09/2024', ''),
(11, 'GLOW62329595', '29/08/2024', '42.00', 'Kenneth Bernardino', 'kent.bernardino@gmail.com', 'Completed', '05/09/2024', 'user'),
(12, 'GLOW30037894', '29/08/2024', '5.00', 'Kenneth Bernardino', 'kent.bernardino@gmail.com', 'Completed', '01/09/2024', 'user'),
(13, 'GLOW24154080', '04/09/2024', '25.00', 'Ken Bernardino', 'kenneth_isaac_20@yahoo.com.ph', 'Completed', '10/09/2024', 'guest'),
(14, 'GLOW12345678', '01/09/2024', '35.50', 'John Doe', 'john.doe@gmail.com', 'Completed', '06/09/2024', 'guest'),
(15, 'GLOW98765432', '03/09/2024', '50.00', 'Jane Smith', 'jane.smith@yahoo.com', 'Completed', '04/09/2024', 'user'),
(16, 'GLOW45367231', '04/09/2024', '90.00', 'Michael Clark', 'michael.clark@example.com', 'Completed', '05/09/2024', 'guest'),
(17, 'GLOW83624157', '05/09/2024', '15.00', 'Emily Davis', 'emily.davis@gmail.com', 'Completed', '27/08/2024', 'user'),
(18, 'GLOW54387192', '06/09/2024', '75.00', 'Sarah Lee', 'sarah.lee@gmail.com', 'Completed', '29/08/2024', 'guest'),
(19, 'GLOW12398765', '07/09/2024', '20.00', 'David Kim', 'david.kim@gmail.com', 'Completed', '28/08/2024', 'user'),
(20, 'GLOW12987654', '08/09/2024', '60.00', 'Anna Green', 'anna.green@gmail.com', 'Completed', '30/08/2024', 'guest'),
(21, 'GLOW65412398', '09/09/2024', '55.00', 'William White', 'william.white@gmail.com', 'Completed', '31/08/2024', 'user'),
(22, 'GLOW96385274', '10/09/2024', '30.00', 'Sophia Brown', 'sophia.brown@gmail.com', 'Completed', '01/09/2024', 'guest'),
(23, 'GLOW74125896', '11/09/2024', '40.00', 'Oliver Black', 'oliver.black@gmail.com', 'Completed', '02/09/2024', 'user'),
(24, 'GLOW85274136', '12/09/2024', '85.00', 'Liam Blue', 'liam.blue@gmail.com', 'Completed', '03/09/2024', 'guest'),
(25, 'GLOW75395162', '13/09/2024', '25.00', 'Mia Gray', 'mia.gray@gmail.com', 'Completed', '04/09/2024', 'user'),
(26, 'GLOW74185296', '14/09/2024', '65.00', 'Noah Green', 'noah.green@gmail.com', 'Ready for pick up', '16/09/2024', 'guest'),
(27, 'GLOW96374185', '15/09/2024', '45.00', 'Lucas Red', 'lucas.red@gmail.com', 'Ready for pick up', '', 'user'),
(28, 'GLOW36985214', '16/09/2024', '70.00', 'Ava Blue', 'ava.blue@gmail.com', 'Completed', '15/09/2024', 'guest'),
(29, 'GLOW25874163', '17/09/2024', '95.00', 'Isabella Yellow', 'isabella.yellow@gmail.com', 'Ready for pick up', '', 'user'),
(30, 'GLOW14785236', '18/09/2024', '100.00', 'James Brown', 'james.brown@gmail.com', 'Completed', '05/09/2024', 'guest'),
(31, 'GLOW33437278', '06/09/2024', '15.00', 'Kenneth Bernardino', 'kent.bernardino@gmail.com', 'Ready for pick up', '-', ''),
(34, 'GLOW37566164', '08/09/2024', '40.00', 'Ken Bernardino', 'ken.bernardino@yahoo.com', 'Ready for pick up', '-', ''),
(35, 'GLOW44928537', '09/09/2024', '12.00', 'Ken Bernardino', 'kent.bernardino@gmail.com', 'Ready for pick up', '-', 'guest'),
(36, 'GLOW73458755', '10/09/2024', '17.00', 'ken test', 'mydoublet.s@gmail.com', 'Completed', '10/09/2024', 'guest'),
(38, 'GLOW26391718', '10/09/2024', '12.00', 'Ken Bernardino', 'ken.bernardino@yahoo.com', 'Completed', '10/09/2024', ''),
(148, 'GLOW29286853', '12/09/2024', '96.00', 'Ken Bernardino', 'super@admin.com', 'Ready for pick up', '-', 'guest'),
(149, 'GLOW85185297', '14/09/2024', '5.00', 'ken Bernardino', 'super@admin.com', 'Ready for pick up', '-', 'guest'),
(150, 'GLOW83373556', '15/09/2024', '12.00', 'Ken Bernardino', 'ken.bernardino@yahoo.com', 'Ready for pick up', '-', ''),
(151, 'GLOW48903889', '17/09/2024', '5.00', 'Ken Bernardino', 'super@admin.com', 'Ready for pick up', '-', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `item_img` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `product_name`, `price`, `quantity`, `total`, `item_img`, `email`) VALUES
(70, 'Mask 3', '5.00', '2', '10.00', 'mask3.jpg', 'ken.bernardino@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `item_category` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `stock` int(50) NOT NULL,
  `item_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_name`, `item_category`, `price`, `stock`, `item_img`) VALUES
(1, 'Kuznea Relief Cream', 'Cream', '12.00', 7, 'cream.jpg'),
(2, 'Mask 1', 'Mask', '5.00', 9, 'mask1.jpg'),
(3, 'Mask 2', 'Mask', '5.00', 12, 'mask2.jpg'),
(4, 'Mask 3', 'Mask', '5.00', 7, 'mask3.jpg'),
(5, 'Sports tape', 'Others', '5.00', 8, 'tape.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `service_description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `Service_image` varchar(255) NOT NULL,
  `Service_Category` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `service`, `service_description`, `price`, `Service_image`, `Service_Category`, `duration`) VALUES
(1, '30 min Remedial Massage', 'An efficient massage for when you know what you need or want to target a specific area. ', '60.00', '30 min Remedial Massage.JPG', 'Remedial Massage Therapy', '30'),
(2, '60 min remedial Massage', 'This massage gives us time to focus on each area and a little extra time to get the relaxation benefits. ', '60.00', '60 min remedial Massage.jpg', 'Remedial Massage Therapy', '60'),
(4, '60 min Session', '30 -40 mins of therapy plus consult. Please allow 1 hour, including assessment.  ', '90.00', '60 min Session.JPG', 'Bowen Therapy', '60'),
(5, '80 min Bowen therapy & Massage Session', '60- 65 mins of therapy plus consult. Please allow 80 mins, including assessment.  ', '130.00', '80 min Bowen therapy & Massage Session.JPG', 'Bowen Therapy', '80'),
(9, '90 min Remedial Massage', 'This one is pure gold. Time to work on all those aches and pains and you will leave feeling totally relaxed as well. ', '23.00', '90 min Remedial Massage.JPG', 'Remedial Massage Therapy', '90');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile_num` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `date_registered` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `mobile_num`, `email`, `username`, `password`, `role`, `user_img`, `date_registered`) VALUES
(1, 'Kenneth', 'Bernardino', '123', 'kent.bernardino@gmail.com', 'kent@', 'Kent@1234', 'admin', 'kent.bernardino@gmail.com.jpg', '23/08/2024'),
(2, 'Ken', 'Bernardino', '0412345678', 'ken.bernardino@yahoo.com', 'kent20', 'Well@1234', 'user', 'ken.bernardino@yahoo.com.jpg', '16/06/2024'),
(3, 'John', 'Doe', '0412345678', 'kenneth_isaac_20@yahoo.com.ph', 'johndoe', 'John@1234', 'user', 'user.JPG', '01/08/2024'),
(4, 'Jane', 'Doe', '0412345679', 'john.doe@gmail.com', 'janedoe', 'Jane@1234', 'user', 'user.JPG', '25/07/2024'),
(6, 'Emma', 'Jones', '0412345681', 'emma.jones@gmail.com', 'emmajones3', 'Emma@1234', 'user', 'user.JPG', '10/08/2024'),
(7, 'Lucas', 'Brown', '0412345682', 'lucas.brown@gmail.com', 'lucasbrown', 'Lucas@1234', 'user', 'user.JPG', '05/07/2024'),
(8, 'Olivia', 'Johnson', '0412345683', 'olivia.johnson@gmail.com', 'oliviajohnson', 'Olivia@1234', 'user', 'user.JPG', '28/06/2024'),
(9, 'Liam', 'Williams', '0412345684', 'liam.williams@gmail.com', 'liamwilliams', 'Liam@1234', 'user', 'user.JPG', '20/06/2024'),
(10, 'Sophia', 'Miller', '0412345685', 'sophia.miller@gmail.com', 'sophiamiller', 'Sophia@1234', 'user', 'user.JPG', '15/08/2024'),
(11, 'Noah', 'Taylor', '0412345686', 'noah.taylor@gmail.com', 'noahtaylor', 'Noah@1234', 'user', 'user.JPG', '10/06/2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminbookinghistory`
--
ALTER TABLE `tbl_adminbookinghistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bookingappointment`
--
ALTER TABLE `tbl_bookingappointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bookinghistory`
--
ALTER TABLE `tbl_bookinghistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_confirmorder`
--
ALTER TABLE `tbl_confirmorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guestorders`
--
ALTER TABLE `tbl_guestorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orderhistory`
--
ALTER TABLE `tbl_orderhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminbookinghistory`
--
ALTER TABLE `tbl_adminbookinghistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_bookingappointment`
--
ALTER TABLE `tbl_bookingappointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_bookinghistory`
--
ALTER TABLE `tbl_bookinghistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_confirmorder`
--
ALTER TABLE `tbl_confirmorder`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_guestorders`
--
ALTER TABLE `tbl_guestorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_orderhistory`
--
ALTER TABLE `tbl_orderhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
