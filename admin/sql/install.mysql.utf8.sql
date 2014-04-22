DROP TABLE IF EXISTS `#__ocseatmap_seatmap`;
CREATE TABLE IF NOT EXISTS `#__ocseatmap_seatmap` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `BackgroundImageID` INT NULL,
  `SizeX` INT NOT NULL,
  `SizeY` INT NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `SeatMapName_UNIQUE` (`Name` ASC))
ENGINE = InnoDB;