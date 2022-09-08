CREATE TABLE Users (
UserID int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username varchar(32) NOT NULL,
password varchar(32) NOT NULL,
role varchar(5) NOT NULL,
regdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Flashcards (
CardID int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Owner int(6) NOT NULL,
Question varchar(255) NOT NULL,
Answer varchar(255) NOT NULL
);