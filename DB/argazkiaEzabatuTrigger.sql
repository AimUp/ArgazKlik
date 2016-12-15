DELIMITER //
DROP TRIGGER IF EXISTS argazkiaEzabatu //
CREATE TRIGGER argazkiaEzabatu
BEFORE DELETE ON argazkiak FOR EACH ROW
BEGIN
	DELETE FROM argazkiatzipenzerrenda WHERE ArgazkiID = OLD.ID;
	DELETE FROM taghitza WHERE ArgazkiID = OLD.ID;
	DELETE FROM taglekua WHERE ArgazkiID = OLD.ID;
	DELETE FROM tagpertsona WHERE ArgazkiID = OLD.ID;
END //