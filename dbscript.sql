CREATE USER 'football'@'localhost' IDENTIFIED BY 'football';
CREATE DATABASE cga_football_db
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

GRANT ALL PRIVILEGES ON cga_football_db.* TO 'football'@'localhost';

