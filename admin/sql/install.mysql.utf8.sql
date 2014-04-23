CREATE TABLE IF NOT EXISTS `#__ocseatmap_seatmap` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `BackgroundImageURL` VARCHAR(255) NULL,
  `SizeX` INT NOT NULL,
  `SizeY` INT NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `SeatMapName_UNIQUE` (`Name` ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `#__ocseatmap_seattype` (
  `TypeName` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`TypeName`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `#__ocseatmap_seat` (
  `PositionX` INT NOT NULL,
  `PositionY` INT NOT NULL,
  `SeatMapID` INT NOT NULL,
  `SeatTypeName` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`PositionY`, `PositionX`, `SeatMapID`),
  INDEX `fk_ocseatmap_seat_ocseatmap_seatmap1_idx` (`SeatMapID` ASC),
  INDEX `fk_ocseatmap_seat_ocseatmap_seattype1_idx` (`SeatTypeName` ASC),
  CONSTRAINT `fk_ocseatmap_seat_ocseatmap_seatmap1`
    FOREIGN KEY (`SeatMapID`)
    REFERENCES `#__ocseatmap_seatmap` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ocseatmap_seat_ocseatmap_seattype1`
    FOREIGN KEY (`SeatTypeName`)
    REFERENCES `#__ocseatmap_seattype` (`TypeName`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `#__ocseatmap_reservedseat` (
  `UserID` INT NOT NULL,
  `SeatMapID` INT NOT NULL,
  `PositionX` INT NOT NULL,
  `PositionY` INT NOT NULL,
  `DateReserved` DATETIME NOT NULL,
  `IsPaid` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`UserID`, `SeatMapID`, `PositionX`, `PositionY`),
  INDEX `fk_reservedseat_doc_users1_idx` (`UserID` ASC),
  INDEX `fk_ocseatmap_reservedseat_ocseatmap_seat1_idx` (`PositionY` ASC, `PositionX` ASC, `SeatMapID` ASC),
  CONSTRAINT `fk_reservedseat_doc_users1`
    FOREIGN KEY (`UserID`)
    REFERENCES `#__users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ocseatmap_reservedseat_ocseatmap_seat1`
    FOREIGN KEY (`PositionY` , `PositionX` , `SeatMapID`)
    REFERENCES `#__ocseatmap_seat` (`PositionY` , `PositionX` , `SeatMapID`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;