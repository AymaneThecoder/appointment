




CREATE TABLE ` reservations` (
  `appo_date` date NOT NULL,
  `appo_slot` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `les reservations`
  ADD PRIMARY KEY (`appo_date`,`appo_slot`),
  ADD KEY `user_id` (`user_id`);
