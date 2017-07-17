--
-- Table structure for table `civicrm_membership_period`
--

CREATE TABLE IF NOT EXISTS `civicrm_membership_period` (
  `id` int(10) NOT NULL COMMENT 'Membership period Id',
  `contact_id` int(10) NOT NULL COMMENT 'FK to Contact ID',
  `membership_id` int(10) NOT NULL COMMENT 'FK to Membership ID',
  `start_date` date DEFAULT NULL COMMENT 'Start date of membership period',
  `end_date` date DEFAULT NULL COMMENT 'End date of membership period',
  `contribution_id` int(10) DEFAULT NULL COMMENT 'FK to Contribution ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `civicrm_membership_period`
--
ALTER TABLE `civicrm_membership_period`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_civicrm_membership_period_membership_contact_id` (`contact_id`) USING BTREE,
  ADD KEY `FK_civicrm_membership_period_membership_id` (`membership_id`) USING BTREE,
  ADD KEY `FK_civicrm_membership_period_contribution_id` (`contribution_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `civicrm_membership_period`
--
ALTER TABLE `civicrm_membership_period`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Membership period Id';

