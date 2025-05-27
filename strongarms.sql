-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2025 at 04:34 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strongarms`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image`, `slug`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Porro dolorum conseq', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><img src=\"https://mywheels.pk/uploads/images/klj.jpg\" class=\"img-thumbnail\" alt=\"\" style=\"border-color: rgb(221, 221, 221); padding: 4px; border-radius: 4px; display: inline-block; line-height: 1.42857; transition: 0.2s ease-in-out;\"></p><h1 style=\"margin: 20px 0px 10px; font-weight: 500; line-height: 1.1; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 24px !important;\"><span style=\"font-weight: 700;\">Sindh to Acquire 138 Double-Cabin Vehicles for Assistant Commissioners</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The public is talking about and being worried about the Sindh government\'s recent intention to buy 138 double-cabin cars for its assistant commissioners. Despite the government\'s previous announcements about cutting costs and freezing new development projects, this move raises questions about its financial priorities.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">The Decision to Purchase Double-Cabin Vehicles</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Despite facing financial difficulties, the Sindh government has chosen to purchase opulent double-cabin cars for its assistant commissioners. A&nbsp;budget of approximately Rs. 2 billion is required to make this purchase. Prior to his departure for a visitation to the United States, Syed Murad Ali Shah, the province chief minister, authorized the purchase summary.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">This decision has come under scrutiny because it seems to conflict with the government\'s earlier statements about reducing unnecessary expenses. At a time when resources are limited and financial concerns are mounting, many are questioning whether such a significant amount should be spent on vehicles.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">Government’s Justification</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">A representative for the Sindh government has responded to public concerns by defending the choice and stating that the assistant commissioners\' official duties require the use of double-cabin vehicles,&nbsp;particularly in rural areas. The spokesperson highlighted that this is the first time in 12 years that new vehicles have been purchased for assistant commissioners, stressing the importance of reliable transportation for their work in often challenging environments.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">Criticism and Concerns</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Despite the government’s defense, critics are not convinced that this expenditure is justified. They argue that more affordable and practical options could have been considered, such as smaller or more fuel-efficient vehicles. This would not only reduce costs but also align more closely with the government\'s stated goal of cutting expenses. Additionally, some have suggested that the government could provide public transportation facilities for assistant commissioners, further reducing the need for such costly vehicles.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Critics also point to the broader issue of government spending priorities. With limited resources, they argue that the Rs. 2 billion allocated for these vehicles could have been directed towards more urgent needs, such as improving education, healthcare, or infrastructure. In a province facing multiple socio-economic challenges, these areas are seen as far more deserving of financial support.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">Public Reaction</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The decision has led to significant public backlash, with many questioning whether the purchase is truly necessary, given the province’s financial constraints. People are expressing concern over the apparent contradiction between the government’s actions and its promises to reduce unnecessary expenditures.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">While some acknowledge that assistant commissioners need reliable transportation, the high cost of the double-cabin vehicles is viewed by many as excessive. The public is also frustrated by what they perceive as a misalignment between the government\'s words and actions, particularly when so many development projects have been put on hold.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">Alternatives to the Purchase</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Those who oppose the purchase have proposed various alternatives. One common suggestion is that the government could opt for smaller, more economical vehicles that would still serve the needs of the assistant commissioners without burdening the provincial budget. Others believe that investing in public transport systems for government officials could be a more sustainable and cost-effective solution.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Furthermore, critics argue that the funds set aside for these vehicles could have been used to address more pressing issues in Sindh. With many communities in need of better access to education, healthcare, and essential infrastructure, the decision to allocate such a large sum to vehicle purchases seems out of touch with the needs of the people.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">Conclusion</span></h2>', 'blogs/1747088556_QOl0kZBapH.jpeg', 'porro-dolorum-conseq', 'published', 28, '2025-05-09 18:49:15', '2025-05-12 17:22:36'),
(3, 'Animi vitae irure e', '<p data-start=\"92\" data-end=\"170\" class=\"\"><strong data-start=\"92\" data-end=\"104\">Subject:</strong> Application for Laravel Developer Position (0–3 Years Experience)</p>\r\n<p data-start=\"172\" data-end=\"181\" class=\"\"><strong data-start=\"172\" data-end=\"181\">Body:</strong></p>\r\n<p data-start=\"183\" data-end=\"212\" class=\"\">Dear [Hiring Manager\'s Name],</p>\r\n<p data-start=\"214\" data-end=\"249\" class=\"\">I hope this message finds you well.</p>\r\n<p data-start=\"251\" data-end=\"675\" class=\"\">I am writing to express my interest in the Laravel Developer position recently advertised (8 positions available). With [your years of experience] in PHP and Laravel development, I have hands-on experience in building REST APIs, managing MySQL databases, and following MVC architecture standards. I am also proficient with Git version control and have a strong understanding of clean code practices and debugging techniques.</p>\r\n<p data-start=\"677\" data-end=\"854\" class=\"\">I believe my skill set aligns well with your requirements and I am enthusiastic about the opportunity to contribute to your team. Please find my resume attached for your review.</p>\r\n<p data-start=\"856\" data-end=\"986\" class=\"\">Thank you for considering my application. I would welcome the opportunity to discuss how I can add value to your development team.</p>\r\n<p data-start=\"988\" data-end=\"1021\" class=\"\">Looking forward to your response.</p>\r\n<p data-start=\"1023\" data-end=\"1148\" class=\"\">Warm regards,<br data-start=\"1036\" data-end=\"1039\">\r\n<strong data-start=\"1039\" data-end=\"1059\">[Your Full Name]</strong><br data-start=\"1059\" data-end=\"1062\">\r\n[Phone Number]<br data-start=\"1076\" data-end=\"1079\">\r\n[Email Address]<br data-start=\"1094\" data-end=\"1097\">\r\n[LinkedIn/GitHub if any]<br data-start=\"1121\" data-end=\"1124\">\r\n[Attachment: Resume.pdf]</p>', 'blogs/1747087371_eMhwNM9KuL.jpg', 'animi-vitae-irure-e', 'published', 1, '2025-05-12 17:02:51', '2025-05-12 17:02:51'),
(4, 'Nissan Patrol 2025: Unveiling in Abu Dhabi', '<div class=\"blog-meta\" style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><span class=\"fa fa-calendar\" style=\"font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-family: FontAwesome; font-size: inherit;\"><br></span></div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><img src=\"https://www.mywheels.pk/uploads/images/dvdsz2.jpg\" class=\"img-thumbnail\" alt=\"\" style=\"border-color: rgb(221, 221, 221); padding: 4px; border-radius: 4px; display: inline-block; line-height: 1.42857; transition: 0.2s ease-in-out;\"></p><h1 style=\"margin: 20px 0px 10px; font-weight: 500; line-height: 1.1; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 24px !important;\"><span style=\"font-weight: 700;\">Nissan Patrol 2025: Unveiling in Abu Dhabi&nbsp;</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Nissan has introduced the seventh-generation \"Patrol 2025,\" marking a significant advancement for this iconic vehicle. The launch event, held in Abu Dhabi, was a grand affair, attracting attention from royalty, VIPs, and car enthusiasts worldwide.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">A Bold New Look</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The Nissan Patrol 2025 showcases a fresh and striking design that merges the vehicle\'s rich history with modern aesthetics. Its exterior is bold and powerful, featuring a more aggressive and muscular profile.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The front of the Patrol is redesigned with a wider V-motion grille, framed by sharp LED headlights, giving the SUV a commanding road presence. The sculpted fenders and bold lines contribute to its rugged yet refined appearance, reflecting both its legacy and forward-looking design.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Inside, the Patrol offers a luxurious and comfortable environment. The spacious cabin is decorated with high-quality materials, including premium leather upholstery and wood accents. The layout is well-planned, ensuring ergonomic seating and a sense of elegance. The ample legroom, headroom, and panoramic sunroof enhance the overall comfort, making every trip enjoyable.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">&nbsp;Engine Performance: Balancing Power and Efficiency</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Under the hood, the Patrol 2025 marks a shift from its traditional V8 engine to a more efficient 3.5-liter V6 twin-turbo engine. This change provides a blend of strong performance and improved fuel efficiency. The engine generates impressive power and torque, making it both powerful and economical.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The engine is paired with a 9-speed automatic transmission, ensuring smooth gear shifts and better responsiveness, whether driving in the city or on rough terrains. The Patrol\'s adaptive air suspension system complements the new engine, offering a smoother ride and enhanced handling by adjusting to various road conditions. This feature ensures the Patrol\'s ability to tackle any terrain, reinforcing its reputation as a top-tier SUV.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">Cutting-Edge Technology: Ready for the Future</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The Nissan Patrol 2025 is equipped with the latest technology, designed to provide a connected and seamless driving experience.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Central to this is the NissanConnect 2.0 system, powered by Google, which offers advanced navigation, real-time traffic updates, and access to various apps and services. This connectivity keeps drivers informed and entertained on the go.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Additionally, the Patrol includes ProPILOT Assist, Nissan’s semi-autonomous driving technology. This system features adaptive cruise control, lane-keeping assist, and automatic emergency braking, all aimed at enhancing safety and reducing driver fatigue during long drives. The SUV also boasts a Klipsch Premium Audio System, providing high-quality sound for an immersive driving experience.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">&nbsp;Off-Road Mastery: Built for Adventure</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The Nissan Patrol has long been celebrated for its exceptional off-road capabilities, and the 2025 model continues this legacy with several enhancements.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">&nbsp;The adaptive air suspension and powerful engine work together to deliver optimal performance, even in challenging conditions, making the Patrol a reliable companion for adventure seekers.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">Comprehensive Safety Features</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Safety is a top priority for Nissan, and the Patrol 2025 is no exception. The vehicle is equipped with a wide range of safety features designed to protect all occupants.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The Patrol includes multiple airbags, such as front, side, and knee airbags, providing maximum protection during a collision. Additionally, the SUV features advanced driver assistance systems like blind-spot monitoring, rear cross-traffic alert, and intelligent emergency braking. These technologies work together to prevent accidents, ensuring a safe driving experience.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">In conclusion, the Nissan Patrol 2025 represents a perfect blend of heritage, performance, and advanced technology. As Nissan continues to innovate, the Patrol remains a symbol of the brand\'s commitment to excellence, offering a vehicle that is both powerful and refined, ready for any challenge the road may present.</p>', 'blogs/1747090805_f3trXflbzi.jpg', 'nissan-patrol-2025:-unveiling-in-abu-dhabi', 'published', 1, '2025-05-12 18:00:05', '2025-05-12 18:00:05'),
(5, 'New Toyota Land Cruiser Prado J250', '<div class=\"blog-meta\" style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><span class=\"fa fa-calendar\" style=\"font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-family: FontAwesome; font-size: inherit;\"><br></span></div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><img src=\"https://www.mywheels.pk/uploads/images/hjbjk.jpg\" class=\"img-thumbnail\" alt=\"\" style=\"border-color: rgb(221, 221, 221); padding: 4px; border-radius: 4px; display: inline-block; line-height: 1.42857; transition: 0.2s ease-in-out;\"></p><h1 style=\"margin: 20px 0px 10px; font-weight: 500; line-height: 1.1; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 24px !important;\"><span style=\"font-weight: 700;\">&nbsp;New Toyota Land Cruiser Prado J250</span></h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Toyota has introduced the latest addition to its Land Cruiser lineup, the J250 series. While some motoring enthusiasts might consider this model a revamped version of the Prado, it is distinct in its own right. Let’s delve into the features and differences that set the J250 apart from the Prado.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">Design Philosophy</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The Land Cruiser J250 is a more compact version compared to the previous Prado, with an overall reduction of 8 cm in size. Despite this, it offers more space due to its extended wheelbase. The vehicle is adorned with a bold ‘TOYOTA’ logo reminiscent of the 70 series, giving it a robust and commanding presence on the road. Its muscular appearance, enhanced passenger comfort, and increased capacity make it a strong contender against vehicles like the Suzuki Jimny and Mercedes G-Wagon.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">Exterior Features</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The exterior of the J250 is designed to stand out with its boxy bonnet, daytime running lights (DRLs), and halogen lamps, all complemented by a metallic grey garnish and a plastic skid plate at the front. The side profile showcases a continuous character line, footrests, roof rails, and visors, all contributing to its boxy design. The 18-inch blacked-out rims add a dark and aggressive touch, while the tilting quarter glass softens the overall look, allowing passengers to enjoy the outside view.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Toyota has taken inspiration from vintage designs, as seen in the old-school exhaust, Defender-style taillights, diffuser, and split spoiler at the rear. Additionally, the vehicle offers features like smart entry and an automatic boot, providing quick and convenient access to the cabin.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">Interior Comfort and Technology</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Inside, the J250 adopts a straightforward yet luxurious design, accommodating up to seven passengers. The dashboard is covered in soft leather, giving the interior a premium yet minimalist feel. Toyota has upgraded to a 14-inch multimedia screen, replacing the previous cluster panel with a digital one.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The interior also boasts several advanced features, including separate climate control for rear passengers, air conditioning knobs, a 360-degree camera with an underground view, and charging and HDMI ports. Other amenities include a sporty gear knob, traction control, a handbrake button, a 4X4 option, and a range of Advanced Driver Assistance Systems (ADAS). For added safety, the J250 comes equipped with nine airbags and a JBL sound system for music enthusiasts.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\"><span style=\"font-weight: 700;\">Engine and Performance</span></h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The J250 offers three engine options: a 2.7 L non-turbo, a 2.4 L turbo, and a 2.8 L turbo diesel. Considering the Land Cruiser\'s transition from a V8 to a V6, the J250\'s 2.4 L engine is built for maximum performance.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">With an output of 164 horsepower and 250 Nm of torque, this model is ideal for off-road enthusiasts. The suspension system is stable yet soft enough to handle rough terrains comfortably, ensuring a smooth ride even on bumpy roads.</p>', 'blogs/1747090850_Llc5yykY8z.jpg', 'new-toyota-land-cruiser-prado-j250', 'published', 1, '2025-05-12 18:00:50', '2025-05-12 18:00:50'),
(6, 'Suzuki GS 150 vs. Honda CG 125:', '<div class=\"blog-meta\" style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><span class=\"fa fa-calendar\" style=\"font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-family: FontAwesome; font-size: inherit;\"><br></span></div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><img src=\"https://www.mywheels.pk/uploads/images/ct125-hunter-cub.jpg\" class=\"img-thumbnail\" alt=\"\" style=\"border-color: rgb(221, 221, 221); padding: 4px; border-radius: 4px; display: inline-block; line-height: 1.42857; transition: 0.2s ease-in-out;\"></p><h1 style=\"margin: 20px 0px 10px; font-weight: 500; line-height: 1.1; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 24px !important;\">Suzuki GS 150 vs. Honda CG 125: Which Is Best For Use?</h1><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The Suzuki GS 150 and the Honda CG125 are two of the top motorcycles from the top two manufacturers. Both are good choices in the targeted category and have a cult following.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">But which one is better in the end for the typical person looking to purchase a motorcycle for usage in the city and at work with a budget of 230k PKR?</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">For less than $230,000, you can get a brand-new CG125, but for a GS150, you can purchase a used 2018–19 GS150SE with alloy wheels and disc brakes.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Based on our use of both bikes, the following is our opinion:</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\">Comfortable Riding</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">GS150 is the winner here, of course. CG and coziness? There is no comparison, much like when comparing oranges and mangoes. GS boasts an extremely plush, comfy seat as well as a balancer shaft engine. The GS offers good overall riding comfort. Though they are not particularly perceptible, there are vibrations in GS. You may experience slight seat vibrations only if you exceed 90 km/h, which is quite uncommon on city journeys.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Similar to a generator, CG vibrates. It\'s not only vibrations; the seat is really firm. Remember how barbers used to cut children\'s hair on wooden boards? It feels precisely the same to sit on CG. It\'s not at all pleasurable. Your midsection will continue to vibrate for three to five minutes after you stop riding the motorcycle after more than thirty minutes. That is how unpleasant it is.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">But it\'s a reality that many that purchase CG don\'t give a damn about how well it rides!</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">If you ride 20–30 km a day, for example, GS150 is an excellent option for city riding, but CG will also function well. However, you ought to choose GS for this if you work in a city and live in a society.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\">Average Fuel</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Fuel efficiency is the primary issue while traveling through cities. With its 150cc engine, the GS achieves 34–37 km/l in urban areas. Because of its small 125cc engine and light body, the CG achieves 39–44 km/l in the city. CG takes the lead in this instance.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">We have firsthand knowledge of CG\'s excellent economy. For usage in the office, our team has CD70, GS150, and CG125. The gasoline expenses for CD and CG are nearly same. 52 Kmpl is achieved by CD, and 42 Kmpl by CG. If CD provides a fuel bill of Rs. 5,000 at the end of the month, CG provides a fuel bill of Rs. 5,400.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">However, GS is somewhat pricey; its monthly fuel expense is Rs. 6,790, the same as that of the CD and CG.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\">Maintenance Cost</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">For every 1,000 kilometers, both motorcycles need to be well-tuned. This is a breakdown of their tuning costs:</p><ul style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><li>Cost of GS150 engine oil: 1,479 rupees</li><li>The price of CG125 engine oil (Havoline 20w-50) is Rs. 910.</li><li>GS150 labor costs for tuning: Rs. 550</li><li>The labor cost of CG125 tuning is Rs. 450.</li><li>The total cost of GS150 tuning was Rs. 2,030.</li><li>The total cost of the CG125 tune is Rs. 1,360.</li><li>CG tuning is significantly less expensive.</li></ul><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\">Spares Cost</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Regular city riding frequently results in minor collisions involving motorcycles, TukTuks, and Chingchis. The indicators are most likely the first component to break, followed by the headlights and taillights.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Let\'s calculate the potential cost to you (original parts from the 3S dealership) if anything similar happens:</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\">CG125:</h2><ul style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><li>450 rupees as an indicator</li><li>Headlight: INR 1,400</li><li>Tailight: GS150 / Rs. 700</li><li>950 rupees as an indicator</li><li>Headlight: 2,500 rupees</li><li>Tailight: One thousand rupees</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">CG is the winner when it comes to component cost.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; font-weight: 500; line-height: 1.1; font-size: 30px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);\">Select and Strengthen</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Even with a larger engine, GS is still unable to accelerate faster than CG. The CG is an incredible acceleration beast because of its OHV engine and low body weight but at the expense of discomfort and vibrations akin to a generator.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Ultimately, though, the GS outperforms the CG in terms of power, possessing more torque and horsepower. When it comes to drag racing, the GS\'s higher horsepower and torque numbers will cause it to pass the CG easily once you reach 80 km/h. Additionally, the top speed of the GS is higher than the CG\'s.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Fast acceleration is more crucial for city cycling than peak power or speed. Envision arriving at work late and spotting a clean section of the road. You start to speed, but then you see a Chingchi in front of you, so you apply the brakes. Strong acceleration is more important in situations like these than maximal speed.</p>', 'blogs/1747090898_lm824T3pz9.jpg', 'suzuki-gs-150-vs.-honda-cg-125:', 'published', 1, '2025-05-12 18:01:38', '2025-05-12 18:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `name`, `email`, `comment`, `created_at`, `updated_at`) VALUES
(1, 6, 'PyroBytes', 'info@pyrobytes.com', 'test', '2025-05-12 18:37:38', '2025-05-12 18:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `items` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Handgunss', '2025-04-30 15:32:56', '2025-05-07 14:15:48'),
(6, 'Machine guns', '2025-05-01 12:58:11', '2025-05-06 18:33:50'),
(7, 'Gun Bullet', '2025-05-06 18:34:01', '2025-05-06 18:34:01'),
(8, 'Silencers', '2025-05-06 18:34:07', '2025-05-06 18:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact_queries`
--

CREATE TABLE `contact_queries` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_queries`
--

INSERT INTO `contact_queries` (`id`, `full_name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Stephen Good', 'kunamikipu@mailinator.com', 'Dicta lorem qui dele', 'Id libero sit incid', '2025-05-13 17:07:51', '2025-05-13 17:07:51'),
(2, 'Stephen Good', 'kunamikipu@mailinator.com', 'Dicta lorem qui dele', 'Id libero sit incid', '2025-05-13 17:08:07', '2025-05-13 17:08:07'),
(4, 'Selma Huber', 'joxeceqog@mailinator.com', 'Eum recusandae Sed', 'Soluta qui consequat', '2025-05-15 17:17:29', '2025-05-15 17:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_1` text COLLATE utf8mb4_unicode_ci,
  `item_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_2` text COLLATE utf8mb4_unicode_ci,
  `item_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_3` text COLLATE utf8mb4_unicode_ci,
  `item_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_4` text COLLATE utf8mb4_unicode_ci,
  `item_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_5` text COLLATE utf8mb4_unicode_ci,
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `video_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_1` int DEFAULT NULL,
  `count_2` int DEFAULT NULL,
  `count_3` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `description`, `page_name`, `sub_name`, `item_1`, `description_1`, `item_2`, `description_2`, `item_3`, `description_3`, `item_4`, `description_4`, `item_5`, `description_5`, `images`, `video`, `video_text`, `count_1`, `count_2`, `count_3`, `created_at`, `updated_at`) VALUES
(1, 'About', NULL, 'Home', NULL, 'Who We Are', 'With state-of-the-art indoor training facilities and full service custom shop on lion, we can accommodate most requests. All modern weapon enthussts can appreciate our broad services and real-world, experienced staff. With state-of-the-art indoor training facilities and full service.', NULL, '“This kiosk will revolutionize the purchasing process of silencers, SBRs, ine ns and in the class 3 realm.we can accommodate most rests.”', NULL, 'All modern weaponts can appreciate our broad services and real-world, exper ienced taff.T fm nunc. Etiam pharetra, eratd fermentum feugiat, velit mauris aks egestasut aliquam akshay handge.', NULL, NULL, NULL, NULL, NULL, 'https://youtu.be/Eb9g9NB-Rnw', 'New MC7 Carbine Gun', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `title`, `description`, `image`, `status`, `redirect_url`, `created_at`, `updated_at`) VALUES
(4, 'Ipsum distinctio No', '<h1><span style=\"color: rgb(236, 236, 236); font-family: Poppins, sans-serif; font-size: 18px; font-weight: 400;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span></h1>', '1746552323_681a4603e28aa.jpg', '1', 'https://strongarms.websitevisionaries.com/', '2025-05-06 11:38:03', '2025-05-06 12:30:57'),
(7, 'Who We Are', '<span style=\"font-family: Poppins, sans-serif; font-size: 16px;\"><font color=\"#efefef\">With state-of-the-art indoor training facilities and full service custom shop on lion, we can accommodate most requests. All modern weapon enthussts can appreciate our broad services and real-world, experienced staff. With state-of-the-art indoor training facilities and full service.</font></span>', '1746552331_681a460b4114a.jpg', '1', 'http://127.0.0.1:8000/', '2025-05-06 12:11:56', '2025-05-06 12:46:47'),
(8, 'Magna unde sunt aliq', 'With state-of-the-art indoor training facilities and full service custom shop on lion, we can accommodate most requests. All modern weapon enthussts can appreciate our broad services and real-world, experienced staff. With state-of-the-art indoor training facilities and full service.', '1746557275.jpg', '1', 'Illo omnis suscipit', '2025-05-06 13:47:55', '2025-05-06 13:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_18_172500_create_permission_tables', 2),
(5, '2025_04_30_180743_create_categories_table', 3),
(6, '2025_04_30_212008_create_products_table', 4),
(7, '2025_05_01_164152_create_product_images_table', 5),
(8, '2025_05_01_190412_create_services_table', 6),
(9, '2025_05_05_171811_create_password_resets_table', 7),
(10, '2025_05_05_213910_create_contents_table', 8),
(11, '2025_05_05_215140_create_home_banners_table', 9),
(12, '2025_05_06_220753_create_blogs_table', 10),
(13, '2025_05_08_233945_create_providers_table', 10),
(14, '2025_05_08_234816_create_provider_details_table', 11),
(15, '2025_05_09_222830_create_blogs_table', 12),
(16, '2025_05_12_231840_create_blog_comments_table', 13),
(17, '2025_05_13_214120_create_contact_queries_table', 14),
(18, '2025_05_13_230533_create_carts_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 28),
(2, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 31),
(3, 'App\\Models\\User', 39);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ahsan.ahmed9977@gmail.com', 'hSmVxsZUKZ37Rj5eEDawbbSBMjnqaPyCD9NwRW8uXv03skxBnMM2aD9e30hA5FiZ', '2025-05-16 13:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-create', 'web', '2025-05-02 15:05:22', '2025-05-02 15:05:22'),
(2, 'user-edit', 'web', '2025-05-02 15:07:28', '2025-05-02 15:07:28'),
(3, 'user-delete', 'web', '2025-05-02 15:07:42', '2025-05-02 15:07:42'),
(4, 'permission-create', 'web', '2025-05-02 15:08:10', '2025-05-02 15:08:10'),
(5, 'permission-edit', 'web', '2025-05-02 15:08:21', '2025-05-02 15:08:21'),
(6, 'permission-delete', 'web', '2025-05-02 15:08:42', '2025-05-02 15:08:42'),
(7, 'categories-create', 'web', '2025-05-02 15:08:57', '2025-05-02 15:08:57'),
(8, 'categories-edit', 'web', '2025-05-02 15:09:19', '2025-05-02 15:09:19'),
(9, 'categories-delete', 'web', '2025-05-02 15:09:26', '2025-05-02 15:09:26'),
(10, 'product-create', 'web', '2025-05-02 15:09:49', '2025-05-02 15:09:49'),
(11, 'product-edit', 'web', '2025-05-02 15:10:03', '2025-05-02 15:10:03'),
(12, 'product-delete', 'web', '2025-05-02 15:10:14', '2025-05-02 15:10:14'),
(13, 'services-create', 'web', '2025-05-02 15:10:28', '2025-05-02 15:10:28'),
(14, 'services-edit', 'web', '2025-05-02 15:10:48', '2025-05-02 15:10:48'),
(15, 'services-delete', 'web', '2025-05-02 15:11:02', '2025-05-02 15:11:02'),
(16, 'role-create', 'web', '2025-05-02 15:53:59', '2025-05-02 15:53:59'),
(17, 'role-edit', 'web', '2025-05-02 15:54:15', '2025-05-02 15:54:15'),
(18, 'role-delete', 'web', '2025-05-02 15:54:30', '2025-05-02 15:54:30'),
(19, 'user-view', 'web', '2025-05-28 19:06:11', '2025-05-01 19:06:15'),
(20, 'permission-view', 'web', '2025-05-02 18:10:47', '2025-05-02 18:10:47'),
(21, 'categories-view', 'web', '2025-05-02 18:11:05', '2025-05-02 18:11:05'),
(22, 'product-view', 'web', '2025-05-02 18:11:18', '2025-05-02 18:11:18'),
(23, 'services-view', 'web', '2025-05-02 18:11:30', '2025-05-02 18:11:30'),
(24, 'role-view', 'web', '2025-05-02 18:11:42', '2025-05-02 18:11:42'),
(25, 'product-show', 'web', '2025-05-05 13:48:40', '2025-05-05 13:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quantity` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cut_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `off` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` int NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `quantity`, `status`, `slug`, `cut_price`, `off`, `specification`, `added_by`, `category_id`, `created_at`, `updated_at`) VALUES
(12, 'Flavia Morin', 'dasdsa', 759, 'products/1746558363_1.jpg', 778, 'active', 'flavia-morin', '65', 'Vel non aspernatur s', 'sadsadsaddasd', 1, 6, '2025-05-06 14:06:03', '2025-05-06 14:06:03'),
(13, 'Buckminster Ayers', 'xdassad', 387, 'products/1746558379_2.jpg', 238, 'active', 'buckminster-ayers', '762', 'Quisquam aut harum d', 'dasd', 1, 1, '2025-05-06 14:06:19', '2025-05-07 15:39:55'),
(14, 'Basia Gilbert', 'dsadsad', 336, 'products/1746558395_3.jpg', 250, 'active', 'basia-gilbert', '766', 'Provident ullam bea', 'dasd', 1, 1, '2025-05-06 14:06:35', '2025-05-06 14:06:35'),
(15, 'Amela Vang', 'sadsadsad', 978, 'products/1746558416_5.jpg', 426, 'active', 'amela-vang', '141', 'Aut vel aut sunt ex', 'Suscipit nostrud lib.', 1, 6, '2025-05-06 14:06:56', '2025-05-07 15:39:59'),
(16, 'Serina Phelps', 'asdasd', 290, 'products/1746558439_sm3.jpg', 930, 'active', 'serina-phelps', '357', 'Veniam omnis atque', 'asdsad', 1, 1, '2025-05-06 14:07:19', '2025-05-06 14:07:19'),
(17, 'Raymond Grimes', 'dasasdssd', 726, 'products/1746652681_7.jpg', 455, 'inactive', 'raymond-grimes', '730', 'Id commodi est quia', 'sadsadsadsadsaddsa', 1, 7, '2025-05-07 16:18:01', '2025-05-07 16:18:01'),
(18, 'Macon Chambers', 'sadsadsad', 230, 'products/1746652711_4.jpg', 304, 'inactive', 'macon-chambers', '207', 'Eaque aliquid non id', 'sadsad dsad sdsa dsdsa dsa', 1, 8, '2025-05-07 16:18:31', '2025-05-07 16:18:31'),
(19, 'Quyn Kelley', 'dsadsadssad', 587, 'products/1746654006_3.jpg', 999, 'inactive', 'quyn-kelley', '787', 'Cupiditate anim temp', 'sadsadsadaddsad', 1, 8, '2025-05-07 16:40:06', '2025-05-07 16:40:06'),
(20, 'Risa Branch', 'sdsad', 363, 'products/1746654020_6.jpg', 835, 'active', 'risa-branch', '689', 'Aut nemo voluptatem', 'dsadsadsadasdasdsa', 1, 1, '2025-05-07 16:40:20', '2025-05-07 16:40:20'),
(21, 'Tiger Schroeder', 'sDasd', 493, 'products/1746659527_8.jpg', 413, 'active', 'tiger-schroeder', '870', 'Non vel corporis cum', 'sadsadsadsa', 1, 6, '2025-05-07 18:12:07', '2025-05-07 18:12:07'),
(22, 'Sopoline Graham', 'dsadsadsadd', 182, 'products/1746659546_5.jpg', 892, 'inactive', 'sopoline-graham', '360', 'Consequatur irure an', 'dsadsadsadsaa', 1, 1, '2025-05-07 18:12:26', '2025-05-07 18:12:26'),
(23, 'Tyrone Petersen', 'sadsadd', 20, 'products/1746659564_1.jpg', 950, 'active', 'tyrone-petersen', '2', 'Reprehenderit sequi', 'sadsadsadsadsadsa', 1, 6, '2025-05-07 18:12:44', '2025-05-07 18:12:44'),
(24, 'Signe Workman', 'dsadsadsadasd', 184, 'products/1746659579_sm1.jpg', 634, 'active', 'signe-workman', '222', 'In qui commodo nulla', 'dsadsadsadsdsasads', 1, 6, '2025-05-07 18:12:59', '2025-05-07 18:12:59'),
(25, 'Matthew Morgan', 'Etsadsaddd', 56, 'products/1746659608_sm1.jpg', 628, 'active', 'matthew-morgan', '113', 'Iste dolor atque ut', 'sadsasam, esd', 1, 7, '2025-05-07 18:13:28', '2025-05-07 18:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(39, 12, 'products/1746558363_1.jpg', '2025-05-06 14:06:03', '2025-05-06 14:06:03'),
(40, 12, 'products/1746558363_2.jpg', '2025-05-06 14:06:03', '2025-05-06 14:06:03'),
(41, 13, 'products/1746558379_2.jpg', '2025-05-06 14:06:19', '2025-05-06 14:06:19'),
(42, 14, 'products/1746558395_3.jpg', '2025-05-06 14:06:35', '2025-05-06 14:06:35'),
(43, 15, 'products/1746558416_5.jpg', '2025-05-06 14:06:56', '2025-05-06 14:06:56'),
(44, 15, 'products/1746558416_7.jpg', '2025-05-06 14:06:56', '2025-05-06 14:06:56'),
(45, 15, 'products/1746558416_8.jpg', '2025-05-06 14:06:56', '2025-05-06 14:06:56'),
(46, 16, 'products/1746558439_sm3.jpg', '2025-05-06 14:07:19', '2025-05-06 14:07:19'),
(47, 17, 'products/1746652681_7.jpg', '2025-05-07 16:18:01', '2025-05-07 16:18:01'),
(48, 17, 'products/1746652681_sm1.jpg', '2025-05-07 16:18:01', '2025-05-07 16:18:01'),
(49, 17, 'products/1746652681_sm3.jpg', '2025-05-07 16:18:01', '2025-05-07 16:18:01'),
(50, 18, 'products/1746652711_4.jpg', '2025-05-07 16:18:31', '2025-05-07 16:18:31'),
(51, 18, 'products/1746652711_5.jpg', '2025-05-07 16:18:31', '2025-05-07 16:18:31'),
(52, 18, 'products/1746652711_sm3.jpg', '2025-05-07 16:18:31', '2025-05-07 16:18:31'),
(53, 19, 'products/1746654006_3.jpg', '2025-05-07 16:40:06', '2025-05-07 16:40:06'),
(54, 20, 'products/1746654020_6.jpg', '2025-05-07 16:40:20', '2025-05-07 16:40:20'),
(55, 21, 'products/1746659527_8.jpg', '2025-05-07 18:12:07', '2025-05-07 18:12:07'),
(56, 21, 'products/1746659527_9.jpg', '2025-05-07 18:12:07', '2025-05-07 18:12:07'),
(57, 22, 'products/1746659546_5.jpg', '2025-05-07 18:12:26', '2025-05-07 18:12:26'),
(58, 22, 'products/1746659546_sm4.jpg', '2025-05-07 18:12:26', '2025-05-07 18:12:26'),
(59, 23, 'products/1746659564_1.jpg', '2025-05-07 18:12:44', '2025-05-07 18:12:44'),
(60, 23, 'products/1746659564_2.jpg', '2025-05-07 18:12:44', '2025-05-07 18:12:44'),
(61, 24, 'products/1746659579_sm1.jpg', '2025-05-07 18:12:59', '2025-05-07 18:12:59'),
(62, 25, 'products/1746659608_sm1.jpg', '2025-05-07 18:13:28', '2025-05-07 18:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `provider_details`
--

CREATE TABLE `provider_details` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `established_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in_active',
  `store_description` text COLLATE utf8mb4_unicode_ci,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provider_details`
--

INSERT INTO `provider_details` (`id`, `user_id`, `logo`, `store_name`, `lat`, `long`, `store_location`, `established_year`, `owner_name`, `email`, `password`, `phone_number`, `zip_code`, `country`, `state`, `city`, `status`, `store_description`, `website`, `created_at`, `updated_at`) VALUES
(3, 37, 'users/1746826330_681e745a02549.png', 'Brennan Frye', '39.4682954', '-119.3871768', 'USA Parkway, Sparks, NV, USA', 'Perspiciatis eius c', 'Brendan Mathis', 'tuvyxuceko@mailinator.com', '$2y$12$bhLaGeomIMKz1DzxOAKHJed0xMaQjYPVOkQK4SxUOkHgIshVS9xZ2', '+1 (645) 587-3939', '39314', 'Eos voluptatem rei', 'California', 'New York City', 'in_active', 'Quaerat nisi et sit', NULL, '2025-05-09 16:24:32', '2025-05-09 16:24:32'),
(4, 38, 'users/1746826330_681e745a02549.png', 'Lillith Gaines', NULL, NULL, 'Iste mollit occaecat', 'Id sint quod ratione', 'Upton Flowers', 'rasyfufowo@mailinator.com', '$2y$12$ZSxkgs7HRfd35W8QkRxQ4eI905lwjZkQHR7SieDTi.4ZSCINRjWfW', '+1 (938) 601-2145', '29007', 'Sit tenetur irure l', 'California', 'New York City', 'in_active', 'Non aliqua Ex nulla', NULL, '2025-05-09 16:32:10', '2025-05-09 16:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-05-30 20:21:20', '2025-05-30 20:21:25'),
(2, 'provider', 'web', '2025-05-30 20:21:27', '2025-05-30 20:21:30'),
(3, 'customer', 'web', '2025-05-30 20:21:32', '2025-05-30 20:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(21, 2),
(22, 2),
(25, 2),
(4, 3),
(5, 3),
(6, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image`, `price`, `type`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(2, 'Emmanuel Rogers', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit e...', 'services/1746735932_5.jpg', '908', 'Et laborum Omnis qu', 'active', 1, '2025-05-02 13:28:20', '2025-05-08 15:25:32'),
(5, 'Emery Sherman', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit e...', 'services/1746734736_7.jpg', '960', 'Doloribus magnam cup', 'inactive', 1, '2025-05-08 15:05:36', '2025-05-08 15:15:44'),
(6, 'Ciaran Foley', 'Nihil dolorum et adi', 'services/1746734748_2.jpg', '825', 'Aut voluptas explica', 'active', 1, '2025-05-08 15:05:48', '2025-05-08 15:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('M31jEzaq0GciNnDZsX1PN94x5ACfEBMiHjITayP4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUnpla0pWaFdQZVlseENrOGNxcW5raW53dDE1MEpsWHJPYThEam5SZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0LXZpZXc/cT1hc2FkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjA6e319', 1748044281),
('oObuznC6gsbsxs5n1PtHHiAox9axGd4BFebq0jXU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidVJkdHRTMnNNTnV0Z3NMNjdDQkdaeFVaanlJWVhVdnlYcnJMZDIyMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjE6e2k6MDtzOjc6InN1Y2Nlc3MiO31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo3OiJzdWNjZXNzIjtzOjQ2OiJXZWxjb21lIGJhY2shIFlvdSBoYXZlIHN1Y2Nlc3NmdWxseSBsb2dnZWQgaW4uIjt9', 1748043868);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','in_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `website`, `company_name`, `address_line`, `email_verified_at`, `password`, `country`, `state`, `city`, `zip`, `gender`, `specialty`, `experience`, `certificate`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ahsan.ahmed9977@gmail.com', '35165431', 'http://127.0.0.1:8000/profile', 'DX', 'Consequatur dolore', NULL, '$2y$12$aEBe69.mNUc/qVRgmfUXQOyEb.LFgFqCaPFp0av7PZAI4sAwx4lFa', 'pakistan', 'sindh', 'karachi', '23654654', 'male', NULL, NULL, NULL, 'users/1746207646_download.jpg', 'active', NULL, '2025-04-29 20:19:00', '2025-05-07 13:50:53'),
(28, 'Jonah Jenkinssss', 'jaqutusbo@mailinator.com', '+1 (682) 624-1538', 'https://www.nefusysojy.mobi', 'Sanford Weber Trading', 'Aut commodo beatae a', NULL, '$2y$12$E1jg99aXPo//mxSSPkbFreRyeWHI5UmOsXyC4No2mD1mIWSoKtVvG', 'Adipisicing aut esse', 'Accusamus eu et natu', 'Veniam dolorem quod', '41716', 'other', NULL, NULL, NULL, 'users/1746221636_dJuTYLZYsd.jpg', 'active', NULL, '2025-05-01 18:24:18', '2025-05-02 16:33:56'),
(29, 'Sydney Bruce', 'damozotuve@mailinator.com', '+1 (961) 566-9992', 'https://www.luhehot.cm', 'Boyer and Wiggins Trading', 'Delectus porro quod', NULL, '$2y$12$Mfx2.YiCEcMX5RB1bSvFBe/TNa1w0cXrfKaCwk.hzQJkL5ah5FOGq', 'Quod molestiae cupid', 'Recusandae In labor', 'Consectetur repellen', '77098', 'other', NULL, NULL, NULL, 'users/1746224557_gCdXBNT1kW.jpg', 'active', NULL, '2025-05-02 17:22:38', '2025-05-02 17:22:38'),
(30, 'faizan@gmail.com', 'faizan@gmail.com', '031228798454', 'http://127.0.0.1:8000/register', 'dx', NULL, NULL, '$2y$12$SD8LsCaMAzevvaBIBjX/SuEPASzcIpEfY1PGpUhVUaa9wnH7mf/kK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2025-05-08 17:45:22', '2025-05-08 17:45:22'),
(31, 'moeez', 'moeez@gmail.com', '0132165656', 'http://127.0.0.1:8000/register', 'dx', NULL, NULL, '$2y$12$08XwUFYTRCwMzePCw4EhseSGyBEI9ikm820.tP2974Rs2o/SXNPNa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2025-05-08 17:58:34', '2025-05-08 17:58:34'),
(37, 'Brendan Mathis', 'tuvyxuceko@mailinator.com', '+1 (645) 587-3939', NULL, NULL, NULL, NULL, '$2y$12$M9NW5HAM4IO4cX1fSj.EUO.4gBTxPAg5KD1qZ.C92GbFkEre9ApeC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'users/1746824987_22de9a9b-9d7d-4d74-be56-09b4cb70236d.png', 'in_active', NULL, '2025-05-09 16:24:32', '2025-05-09 16:24:32'),
(38, 'Upton Flowers', 'rasyfufowo@mailinator.com', '+1 (938) 601-2145', NULL, NULL, NULL, NULL, '$2y$12$q5jqYfLqmkr2QBAua3ttEOuECrKhqrXZQRbgl9ZbkvCeGBW9j3Fh.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'users/1746826330_681e745a02549.png', 'in_active', NULL, '2025-05-09 16:32:10', '2025-05-09 16:32:10'),
(39, 'Jonah Fletcher', 'siviqel@mailinator.com', '+1 (947) 146-4924', 'https://www.cevetufuwoqap.info', 'Huffman and Parrish Trading', NULL, NULL, '$2y$12$ymeEvvKa4kVMgL4b6bsSpedkJeaXfIJXg6yMhyz/BEiqZu2RtW7R6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2025-05-09 16:49:28', '2025-05-09 16:49:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_queries`
--
ALTER TABLE `contact_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `provider_details`
--
ALTER TABLE `provider_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provider_details_email_unique` (`email`),
  ADD KEY `provider_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_queries`
--
ALTER TABLE `contact_queries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `provider_details`
--
ALTER TABLE `provider_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `provider_details`
--
ALTER TABLE `provider_details`
  ADD CONSTRAINT `provider_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
