drop database if exists finalsfantasy;
create database finalsfantasy;
use finalsfantasy;

CREATE TABLE IF NOT EXISTS user (
  username varchar(50) NOT NULL,
  hashed_password varchar(256) NOT NULL,
  age int(10) NOT NULL,
  math_test_easy int(2),
  math_test_med int(2),
  math_test_hard int(2),
  sci_test_easy int(2),
  sci_test_med int(2),
  sci_test_hard int(2),
  PRIMARY KEY (username)
);

INSERT INTO `finalsfantasy`.`user` (`username`, `hashed_password`, `age`, `math_test_easy`, `math_test_med`, `math_test_hard`, `sci_test_easy`, `sci_test_med`, `sci_test_hard`) VALUES ('Andre', '$2y$10$R310PfsZ8ihM6nsmOfJT8e0byfhNlQzF9Rp96eyzUxOhRHrmK20Mq', '5', '1', '0', '0', '2', '1', '0');
INSERT INTO `finalsfantasy`.`user` (`username`, `hashed_password`, `age`, `math_test_easy`, `math_test_med`, `math_test_hard`, `sci_test_easy`, `sci_test_med`, `sci_test_hard`) VALUES ('Charles', '$2y$10$4CigmZz6uJrK0rDsH6g23OxvHMw/rTWp3977oaA8tsbkTsnFDniZq', '5', '2', '1', '0', '1', '0', '0');
INSERT INTO `finalsfantasy`.`user` (`username`, `hashed_password`, `age`, `math_test_easy`, `math_test_med`, `math_test_hard`, `sci_test_easy`, `sci_test_med`, `sci_test_hard`) VALUES ('Debbie', '$2y$10$YJSZEr3RlYryRUOlQcRK7Or2CmtBu0ydnRs5iZCGxl6Jy4e4cT8eS', '5', '0', '0', '1', '0', '0', '1');
INSERT INTO `finalsfantasy`.`user` (`username`, `hashed_password`, `age`, `math_test_easy`, `math_test_med`, `math_test_hard`, `sci_test_easy`, `sci_test_med`, `sci_test_hard`) VALUES ('Shi Qi', '$2y$10$UvW5gSEhtgvkPTJ8GMfjcOnuWh.bESB.Z8oobLNKFoJyrLb30mTcO', '5', '1', '1', '0', '1', '0', '0');
INSERT INTO `finalsfantasy`.`user` (`username`, `hashed_password`, `age`, `math_test_easy`, `math_test_med`, `math_test_hard`, `sci_test_easy`, `sci_test_med`, `sci_test_hard`) VALUES ('Ying Ting', '$2y$10$SUPbZCkKgHIt.wv8zRJ1beOOiKtCuff04zfdMhvI0RWj/BLdgoTDq', '5', '0', '2', '2', '0', '1', '0');
INSERT INTO `finalsfantasy`.`user` (`username`, `hashed_password`, `age`, `math_test_easy`, `math_test_med`, `math_test_hard`, `sci_test_easy`, `sci_test_med`, `sci_test_hard`) VALUES ('admin', '$2y$10$F7ixVhCIrQXKKxefv6mbvewedMhD7Qw8viN7EsUC8JaKmO0IB0K.W', '10', '1', '3', '2', '3', '0', '5');