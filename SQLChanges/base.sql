
-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

CREATE TABLE IF NOT EXISTS `adverts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `active_from_date` date NOT NULL,
  `active_to_date` date NOT NULL,
  `position_id` int(11) NOT NULL,
  `languages` varchar(255) NOT NULL,
  `ad_type_id` tinyint(4) NOT NULL,
  `ad_link` varchar(250) NOT NULL,
  `target` varchar(20) NOT NULL,
  `ad_file` varchar(255) NOT NULL,
  `ad_text` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `position` (`position_id`,`active_from_date`,`active_to_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE IF NOT EXISTS `cats` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL,
  `ord` float NOT NULL,
  `tags` varchar(255) character set ascii collate ascii_bin NOT NULL,
  `url` char(255) default NULL,
  `name` varchar(255) NOT NULL,
  `skin_id` char(255) character set ascii collate ascii_bin NOT NULL,
  `template_id` char(255) character set ascii collate ascii_bin NOT NULL,
  `params` text NOT NULL,
  `head_html` text NOT NULL,
  `pre_body_html` text NOT NULL,
  `pos_body_html` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cats_lng`
--

CREATE TABLE IF NOT EXISTS `cats_lng` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mid` int(10) unsigned NOT NULL,
  `lng` char(2) character set ascii collate ascii_bin NOT NULL,
  `is_active` tinyint(3) unsigned NOT NULL,
  `url` char(255) default NULL,
  `menu_title` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `head_html` text NOT NULL,
  `pre_body_html` text NOT NULL,
  `pos_body_html` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `master_id` (`mid`,`lng`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `md5` char(32) character set ascii collate ascii_bin NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `meta_data` text NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` char(255) character set ascii collate ascii_bin NOT NULL,
  `ref_tbl` char(64) character set ascii collate ascii_bin NOT NULL,
  `ref_fld` char(64) character set ascii collate ascii_bin NOT NULL,
  `ref_id` int(10) unsigned NOT NULL,
  `uploaded_date` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `md5` (`md5`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cid` int(10) unsigned NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `leading_image` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `files` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_lng`
--

CREATE TABLE IF NOT EXISTS `news_lng` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mid` int(10) unsigned NOT NULL,
  `lng` char(2) character set ascii collate ascii_bin NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `body` longtext NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `mid` (`mid`,`lng`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nomenclature_key`
--

CREATE TABLE IF NOT EXISTS `nomenclature_key` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nomenclature_key_lng`
--

CREATE TABLE IF NOT EXISTS `nomenclature_key_lng` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mid` int(10) unsigned NOT NULL,
  `lng` char(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `mid` (`mid`,`lng`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nomenclature_val`
--

CREATE TABLE IF NOT EXISTS `nomenclature_val` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mid` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nomenclature_val_lng`
--

CREATE TABLE IF NOT EXISTS `nomenclature_val_lng` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mid` int(10) unsigned NOT NULL,
  `lng` char(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `mid_lng` (`mid`,`lng`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cid` int(10) unsigned NOT NULL,
  `images` text NOT NULL,
  `files` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages_lng`
--

CREATE TABLE IF NOT EXISTS `pages_lng` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mid` int(10) unsigned NOT NULL,
  `lng` char(2) character set ascii collate ascii_bin NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `mid` (`mid`,`lng`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `active_from_date` date NOT NULL default '0000-00-00',
  `active_to_date` date NOT NULL default '0000-00-00',
  `position_id` smallint(5) unsigned NOT NULL default '0',
  `is_visible` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `position` (`position_id`,`is_visible`,`active_from_date`,`active_to_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `polls_options`
--

CREATE TABLE IF NOT EXISTS `polls_options` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mid` int(10) unsigned NOT NULL default '0',
  `option_text` varchar(100) NOT NULL default '',
  `num_votes` int(10) unsigned NOT NULL default '0',
  `ord` float NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `pool_id` (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `record_locking`
--

CREATE TABLE IF NOT EXISTS `record_locking` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `table` char(64) character set ascii collate ascii_bin NOT NULL,
  `row_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `table` (`table`,`row_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `module_code` char(100) character set ascii collate ascii_bin NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `translation_key` char(255) character set utf8 collate utf8_bin NOT NULL,
  `is_html` tinyint(3) unsigned NOT NULL,
  `description` text NOT NULL,
  `ord` float NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `module_cid_translation` (`module_code`,`cid`,`translation_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `translations_lng`
--

CREATE TABLE IF NOT EXISTS `translations_lng` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mid` int(10) unsigned NOT NULL,
  `lng` char(2) character set ascii collate ascii_bin NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `mid_lng` (`mid`,`lng`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `is_active` tinyint(3) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `is_active`, `group_id`) VALUES
(1, 'system', '', 0, 1),
(2, 'pol', '$2a$10$i4Zoq9dS42vAjXJtNtHn5eQ2U74SuLTD9U6p5mc.ZB1JgnRgXQt1y', 1, 1);


-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` char(255) NOT NULL,
  `resources` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `name`, `resources`) VALUES
(1, 'Admin', '');
