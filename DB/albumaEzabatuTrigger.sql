DELIMITER $$

CREATE TRIGGER albumaEzabatu
AFTER DELETE ON albumak FOR EACH ROW
BEGIN
	DELETE FROM argazkiak WHERE AlbumID = OLD.ID;
END $$