
ALTER TABLE `poulewedstrijden`
  ADD CONSTRAINT `poulewedstrijden_ibfk_1` FOREIGN KEY (`slot_1`) REFERENCES `teams` (`naam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `poulewedstrijden_ibfk_2` FOREIGN KEY (`slot_2`) REFERENCES `teams` (`naam`) ON UPDATE CASCADE;

ALTER TABLE `spelers`
  ADD CONSTRAINT `spelers_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON UPDATE CASCADE;


ALTER TABLE `team-poulewedstrijd`
  ADD CONSTRAINT `team-poulewedstrijd_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `team-poulewedstrijd_ibfk_2` FOREIGN KEY (`poulewedstrijd_id`) REFERENCES `poulewedstrijden` (`wedstrijdnr`) ON UPDATE CASCADE;

