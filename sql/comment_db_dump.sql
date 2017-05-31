/*
SQLyog Enterprise - MySQL GUI v8.02 RC
MySQL - 5.5.27 : Database - comments_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comments` (`post_id`),
  CONSTRAINT `FK_comments` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

insert  into `comments`(`id`,`post_id`,`user_id`,`description`,`created`) values (28,32,1,'global problems ','2014-11-09 20:42:31'),(29,32,1,'global problems second','2014-11-09 20:42:43'),(30,34,1,'Thanks for the informative post. Now I feel somewhat confident in starting my own','2014-11-09 20:44:52'),(31,34,1,'thanks for the great advice! this is what i came up with http://petersum.com/2012/06/28/the-first-post/','2014-11-09 20:45:03'),(32,34,1,'Thanks so much. I looked at a couple different pages and your was so helpful. Simple and to the point. I was proud of my first post. Thanks again!','2014-11-09 20:45:54'),(33,34,1,'thanks for the great advice! this is what i came up with http://petersum.com/2012/06/28/the-first-post/','2014-11-09 20:56:12'),(34,34,1,'thanks for the great advice! this is what i came up with http://petersum.com/2012/06/28/the-first-post/','2014-11-09 20:57:34'),(35,34,1,'asdfasdfasdf\n\nasdf\n','2014-11-09 20:59:28'),(36,34,1,'asdfasdfasdf','2014-11-09 20:59:44'),(37,34,1,'asdflajsd fasdf asdf','2014-11-09 21:00:32'),(38,35,1,'@AlmaDoMundo How does it not provide answer to the question? You mean what if link is https or ftp, or something 3rd? â€“  Dexa','2014-11-09 21:08:07'),(39,35,1,'http://petersum.com/2012/06/28/the-first-post','2014-11-09 21:08:48'),(40,36,1,'      sdfasdfaf','2014-11-09 21:12:10');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `title` varchar(250) NOT NULL,
  `body` text,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `posts` */

insert  into `posts`(`id`,`user_id`,`email`,`title`,`body`,`active`,`created`,`modified`) values (32,1,'wasee@gmail.com','Global Government Requests Report','Today, we&rsquo;re releasing our third Government Requests Report, which provides information about the number of government data and content removal requests we received for the first half of 2014, as well as updated information about national security requests we received under the Foreign Intelligence Surveillance Act and through National Security Letters.\\r\\n\\r\\nSince our first report, we&rsquo;ve seen an increase in government requests for data and for content restrictions. In the first six months of 2014, governments around the world made 34,946 requests for data &mdash; an increase of about 24% since the last half of 2013. During the same time, the amount of content restricted because of local laws increased about 19%.',1,'2014-11-09 20:33:41','2014-11-09 20:33:41'),(33,1,'test@testing.com','Alpine herbivore shrinking','A long term record of alpine chamois weights from the Alps shows that body mass has been declining since 1979.\\r\\n\\r\\nUsing mass of over 10,000 carcasses from hunters, the authors show that the weights of juvenile chamois have been declining over the past few decades. Although some of the decline is due to increasing population density (stricter hunting laws), it appears that high temperatures also have been directly causing declines in mass.\\r\\n\\r\\nThe authors propose greater thermoregulatory demands as contributing to the declines, but the authors were unable to determine whether forage quality had declined.\\r\\n',1,'2014-11-09 20:43:25','2014-11-09 20:43:25'),(34,1,'pak@g.com','How to Write Your First Blog Post','From the reader&rsquo;s point of view, I would want to see four areas covered in your first blog post:\\r\\n\\r\\n\\r\\n1 &ndash; Who you are. Tell me about your business, but also introduce me to the blog&rsquo;s writers.  Share pictures.  The more information about yourself and your business that you are willing to share, the easier it will be for me as a reader to trust you.  This is very overlooked by many businesses but we want to see pictures of the people that work for your business and more importantly, those that will be writing for the blog.  It helps us identify and connect with them!\\r\\n\\r\\n2 &ndash; Why you are blogging. Possibly the most important question you can answer, because it will force you to spell out your intentions to your audience.  And as always, consider your audience when answering this question, ask yourself, &lsquo;Why would someone come to this blog, what would they be looking for?&rsquo;  Hint: They won&rsquo;t be coming to your blog so that you can market to them.  Maybe you want to share your thoughts on your industry with your readers, or maybe you want to teach them how to do a certain set of skills that tie into your business.  Another way to think about this is to ask yourself &lsquo;What&rsquo;s in it for the reader?&rsquo;',1,'2014-11-09 20:44:29','2014-11-09 20:44:29'),(35,1,'gov@nbp.pk','Testing','Indeed, over the past year, we&rsquo;ve challenged bulk search warrants issued by a court in New York that demanded we turn over nearly all data from the accounts of nearly 400 people. This unprecedented request was by far the largest we&rsquo;ve ever received. We&rsquo;ve argued that these overly broad warrants violate the privacy rights of the people on Facebook and ignore constitutional safeguards against unreasonable searches and seizures. Despite a setback in the lower court, we&rsquo;re aggressively pursuing an appeal to a higher court to invalidate these sweeping warrants and to force the government to return the data it has seized. We&rsquo;re grateful for the support of others in industry and civil society who&rsquo;ve filed friend-of-the-court briefs in support of our fight. We expect the case to be decided by a New York appellate court later this year, and we look forward to updating you on the results of this important case.',1,'2014-11-09 21:02:36','2014-11-09 21:02:36'),(36,1,'test@gmail.com','Testing 2','Hi, I am 21 days old in this and what my aim is to start earning online and for that I need some ideas from you if can really help me in this I have posted more then 30 articles some were written by me only some I took it from ezine and then changed it almost 90 percent of it. So just waiting to get some comments from you\\r\\n\\r\\nHERE IS WHAT I CAME UP WITH http://anallazari.blogspot.se/2013/06/a-little-something-about-me.html THANK YOUU!',1,'2014-11-09 21:09:26','2014-11-09 21:09:26');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
